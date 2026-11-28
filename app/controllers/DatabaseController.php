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


function showDatabase(int $id): void
{
    $database_report = getDatabaseById($id);

    $database_name = $database_report['name'];

    $tables = [];
    $views = [];
    $tableCount = 0;
    $viewCount = 0;

    $available = false ;

    if ($database_name !== null) {
        $available = true;
        $objects = getTablesAndViews($database_name);

        foreach ($objects as $object) {
            if ($object['type'] === 'table') {
                $tables[] = $object;
            } elseif ($object['type'] === 'view') {
                $views[] = $object;
            }
        }

        $tableCount = count($tables);
        $viewCount = count($views);
    }

    view('database/index', [
        'database_name' => $database_name,
        'tables' => $tables,
        'views' => $views,
        'tableCount' => $tableCount,
        'viewCount' => $viewCount,
        'id' => $id,
        'available' => $available,
        
        
    ]);
}