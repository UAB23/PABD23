<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

// Define routes
$routes = new RouteCollection();

$routes->add('categories', new Route('/categories', [
    '_controller' => function () {
        // Logic to fetch and display categories
        return new Response('Categories Page');
    }
]));

$routes->add('threads', new Route('/categories/{categoryId}/threads', [
    '_controller' => function ($categoryId) {
        // Logic to fetch and display threads of a category
        return new Response('Threads of Category '.$categoryId);
    }
]));

$routes->add('posts', new Route('/categories/{categoryId}/threads/{threadId}/posts', [
    '_controller' => function ($categoryId, $threadId) {
        // Logic to fetch and display posts of a thread
        return new Response('Posts of Thread '.$threadId.' in Category '.$categoryId);
    }
]));

$routes->add('create_thread', new Route('/categories/{categoryId}/threads/create', [
    '_controller' => function ($categoryId) {
        // Logic to handle creating a new thread
        return new Response('Creating a new thread in Category '.$categoryId);
    }
]));

$routes->add('reply', new Route('/categories/{categoryId}/threads/{threadId}/reply', [
    '_controller' => function ($categoryId, $threadId) {
        // Logic to handle replying to a thread
        return new Response('Replying to Thread '.$threadId.' in Category '.$categoryId);
    }
]));

// Create the request context
$request = Request::createFromGlobals();
$context = new RequestContext();
$context->fromRequest($request);

// Match the requested URL against the defined routes
$matcher = new UrlMatcher($routes, $context);

try {
    $parameters = $matcher->match($request->getPathInfo());

    // Extract the controller function and call it
    $controller = $parameters['_controller'];
    unset($parameters['_controller']);
    $response = call_user_func_array($controller, $parameters);

} catch (ResourceNotFoundException $exception) {
    $response = new Response('Not Found', Response::HTTP_NOT_FOUND);
} catch (Exception $exception) {
    $response = new Response('An error occurred', Response::HTTP_INTERNAL_SERVER_ERROR);
}

// Send the response
$response->send();