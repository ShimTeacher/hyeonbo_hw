<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
/**
 * Class Model_base
 */
class Model_base extends CI_Model
{

	/**
	 * @var \Doctrine\ORM\EntityManager $em
	 */
	protected $em;

	function __construct()
	{
		parent::__construct();
		$this->init();

	}

	function init()
	{
		$this->em = $this->doctrine->em;
	}


	public function save($entity) {

		return $this->em->transactional(function($em) use ($entity) {
			//... do some work
			$this->em->persist($entity);
		});
	}

	public function serializer($data)
	{
		$serializer = JMS\Serializer\SerializerBuilder::create()->build();
		$jsonContent = $serializer->serialize($data, 'json');
		return json_decode($jsonContent);
	}

}
