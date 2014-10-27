<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Symfony\Component\Yaml\Yaml;

require_once __DIR__.'/vendor/autoload.php';

$ymlConfig      = Yaml::parse(file_get_contents('parameters.yml'));
$config         = Setup::createAnnotationMetadataConfiguration(array(__DIR__.'/src/Ck/OpMeetingNotifier/Entity'), !$ymlConfig['env']['prod'], null, null, false);
$entityManager  = EntityManager::create($ymlConfig['doctrine']['dbal'], $config);
