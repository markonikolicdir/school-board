<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 8.6.20.
 * Time: 19.08
 */
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;



class Core implements HttpKernelInterface
{
    /** @var RouteCollection */
    protected $routes;

    /**
     * Core constructor.
     * @param RouteCollection $routes
     * @param EntityManager $entityManager
     */
    public function __construct(RouteCollection $routes, EntityManager $entityManager)
    {
        $this->routes = $routes;
        $this->em = $entityManager;
    }

    /**
     * @param Request $request
     * @param int $type
     * @param bool $catch
     * @return mixed|Response
     */
    public function handle(Request $request, $type = HttpKernelInterface::MASTER_REQUEST, $catch = true)
    {
        // create a context using the current request
        $context = new RequestContext();
        $context->fromRequest($request);

        $matcher = new UrlMatcher($this->routes, $context);

        try {
            $attributes = $matcher->match($request->getPathInfo());

            var_dump($attributes);

            $controller = $attributes['controller'];
            unset($attributes['controller']);

            $cname = "App\\Controller\\".$controller;
            $class = new $cname($this->em);

            $response = call_user_func_array(array($class, $attributes['method']), array($attributes['id']));

        } catch (ResourceNotFoundException $e) {
            $response = new Response('Not found!', Response::HTTP_NOT_FOUND);
        }

        return $response;
    }
}