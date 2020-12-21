<?php
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Exclude;

/**
 * @ORM\Entity
 * @ExclusionPolicy("none")
 * @ORM\Table(name="users",
 *     uniqueConstraints={
 *     @ORM\UniqueConstraint(
 *     name="unique_email",
 *     columns={"email"}
 *	 )
 * })
 * 	 *
 **/
class Users {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="bigint", length=20)
	 * @ORM\GeneratedValue
	 */

	protected $user_id;

	/**
	 * @ORM\Column(type="string", length=20, options={"comment":"별명"})
	 */
	protected $name;

	/**
	 * @ORM\Column(type="string", length=30, options={"comment":"닉네임"})
	 */
	protected $nickname;

	/**
	 * @ORM\Column(type="string", length=100, options={"comment":"비밀번호"})
	 */
	protected $password;

	/**
	 * @ORM\Column(type="string", length=20, options={"comment":"휴대전화번호"})
	 */
	protected $phone;

	/**
	 * @ORM\Column(type="string", length=100, options={"comment":"이메일"})
	 */
	protected $email;

	/**
	 * @ORM\Column(type="string", columnDefinition="ENUM('male', 'female')")
	 */
	protected $gender;

	/**
	 * @ORM\OneToMany(targetEntity="Orders", mappedBy="ordered_user", fetch="LAZY")
	 * @Exclude
	 */
	protected $orders;


	public function __construct()
	{
	}

	/**
	 * @return mixed
	 */
	public function getUserId()
	{
		return $this->user_id;
	}

	/**
	 * @param mixed $user_id
	 */
	public function setUserId($user_id): void
	{
		$this->user_id = $user_id;
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
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * @param mixed $phone
	 */
	public function setPhone($phone): void
	{
		$this->phone = $phone;
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

	/**
	 * @return mixed
	 */
	public function getOrders()
	{
		return $this->orders;
	}

	/**
	 * @param mixed $orders
	 */
	public function setOrders($orders): void
	{
		$this->orders = $orders;
	}

	/**
	 * Simple DTO
	 * @return stdClass
	 */
	public function userSimpleDto()
	{
		$o = new \stdClass();
		$o->name = make_name($this->getName());
		$o->nickname = $this->getNickname();
		$o->email = make_email($this->getEmail());
		$o->phone = make_phone($this->getPhone());
		$o->gender = $this->getgender();
		return $o;
	}

	/**
	 * Simple DTO
	 * @return stdClass
	 */
	public function userSignupDto()
	{
		$o = new \stdClass();
 		$o->name = make_name($this->getName());
		$o->email = make_email($this->getEmail());
		return $o;
	}
}
