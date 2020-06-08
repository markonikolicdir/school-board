<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 4.6.20.
 * Time: 14.33
 */
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Annotations\AnnotationReader;

require_once __DIR__."/../vendor/autoload.php";

$paths = array( realpath(__DIR__."/../src/Entity") );

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

$reader = new AnnotationReader();
$driver = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($reader, $paths);
$config->setMetadataDriverImpl( $driver );


$connectionParams = array(
    'dbname' => 'school_board',
    'user' => 'root',
    'password' => 'root',
    'host' => '172.22.0.2',
    'driver' => 'pdo_mysql',
    'charset'  => 'utf8',
    'driverOptions' => array(
        1002 => 'SET NAMES utf8'
    )
);

// obtaining the entity manager
$entityManager = EntityManager::create($connectionParams, $config);