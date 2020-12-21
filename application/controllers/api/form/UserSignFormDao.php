<?php

namespace Api\form;

class UserSignFormDao {
	private $name;
	private $nickname;
	private $password;
	private $phone_number;
	private $email;
	private $gender;

	/**
	 * userFormDao constructor.
	 * @param $name
	 * @param $nickname
	 * @param $password
	 * @param $phone_number
	 * @param $email
	 * @param $gender
	 */
	public function __construct(
		$name = null,
		$nickname= null,
		$password= null,
		$phone_number= null,
		$email= null,
		$gender = null
	)
	{
		$this->name = $name;
		$this->nickname = $nickname;
		$this->password = $password;
		$this->phone_number = $phone_number;
		$this->email = $email;
		$this->gender = $gender;

		$this->check_params();
	}

	private function check_params()
	{
		$required_params = [
			'name', 'nickname', 'password', 'phone_number', 'email'
		];

		foreach ($required_params as $item) {
			$is_empty_value = empty($this->{$item}) || is_null($this->{$item});
			if ($is_empty_value){
				throw new \Exception("RequiredParamsException",-1000);
			}
		}

	}
	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName($name): void
	{
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getNickname()
	{
		return $this->nickname;
	}

	/**
	 * @param mixed $nickname
	 */
	public function setNickname($nickname): void
	{
		$this->nickname = $nickname;
	}

	/**
	 * @return mixed
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param mixed $password
	 */
	public function setPassword($password): void
	{
		$this->password = $password;
	}

	/**
	 * @return mixed
	 */
	public function getPhoneNumber()
	{
		return $this->phone_number;
	}

	/**
	 * @param mixed $phone_number
	 */
	public function setPhoneNumber($phone_number): void
	{
		$this->phone_number = $phone_number;
	}

	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail($email): void
	{
		$this->email = $email;
	}

	/**
	 * @return mixed
	 */
	public function getGender()
	{
		return $this->gender;
	}

	/**
	 * @param mixed $gender
	 */
	public function setGender($gender): void
	{
		$this->gender = $gender;
	}


	function set_user_data()
	{
		/**
		 * 비밀번호 암호화
		 */
		$password_hash = hash("sha256", $this->getPassword());
		$this->setPassword($password_hash);
	}


	function check_validation()
	{
		$name_pattern = '/^[a-zA-Z가-힣]+$/';
		if (!preg_match($name_pattern, $this->getName(), $matchResult)) {
			throw new \Exception("이름은 한글, 영문 대소문자만 허용합니다.", -1001);
		}

		$nickname_pattern = '/^[a-z]+$/';
		if (!preg_match($nickname_pattern, $this->getNickname(), $matchResult)) {
			throw new \Exception("별명은 영문 소문자만 허용합니다.", -1002);
		}

		if (strlen($this->getPassword()) < 10) {
			throw new \Exception("비밀번호는 최소 10자 이상입니다.", -1003);
		}

		/**
		 * TODO check point
		 */
		$password_pattern = '/(?=.*\d{1,50})(?=.*[~`!@#$%\^&*()-+=]{1,50})(?=.*[a-z]{1,50})(?=.*[A-Z]{1,50}).{1,50}$/';
		if (!preg_match($password_pattern, $this->getPassword(), $matchResult)) {
			throw new \Exception("비밀번호는 영문 대문자, 영문 소문자, 특수 문자, 숫자 각 1개 이상씩 포함만 허용합니다.", -1004);
		}


		$phone_pattern = '/^[0-9]+$/';
		if (!preg_match($phone_pattern, $this->getPhoneNumber(), $matchResult)) {
			throw new \Exception("전화번호는 숫자만 허용합니다.", -1005);
		}

		$email_pattern = '/^[a-zA-Z]{1}[a-zA-Z0-9.\-_]+@[a-z0-9]{1}[a-z0-9\-]+[a-z0-9]{1}\.(([a-z]{1}[a-z.]+[a-z]{1})|([a-z]+))$/';
		if (!preg_match($email_pattern, $this->getEmail(), $matchResult)) {
			throw new \Exception("이메일 형식을 확인해주세요.", -1006);
		}

		if (!preg_match($phone_pattern, $this->getPhoneNumber(), $matchResult)) {
			throw new \Exception("전화번호는 숫자만 허용합니다.", -1007);
		}

		if (!in_array($this->getGender(), \Gender_enum::gender_array)){
			throw new \Exception("성별을 확인해주세요.", -1008);
		}
	}
};
