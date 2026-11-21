<?php

/**
 * Display all registered databases.
 *
 * @return void
 */
function showDatabases(): void
{
    $databases = getAllDatabases();

    foreach ($databases as &$database) {
        $database['available'] = tableModelIsDatabaseAvailable($database['name']);
    }

    unset($database);

    $databaseCount = count($databases);

    view('databases', [
        'databases' => $databases,
        'databaseCount' => $databaseCount,
    ]);
}


/**
 * Display the database exploration page.
 *
 * @return void
 */
function showDatabase(): void
{
    view('database/index');
}