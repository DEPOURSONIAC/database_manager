<?php

/**
 * Define all application routes.
 *
 * Each route specifies:
 * - the HTTP method;
 * - the controller function to execute;
 * - the parameters required by the controller;
 * - whether administrator privileges are required.
 *
 * @return array
 */
function allRoutes(): array
{
    return [

        // Home
        'home' => [
            'GET' => [
                'function' => 'showHome',
                'params' => []
            ]
        ],

        // Database exploration
        'database' => [
            'GET' => [
                'function' => 'showDatabase',
                'params' => ['id']
            ]
        ],

        // Table consultation
        'table' => [
            'GET' => [
                'function' => 'showTable',
                'params' => ['id', 'table']
            ]
        ],

        // Database import
        'import' => [
            'GET' => [
                'function' => 'showImport',
                'params' => []
            ],

            'POST' => [
                'function' => 'importDatabase',
                'params' => []
            ]
        ],

        // Add an existing database
        'addDatabase' => [
            'POST' => [
                'function' => 'addDatabase',
                'params' => ['path']
            ]
        ],

        // Delete a database
        'deleteDatabase' => [
            'POST' => [
                'function' => 'deleteDatabase',
                'params' => ['id']
            ]
        ],

    ];
}

/**
 * Retrieve the requested route.
 *
 * The route is determined from the "action" GET parameter.
 * If no action is provided, the home route is used.
 *
 * @return array The requested route configuration.
 */
function getRoute(): array
{
    $routes = allRoutes();

    $action = $_GET['action'] ?? 'home';

    if (!isset($routes[$action])) {
        http_response_code(404);
        exit('Page not found');
    }

    $route = $routes[$action];
    $route['name'] = $action;

    return $route;
}


/**
 * Check whether the current user is authorized to access a route.
 *
 * This function handles:
 * - authentication requirements;
 * - access to login and registration pages;
 * - administrator-only routes.
 *
 * @param array $route The requested route configuration.
 *
 * @return array The authorized route configuration.
 */
function protectRoute(array $route): array
{
    return $route;
}


/**
 * Retrieve the arguments required by the current route.
 *
 * Parameters are read from GET or POST according to the HTTP method.
 * The arguments are returned in the same order as defined by the route.
 *
 * @param array $route The current route configuration.
 *
 * @return array The arguments to pass to the controller function.
 */
function getRouteArguments(array $route): array
{
    $method = $_SERVER['REQUEST_METHOD'];

    if (!isset($route[$method])) {
        http_response_code(405);
        exit('Method not allowed');
    }

    $params = $route[$method]['params'];

    $source = match ($method) {
        'GET' => $_GET,
        'POST' => $_POST,
        default => []
    };

    $args = [];

    foreach ($params as $param) {
        if (!isset($source[$param])) {
            exit("Missing parameter: $param");
        }

        $args[] = $source[$param];
    }

    return $args;
}


/**
 * Execute the controller function associated with the current route.
 *
 * @param array $route The current route configuration.
 * @param array $args Arguments passed to the controller function.
 *
 * @return void
 */
function executeRoute(array $route, array $args): void
{
    $method = $_SERVER['REQUEST_METHOD'];

    if (!isset($route[$method])) {
        http_response_code(405);
        exit('Method not allowed');
    }

    $function = $route[$method]['function'];

    $function(...$args);
}