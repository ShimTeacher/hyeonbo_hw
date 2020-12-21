<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once "Model_base.php";
class JwtRepositories extends Model_base
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getTargetToken($token_id, $user_id)
	{
		return $this->em->getRepository('Jwts')
			->findOneBy([
				'jwt_id' => $token_id,
				'user_id' => $user_id,
			]);
	}
}
