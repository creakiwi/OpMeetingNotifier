<?php

use Ck\OpMeetingNotifier\Command\NotifyCommand;
use Symfony\Component\Console\Application;

require_once __DIR__.'/bootstrap.php';

$app = new Application();
$app->add(new NotifyCommand());
$app->run();