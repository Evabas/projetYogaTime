<?php
require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader, [
    'cache' => false,
]);



if (isset($_GET['p'])) {
    $page= $_GET['p'];
}

switch ($page) {
    case 'home':
        echo $twig->render('/home.twig');
    break;
    case 'lessons':
        echo $twig->render('/lessons.twig');
    break;
    case 'planning':
        echo $twig->render('/planning.twig');
    break;
    case 'team':
        echo $twig->render('/team.twig');
    break;
    case 'price':
        echo $twig->render('/price.twig');
    break;
    case 'contact':
        echo $twig->render('/contact.twig');
    break;
    case 'subscriber':
        echo $twig->render('/subscriber.twig');
    break;
    case 'registration':
        echo $twig->render('/registration.twig');
    break;
    default:
        header('HTTP/1.0 404 Not Found');
        echo $twig->render('/404.twig');
}