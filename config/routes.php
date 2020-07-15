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


/**
 * End API
 */


/**
 * Not Found and Default 
 */
$router->notFound(['controller' => 'error', 'action' => 'notFound']);
$router->setDefaults(['controller' => 'home', 'action' => 'index']);
$router->handle(BASE_URI);