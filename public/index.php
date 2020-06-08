<pre>
<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 4.6.20.
 * Time: 14.33
 */

use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ .'/../vendor/autoload.php';
require_once __DIR__ .'/../app/routes.php';
require_once __DIR__ .'/../app/core.php';
require_once __DIR__ .'/../app/bootstrap.php';

$request = Request::createFromGlobals();

$app = new Core($routes, $entityManager);

$response = $app->handle($request);

?>
</pre>
