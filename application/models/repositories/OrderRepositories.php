<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


require_once "Model_base.php";

class OrderRepositories extends Model_base
{

	public function __construct()
	{
		parent::__construct();
	}

	public function findAllOrder($user_id)
	{
		$dql = "SELECT o FROM Orders o WHERE o.user_id = :user_id";

		$query = $this->em->createQuery($dql);
		$query->setParameter('user_id', $user_id);
		return $tasks = $query->getResult();

//		return $this->serialize($tasks);
	}

}
