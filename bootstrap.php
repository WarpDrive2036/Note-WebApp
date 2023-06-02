<?php

use Core\Container;
use Core\Database;
use Core\App;

$container = new Container(); // Instantiated the Class / Created an Object from the Class

$container->bind('Core\Database',function (){ // binding the DB Service Class
    $config = require base_path('config.php');
    return new Database($config['database']);
});

$db = $container->resolve('Core\Database'); // Resolving/Returning the DB Object

App::setContainer($container);






