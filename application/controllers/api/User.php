<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Api\API_base;
use Api\form\UserSearchFormDao;


/**
 * Class Users
 */
class User extends API_base
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('repositories/UserRepositories');
		$this->load->model('repositories/OrderRepositories');
		$this->check_jwt_token();
	}

	/**
	 * method: GET
	 * route: api/v1/users/:user_id
	 * description: 단일회원 상세조회 API
	 */
	public function getUserInfo_get($user_id)
	{
		try {
			if (empty($user_id) || $user_id < 0){
				throw new Exception("InvalidReqeustException",0);
			}

			/**
			 * result process
			 * @var Users $user
			 */
			$user = $this->UserRepositories->getUserById($user_id);
			if (empty($user)){
				throw new Exception("UserNotFoundException" ,0);
			}

		}catch (Exception $e) {
			$this->response([], $e->getCode(), $e->getMessage());
		}

		$this->response($user->userSimpleDto(), self::SUCCESS);
	}

	/**
	 * method: GET
	 * route: api/v1/users/:user_id/orders
	 * description: 단일 회원의 주문 목록 조회
	 */
	public function getUserOrderInfo_get($user_id = null)
	{
		try {
			if (empty($user_id) || $user_id < 0){
				throw new Exception("InvalidReqeustException",0);
			}

			/**
			 * @var Users $user
			 */
			$user = $this->UserRepositories->getUserById($user_id);
			if (empty($user)){
				throw new Exception("UserNotFoundException" ,0);
			}

			/**
			 * result process
			 */
			$orders = $user->getOrders();
			$result = [];
			foreach ($orders as $item) {
				array_push($result, $item->orderSimpleDto());
			}


		}catch (Exception $e) {
			$this->response([], $e->getCode(), $e->getMessage());
		}

		$this->response($result, self::SUCCESS);
	}

	/**
	 * method: GET
	 * route: api/v1/users
	 * description: 여러회원 목록 조회
	 */
	public function getAllUserInfo_get()
	{
		try {
			/**
			 * Input Validation Check
			 */
			$input = $this->input_post_params();
			$limit = $input['limit']?:10;
			$page = $input['page']?:0;
			$name = $input['name'];
			$nickname = $input['nickname'];
			$form = new UserSearchFormDao($limit, $page, $name, $nickname);
			$form->check_validation();

			/**
			 * result process
			 * TODO ORM으로 작성되지않음, ORM으로 변경필요
			 */
			$users = $this->UserRepositories->findAllUsers($form);
			foreach ($users as &$user) {
				$user->name = make_name($user->name);
				$user->email = make_email($user->email);
				$user->phone = make_phone($user->phone);
			}

		}catch (Exception $e) {
			$this->response([], $e->getCode(), $e->getMessage());
		}

		$this->response($users, 1);
	}
}
