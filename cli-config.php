<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 5.6.20.
 * Time: 09.57
 */

use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
require_once 'app/bootstrap.php';


return ConsoleRunner::createHelperSet($entityManager);