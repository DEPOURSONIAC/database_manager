<?php

/**
 * Escape a value for safe HTML output.
 *
 * @param string $value
 * @return string
 */
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}


/**
 * Resolve and validate a view path.
 *
 * Prevents directory traversal and unauthorized file inclusion.
 *
 * @param string $page
 * @return string
 */
function resolveViewPath(string $page): string
{
    $basePath = realpath(VIEW_PATH);

    if ($basePath === false) {
        throw new RuntimeException('Views directory not found.');
    }

    $page = str_replace('\\', '/', $page);

    if ($page === '' || str_starts_with($page, '/') || !preg_match('/^[a-zA-Z0-9_-]+(?:\/[a-zA-Z0-9_-]+)*$/', $page)) {
        throw new InvalidArgumentException('Invalid view path.');
    }

    $filePath = realpath($basePath . '/' . $page . '.php');

    if ($filePath === false || !str_starts_with($filePath, $basePath . DIRECTORY_SEPARATOR) || !is_file($filePath)) {
        throw new RuntimeException('View not found: ' . $page);
    }

    return $filePath;
}


/**
 * Display a view with the header and footer.
 *
 * @param string $page
 * @param array $data
 * @return void
 */
function view(string $page, array $data = []): void
{
    $viewPath = resolveViewPath($page);

    extract($data, EXTR_SKIP);

    require INCLUDE_PATH . '/header.php';

    require $viewPath;

    require INCLUDE_PATH . '/footer.php';
}


/**
 * Display a partial view.
 *
 * @param string $page
 * @param array $data
 * @return void
 */
function partial(string $page, array $data = []): void
{
    $viewPath = resolveViewPath($page);

    extract($data, EXTR_SKIP);

    require $viewPath;
}


/**
 * Redirect to an internal application route.
 *
 * @param string $route
 * @return never
 */
function redirect(string $route): never
{
    if (!preg_match('/^[a-zA-Z0-9_-]+$/', $route)) {
        throw new InvalidArgumentException('Invalid route.');
    }

    if (headers_sent()) {
        throw new RuntimeException('Cannot redirect: headers already sent.');
    }

    header('Location: ?action=' . rawurlencode($route), true, 303);

    exit;
}