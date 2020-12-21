<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Api\API_base;
use Api\form\UserSignFormDao;
use Api\form\LoginFormDao;


/**
 * Class Auth
 */
class Auth extends API_base
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('repositories/UserRepositories');
		$this->load->model('repositories/JwtRepositories');
	}

	/**
	 * method: POST
	 * route: api/v1/sign-up
	 * description: 회원가입 API
	 */
	public function signup_post()
	{
		try {
			/**
			 * Input Validation Check
			 */
			$input = $this->input_post_params();

			$name = $input['name'];
			$nickname = $input['nickname'];
			$password = $input['password'];
			$phone_number = $input['phone_number'];
			$email = $input['email'];
			$gender = $input['gender'];

			/**
			 * check data
			 */
			$form = new UserSignFormDao($name, $nickname, $password, $phone_number, $email, $gender);
			$form->check_validation();

			if ($this->UserRepositories->isExistEmail($email) > 0){
				throw new Exception("AccountAlreadyExistsException", -9000);
			}

			/**
			 * result processs
			 */
			$form->set_user_data();

			$user = new Users();
			$user->setName($form->getName());
			$user->setNickname($form->getNickname());
			$user->setPassword($form->getPassword());
			$user->setPhone($form->getPhoneNumber());
			$user->setEmail($form->getEmail());
			$user->setGender($form->getGender());
			$this->UserRepositories->save($user);

		}catch (Doctrine\DBAL\Exception $e) {
			$this->response([], $e->getCode(), "회원가입에 실패하였습니다.");
		}catch (Exception $e) {
			$this->response([], $e->getCode(), $e->getMessage());
		}

		$this->response($user->userSignupDto(), 1,"회원가입이 완료되었습니다.");
	}

	/**
	 * method: POST
	 * route: api/v1/login
	 * description: 로그인 API
	 */
	public function login_post()
	{
		try {

			list($email, $form) = $this->FirstInputValidation();
			/**
			 * @var Users $user
			 */
			$user = $this->SecondFindUserValidation($email, $form);

			/**
			 * result process
			 */

			/**
			 * @var Jwts $jwt
			 */
			$jwt = new Jwts();
			$jwt->setIsExpired(0);
			$jwt->setUserId($user->getUserId());
			$jwt->setCreatedTime(new \DateTime(date("Y-m-d H:i:s")));
			$this->JwtRepositories->save($jwt);

			$user_jwt = create_jwt_contents($user->getUserId(), $jwt->getJwtId());
			$encoded_jwt = $this->JWT_encode($user_jwt);

			$jwt->setJwt($encoded_jwt);
			$jwt->setExpiredTime(new \DateTime(date("Y-m-d H:i:s", $user_jwt['expired_time'])));
			$this->JwtRepositories->save($jwt);

		}catch (Doctrine\DBAL\Exception $e) {
			$this->response([], $e->getCode(), $e->getMessage());
		}catch (Exception $e) {
			$this->response([], $e->getCode(), $e->getMessage());
		}

		$this->response([
			'jwt' => $encoded_jwt
		], 1);
	}

	/**
	 * method: POST
	 * route: api/v1/logout
	 * description: 로그아웃 API
	 */
	public function logout_post()
	{
		try {
			$user_info = $this->check_jwt_token();

			/**
			 * @var Jwts $token
			 */
			$token = $this->JwtRepositories->getTargetToken($user_info->uid, $user_info->user_id);

			$token->setIsExpired(true);
			$this->JwtRepositories->save($token);

		}catch (Doctrine\DBAL\Exception $e) {
			$this->response([], $e->getCode(), $e->getMessage());
		}catch (Exception $e) {
			$this->response([], $e->getCode(), $e->getMessage());
		}

		$this->response([
			'result' => 'success'
		], 1);
	}

	/**
	 * @return array
	 */
	public function FirstInputValidation(): array
	{
		$input = $this->input_post_params();

		$email = $input['email'];
		$password = $input['password'];

		/**
		 * check data
		 */
		$form = new LoginFormDao($email, $password);
		return array($email, $form);
	}

	/**
	 * @param $email
	 * @param $form
	 * @throws Exception
	 * @return Object
	 */
	public function SecondFindUserValidation($email, $form)
	{
		/**
		 * @var Users $user
		 */
		$user = $this->UserRepositories->findByEmail($email);

		if (empty($user)) {
			throw new Exception("LoginFailedException: email");
		}

		if ($user->getPassword() !== hash("sha256", $form->getPassword())) {
			throw new Exception("LoginFailedException: password");
		}
		return $user;
	}
}

;
