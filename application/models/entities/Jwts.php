<?php
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity @ORM\Table(name="jwt_tokens")
 **/
class Jwts {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="bigint", length=20)
	 * @ORM\GeneratedValue
	 */
	protected $jwt_id;

	/**
	 * @ORM\Column(type="string", length=500, nullable=true, options={"comment":"jwt"}))
	 */
	protected $jwt;

	/**
	 * @ORM\Column(type="datetime", nullable=true, options={"comment":"expired time"}))
	 */
	protected $expired_time;

	/**
	 * @ORM\Column(type="datetime", options={"comment":"created time"}))
	 */
	protected $created_time;

	/**
	 * @ORM\Column(type="boolean", options={"comment":"expired 여부"}))
	 */
	protected $is_expired;

	/**
	 * @ORM\Column(type="bigint", length=20, options={"comment":"user fk"}))
	 */
	protected $user_id;

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
	public function getCreatedTime()
	{
		return $this->created_time;
	}

	/**
	 * @param mixed $created_time
	 */
	public function setCreatedTime($created_time): void
	{
		$this->created_time = $created_time;
	}



	/**
	 * @return mixed
	 */
	public function getJwtId()
	{
		return $this->jwt_id;
	}

	/**
	 * @param mixed $jwt_id
	 */
	public function setJwtId($jwt_id): void
	{
		$this->jwt_id = $jwt_id;
	}

	/**
	 * @return mixed
	 */
	public function getJwt()
	{
		return $this->jwt;
	}

	/**
	 * @param mixed $jwt
	 */
	public function setJwt($jwt): void
	{
		$this->jwt = $jwt;
	}

	/**
	 * @return mixed
	 */
	public function getExpiredTime()
	{
		return $this->expired_time;
	}

	/**
	 * @param mixed $expired_time
	 */
	public function setExpiredTime($expired_time): void
	{
		$this->expired_time = $expired_time;
	}

	/**
	 * @return mixed
	 */
	public function getIsExpired()
	{
		return $this->is_expired;
	}

	/**
	 * @param mixed $is_expired
	 */
	public function setIsExpired($is_expired): void
	{
		$this->is_expired = $is_expired;
	}





}
