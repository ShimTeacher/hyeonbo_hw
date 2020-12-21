<?php

namespace Api\form;

class LoginFormDao {
	private $email;
	private $password;

	public function __construct(
		$email= null,
		$password= null
	)
	{
		$this->email = $email;
		$this->password = $password;
		$this->check_params();
	}

	private function check_params()
	{
		$required_params = [
			'password', 'email'
		];

		foreach ($required_params as $item) {
			$is_empty_value = empty($this->{$item}) || is_null($this->{$item});
			if ($is_empty_value){
				throw new \Exception("RequiredParamsException",-1000);
			}
		}

	}

	/**
	 * @return null
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @return null
	 */
	public function getPassword()
	{
		return $this->password;
	}
};
