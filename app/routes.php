<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 7.6.20.
 * Time: 09.34
 */

//use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Routing\Matcher\UrlMatcher;
//use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;


// Init basic route
$foo_route = new Route(
    '/test',
    array('controller' => 'TestController', 'method'=>'list')
);

// Init route with dynamic placeholders
$foo_placeholder_route = new Route(
    '/test/{id}',
    array('controller' => 'TestController', 'method'=>'show'),
    array('id' => '[0-9]+')
);

$foo_placeholder_route = new Route(
    '/student',
    array('controller' => 'StudentController', 'method'=>'save')
);


// Add Route object(s) to RouteCollection object
$routes = new RouteCollection();
$routes->add('foo_route', $foo_route);
$routes->add('foo_placeholder_route', $foo_placeholder_route);

//var_dump($routes);

//$context = new RequestContext();
//$context->fromRequest(Request::createFromGlobals());
//
//$matcher = new UrlMatcher($routes, $context);
//$parameters = $matcher->match($context->getPathInfo());
//
//var_dump($parameters);
//var_dump($routes);
return $routes;