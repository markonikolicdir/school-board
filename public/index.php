<pre>
<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 4.6.20.
 * Time: 14.33
 */

echo 'Empty project started<br><br>';

use App\Entity\User;
use App\Entity\Product;

use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ .'/../vendor/autoload.php';
require_once __DIR__ .'/../app/routes.php';
require_once __DIR__ .'/../app/core.php';
require_once __DIR__ .'/../app/bootstrap.php';

$request = Request::createFromGlobals();

// Our framework is now handling itself the request
$app = new Core($routes, $entityManager);

$response = $app->handle($request);
$response->send();

//var_dump($request->query);

//?name=Marko?surname=Nikolic

//var_dump($request->query->get('name'));
//var_dump($request->query->get('surname'));



//$user = new User();
//$user->setName('Marko');
//var_dump($user);
//
//$product = new Product();
//$product->setName('Dell');
//var_dump($product);


echo '<br>kraj';

?>
    </pre>
