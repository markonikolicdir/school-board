<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 7.6.20.
 * Time: 09.34
 */

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

//save new student, random set name and grade
$student = new Route(
    '/student',
    array('controller' => 'StudentController', 'method'=>'save')
);

//list of all students
$students = new Route(
    '/students',
    array('controller' => 'StudentController', 'method'=>'list')
);

//check if student pass
$pass = new Route(
    '/student/{id}',
    array('controller' => 'StudentController', 'method'=>'pass'),
    array('id' => '[0-9]+')
);

$routes = new RouteCollection();
$routes->add('student', $student);
$routes->add('students', $students);
$routes->add('pass', $pass);

return $routes;