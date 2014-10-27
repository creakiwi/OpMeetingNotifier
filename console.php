<?php

use Ck\OpMeetingNotifier\Command\NotifyCommand;
use Symfony\Component\Console\Application;

require_once __DIR__.'/bootstrap.php';

$notify = new NotifyCommand();
$notify->setConfiguration($ymlConfig);
$notify->setEntityManager($entityManager);

$app = new Application();
$app->add($notify);
$app->run();