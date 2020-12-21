<?php

namespace Api\form;

class UserSearchFormDao {
	private $limit;
	private $page;
	private $name;
	private $nick_name;

	public function __construct(
		$limit = null,
		$page= null,
		$name= null,
		$nick_name= null
	)
	{
		$this->limit = $limit;
		$this->page = $page;
		$this->name = $name;
		$this->nick_name = $nick_name;

		$this->check_params();
	}

	private function check_params()
	{
		$required_params = [
			'limit'
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
	public function getLimit()
	{
		return $this->limit;
	}

	/**
	 * @param null $limit
	 */
	public function setLimit($limit): void
	{
		$this->limit = $limit;
	}

	/**
	 * @return null
	 */
	public function getPage()
	{
		return $this->page;
	}

	/**
	 * @param null $page
	 */
	public function setPage($page): void
	{
		$this->page = $page;
	}


	/**
	 * @return null
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param null $name
	 */
	public function setName($name): void
	{
		$this->name = $name;
	}

	/**
	 * @return null
	 */
	public function getNickName()
	{
		return $this->nick_name;
	}

	/**
	 * @param null $nick_name
	 */
	public function setNickName($nick_name): void
	{
		$this->nick_name = $nick_name;
	}

	public function check_validation()
	{
		if ($this->getPage() < 0 || $this->getLimit() < 0){
			throw new \Exception("NumberInvalidException");
		}

	}


};
