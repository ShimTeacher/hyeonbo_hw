<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


require_once "Model_base.php";
class UserRepositories extends Model_base
{

	public function __construct()
	{
		parent::__construct();
	}

	public function getUserById($id)
	{
		return $this->em->find('Users', $id);
	}

	public function isExistEmail($email)
	{
		return $this->em->getRepository('Users')
			->count([
				'email' => $email
			]);
	}


	public function findByEmail($email)
	{
		return $this->em->getRepository('Users')
			->findOneBy([
				'email' => $email
			]);
	}

	public function findAllUsers(\Api\form\UserSearchFormDao $form)
	{
		$offset = $form->getLimit() * $form->getPage();

		$this->load->database();
		$this->db->SELECT("u.name, u.nickname, phone, email, gender, o.order_number, o.order_date, o.status, o.product_name")
			->FROM("users u")
			->JOIN("(SELECT MAX(order_id) max_oid, user_id FROM orders GROUP BY  user_id) c_max",  "c_max.user_id = u.user_id", "LEFT")
			->JOIN("orders o",  "o.order_id = c_max.max_oid", "LEFT");


		if ($form->getName()){
			$this->db->like("u.name", $form->getName());
		}

		if ($form->getNickName()){
			$this->db->like("u.nickname", $form->getNickName());
		}

		$this->db->offset($offset);
		$this->db->limit($form->getLimit());

		return $result = $this->db->get()->result();


	}

}
