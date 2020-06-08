<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 7.6.20.
 * Time: 09.34
 */

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;


$student = new Route(
    '/student',
    array('controller' => 'StudentController', 'method'=>'save')
);

$students = new Route(
    '/students',
    array('controller' => 'StudentController', 'method'=>'list')
);

$routes = new RouteCollection();
$routes->add('student', $student);
$routes->add('students', $students);

return $routes;