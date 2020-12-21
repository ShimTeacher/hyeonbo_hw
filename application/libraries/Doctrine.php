<?php
use Doctrine\Common\ClassLoader,
	Doctrine\ORM\Configuration,
	Doctrine\ORM\EntityManager,
	Doctrine\Common\Cache\ArrayCache;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

class Doctrine {

	public $em = null;

	public function __construct()
	{
		// load database configuration from CodeIgniter
		require_once APPPATH.'config/database.php';

		// Set up class loading. You could use different autoloaders, provided by your favorite framework,
		// if you want to.
		require_once APPPATH.'../vendor/doctrine/common/lib/Doctrine/Common/ClassLoader.php';

		$doctrineClassLoader = new ClassLoader('Doctrine',  APPPATH.'libraries');
		$doctrineClassLoader->register();
		$entitiesClassLoader = new ClassLoader('models', rtrim(APPPATH, "/" ));
		$entitiesClassLoader->register();
		$proxiesClassLoader = new ClassLoader('Proxies', APPPATH.'models/proxies');
		$proxiesClassLoader->register();

		$paths            = array(APPPATH.'models/Entities');
		// Set up caches
		$config = new Configuration;
		$cache = new ArrayCache;
		$config->setMetadataCacheImpl($cache);
		// composer 의 경로를 확인하면서 수정해주세요.

		$driverImpl = new AnnotationDriver(new AnnotationReader(), $paths);
//		$driverImpl = $config->newDefaultAnnotationDriver(array(APPPATH.'models/Entities'));
		$config->setMetadataDriverImpl($driverImpl);
		$config->setQueryCacheImpl($cache);

		// Proxy configuration
		$config->setProxyDir(APPPATH.'/models/proxies');
		$config->setProxyNamespace('Proxies');

		// Set up logger
		// 이 부분의 주석을 해제하면 쿼리가 나옵니다.
		//$logger = new EchoSQLLogger;
		//$config->setSQLLogger($logger);

		$config->setAutoGenerateProxyClasses( TRUE );

		// Load the database configuration from CodeIgniter
		require APPPATH . 'config/database.php';

		// Database connection information
		$connectionOptions = array(
			'driver' => 'pdo_mysql',
			'user' =>     $db['default']['username'],
			'password' => $db['default']['password'],
			'host' =>     $db['default']['hostname'],
			'dbname' =>   $db['default']['database'],
			'charset'  => $db['default']['charset'],
			'logging' => true,
			'profiling' => true
		);


		// Create EntityManager
		$this->em = EntityManager::create($connectionOptions, $config);
	}
}
