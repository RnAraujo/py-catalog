<?php

use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\YamlDriver;

class Doctrine
{
    public $em;
    private $applicationMode;

    public function __construct()
    {
        $this->applicationMode = 'development';

        $config = new Configuration;
        $driver = new YamlDriver(array(APPPATH . 'models/Entities/metadata'));

        $config->setMetadataDriverImpl($driver);
        $config->setProxyDir(APPPATH . 'models/Proxies');
        $config->setProxyNamespace('Proxies');
        $config->addEntityNamespace('ns', 'Entities');

        $config->setAutoGenerateProxyClasses(true);

        $connectionOptions = array(
            'driver'        => getenv('DB_DRIVER'),
            'user'			=> getenv('DB_USERNAME'),
            'password'		=> getenv('DB_PASSWORD'),
            'host'			=> getenv('DB_HOST'),
            'dbname'		=> getenv('DB_DATABASE')
        );

        $this->em = EntityManager::create($connectionOptions, $config);
    }
}
