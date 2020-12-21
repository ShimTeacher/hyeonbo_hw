<?php
namespace Api;
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class API_base extends \CI_Controller {

	const SUCCESS = 1;
	const FAIL = 0 ;

	/**
	 * Api_base constructor.
	 */
	public function __construct()
	{
		parent::__construct();
	}

	public function input_post_params()
	{
		$data = $this->input->post(NULL, true);
		$json_data = @json_decode($this->input->raw_input_stream, true);
		if ($json_data) {
			$data = array_merge($data, $json_data);
		}

		foreach ($data as $key => &$value){
			$value = trim($value);
		}

		return $data;
	}

	/**
	 * @param * $data
	 * @param int $return_code
	 * @param string $return_message
	 * @param int $http_code
	 */
	public function response($data = null, $return_code = 1, $desc = "", $http_code = 200)
	{
		$response = new \stdClass();
		$response->result = $data;
		$response->return_code = $return_code;
		$response->desc = $desc;
		$response->timestamp = time();

//		if ($return_message){
//			$response->return_message =  $return_message;
//		}

		$response->http_code = $http_code;

		$this->output
			->set_status_header($http_code)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
		exit;
	}

	/**
	 * jwt 토큰을 검증한다.
	 * @param bool $is_refresh_token
	 * @return bool|object
	 */
	function check_jwt_token()
	{
		try {
			$jwt_token = GET_HEADER_DATA();
			if (!$jwt_token){
				throw new \Exception("JWTNotFoundException", -2000);
			}

			$decoded_info = $this->JWT_decode($jwt_token);

			if (!$decoded_info){
				throw new \Exception("JWTInvalidException", -2000);
			}

			if ($decoded_info->expired_time < time()){
				throw new \Exception("JWTExpiredException ", -2000);
			}

			$this->load->model('repositories/JwtRepositories');

			/**
			 *
			 * @var \Jwts $token
			 */
			$token = $this->JwtRepositories->getTargetToken($decoded_info->uid, $decoded_info->user_id);
			if ($token->getIsExpired()){
				throw new \Exception("JWTLogoutExpiredException ", -2000);
			}

		}catch (\Exception $e) {
			$this->response([], $e->getCode(), $e->getMessage());
		}

		return $decoded_info;
	}

	function JWT_decode($token)
	{
		try{
			return \Firebase\JWT\JWT::decode($token, JWT_KEY, array('HS256'));
		}catch (\Exception $e){
			return false;
		}
	}

	function JWT_encode($token)
	{
		return \Firebase\JWT\JWT::encode($token, JWT_KEY);
	}

}
