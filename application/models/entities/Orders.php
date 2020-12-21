<?php
use Doctrine\ORM\Mapping as ORM;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Exclude;

/**
 * @ORM\Entity @ORM\Table(name="orders")
 * @ExclusionPolicy("none")
 **/
class Orders {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="bigint", length=20)
	 * @ORM\GeneratedValue
	 */
	protected $order_id;

	/**
	 * @ORM\Column(type="string", columnDefinition="CHAR(64) NOT NULL", options={"comment":"uuid"}))
	 */
	protected $uuid;

	/**
	 * @ORM\Column(type="string", length=12)
	 */
	protected $order_number;

	/**
	 * @ORM\Column(type="datetime", options={"comment":"결제일시"}))
	 */
	protected $order_date;

	/**
	 * @ORM\Column(type="string", columnDefinition="ENUM('READY', 'WAITING', 'DONE')", options={"comment":"주문상태"}))
	 */
	protected $status;

	/**
	 * @ORM\Column(type="string", length=100, options={"comment":"주문상품"}))
	 */
	protected $product_name;

	/**
	 * @ORM\Column(type="bigint", length=20, options={"comment":"user fk"}))
	*/
	protected $user_id;

	/**
	 * @Exclude
	 * @ORM\ManyToOne(targetEntity="Users", inversedBy="orders", fetch="LAZY")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
	 */
	protected $ordered_user;

	/**
	 * @return mixed
	 */
	public function getOrderId()
	{
		return $this->order_id;
	}

	/**
	 * @param mixed $order_id
	 */
	public function setOrderId($order_id): void
	{
		$this->order_id = $order_id;
	}

	/**
	 * @return mixed
	 */
	public function getUuid()
	{
		return $this->uuid;
	}

	/**
	 * @param mixed $uuid
	 */
	public function setUuid($uuid): void
	{
		$this->uuid = $uuid;
	}

	/**
	 * @return mixed
	 */
	public function getOrderNumber()
	{
		return $this->order_number;
	}

	/**
	 * @param mixed $order_number
	 */
	public function setOrderNumber($order_number): void
	{
		$this->order_number = $order_number;
	}

	/**
	 * @return mixed
	 */
	public function getOrderDate()
	{
		return $this->order_date;
	}

	/**
	 * @param mixed $order_date
	 */
	public function setOrderDate($order_date): void
	{
		$this->order_date = $order_date;
	}

	/**
	 * @return mixed
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * @param mixed $status
	 */
	public function setStatus($status): void
	{
		$this->status = $status;
	}

	/**
	 * @return mixed
	 */
	public function getProductName()
	{
		return $this->product_name;
	}

	/**
	 * @param mixed $product_name
	 */
	public function setProductName($product_name): void
	{
		$this->product_name = $product_name;
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
	public function getOrderedUser()
	{
		return $this->ordered_user;
	}

	/**
	 * @param mixed $ordered_user
	 */
	public function setOrderedUser($ordered_user): void
	{
		$this->ordered_user = $ordered_user;
	}


	public function orderSimpleDto()
	{
		$o = new \stdClass();
		$o->orderNumber = $this->getOrderNumber();
		$o->name = $this->getProductName();
		$o->status = $this->getStatus();
		$o->order_date = $this->getOrderDate();

		return $o;
	}

}
