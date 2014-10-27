<?php

use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Symfony\Component\Console\Helper\HelperSet;

// replace with file to your own project bootstrap
require_once __DIR__.'/bootstrap.php';

return new HelperSet(array(
    'db' => new ConnectionHelper($entityManager->getConnection()),
    'em' => new EntityManagerHelper($entityManager),
));
