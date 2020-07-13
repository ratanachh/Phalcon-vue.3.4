<?php
declare(strict_types=1);

use Phalcon\Mvc\Router;

/**
 * @var $router Router
 */

/**
 * Home
 */
$router->addGet('/', 'Home::index');

/**
 * Session
 */
$router->add('/signup', 'Session::signup')->via(['POST', 'GET']);
$router->add('/login', 'Session::login')->via(['POST', 'GET']);

/**
 * API
 */
use Phalcon\Mvc\Micro;

$app = new Micro();

// Retrieves all robots
$app->get(
    '/api/robots',
    function () {
        
    }
);

$app->handle(BASE_URI);

/**
 * End API
 */


/**
 * Not Found and Default 
 */
$router->notFound(['controller' => 'error', 'action' => 'notFound']);
$router->setDefaults(['controller' => 'home', 'action' => 'index']);