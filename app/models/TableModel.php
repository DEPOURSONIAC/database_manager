<?php

/**
 * Open an external SQLite database in read-only mode.
 *
 * The database must be registered in the internal application database.
 *
 * @param string $database_name Name of the external database.
 *
 * @return PDO|null Database connection or null if unavailable.
 */
function tableModelGetConnection(string $database_name): ?PDO
{
    $db = null;

    try {
        // Check that the database name is valid.
        if (preg_match('/^[a-zA-Z0-9_-]+$/', $database_name)) {

            // Check that the database is registered in the application.
            $pdo = getPDO();

            $sql = "SELECT id FROM databases WHERE name = ?";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$database_name]);

            $database = $stmt->fetch();

            // Continue only if the database is registered.
            if ($database !== false) {

                // Build the path to the external database.
                $database_path = DATABASES_PATH . '/'. $database_name . '/'. $database_name . '.db';

                // Check that the database file exists.
                if (is_file($database_path)) {

                    // Open the database in read-only mode.
                    $db = new PDO(
                        'sqlite:' . $database_path,null,null,
                        [
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                            PDO::SQLITE_ATTR_OPEN_FLAGS => PDO::SQLITE_OPEN_READONLY
                        ]
                    );

                    // Prevent modifications through this connection.
                    $db->exec('PRAGMA query_only = ON');
                }
            }
        }

    } catch (PDOException $e) {
        error_log(__FUNCTION__ . '(): ' . $e->getMessage());
        $db = null;
    }

    return $db;
}


/**
 * Get information about a table or view.
 *
 * @param PDO $db External database connection.
 * @param string $table_name Table or view name.
 *
 * @return array|null Object information or null if not found.
 */
function tableModelGetObjectInfo(PDO $db, string $table_name): ?array
{
    $result = null;

    try {
        $sql = "SELECT name, type, sql FROM sqlite_master WHERE name = ? AND type IN ('table', 'view') AND name NOT LIKE 'sqlite_%'";

        $stmt = $db->prepare($sql);
        $stmt->execute([$table_name]);

        $result = $stmt->fetch() ?: null;

    } catch (PDOException $e) {
        error_log(__FUNCTION__ . '(): ' . $e->getMessage());
    }

    return $result;
}


/**
 * Check whether a column exists in a table or view.
 *
 * @param PDO $db External database connection.
 * @param string $table_name Table or view name.
 * @param string $column_name Column name.
 *
 * @return bool True if the column exists, otherwise false.
 */
function tableModelColumnExists(PDO $db, string $table_name, string $column_name): bool 
{
    $exists = false;

    try {
        $sql = "SELECT 1 FROM pragma_table_info(?) WHERE name = ?";

        $stmt = $db->prepare($sql);

        $stmt->execute([$table_name, $column_name]);

        $exists = $stmt->fetchColumn() !== false;

    } catch (PDOException $e) {
        error_log(__FUNCTION__ . '(): ' . $e->getMessage());
    }

    return $exists;
}


/**
 * Quote a SQLite table or column name.
 *
 * @param string $identifier Table or column name.
 *
 * @return string Safely quoted identifier.
 */
function tableModelQuoteIdentifier(string $identifier): string
{
    $quoted_identifier = '"' . str_replace('"', '""', $identifier) . '"';

    return $quoted_identifier;
}


/**
 * Get all tables and views from an external database.
 *
 * @param string $database_name Name of the external database.
 *
 * @return array List of tables and views.
 */
function getTablesAndViews(string $database_name): array
{
    $tables = [];

    try {
        $db = tableModelGetConnection($database_name);

        if ($db !== null) {

            $sql = "SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') AND name NOT LIKE 'sqlite_%' ORDER BY type, name";

            $stmt = $db->prepare($sql);
            $stmt->execute();

            $tables = $stmt->fetchAll();
        }

    } catch (PDOException $e) {
        error_log(__FUNCTION__ . '(): ' . $e->getMessage());
    }

    return $tables;
}


/**
 * Get the columns of a table or view.
 *
 * @param string $database_name Name of the external database.
 * @param string $table_name Table or view name.
 *
 * @return array List of columns.
 */
function getTableColumns(string $database_name, string $table_name): array
{
    $columns = [];

    try {
        $db = tableModelGetConnection($database_name);

        if ($db !== null) {

            // Check that the table or view exists.
            $table_info = tableModelGetObjectInfo($db, $table_name);

            if ($table_info !== null) {

                $sql = "SELECT * FROM pragma_table_info(?)";

                $stmt = $db->prepare($sql);
                $stmt->execute([$table_name]);

                $columns = $stmt->fetchAll();
            }
        }

    } catch (PDOException $e) {
        error_log(__FUNCTION__ . '(): ' . $e->getMessage());
    }

    return $columns;
}


/**
 * Get information about a table or view.
 *
 * @param string $database_name Name of the external database.
 * @param string $table_name Table or view name.
 *
 * @return array|null Object information or null if not found.
 */
function getTableInfo(string $database_name, string $table_name): ?array
{
    $result = null;

    try {
        $db = tableModelGetConnection($database_name);

        if ($db !== null) {
            $result = tableModelGetObjectInfo($db, $table_name);
        }

    } catch (PDOException $e) {
        error_log(__FUNCTION__ . '(): ' . $e->getMessage());
    }

    return $result;
}


/**
 * Get table or view data with pagination.
 *
 * @param string $database_name Name of the external database.
 * @param string $table_name Table or view name.
 * @param int $limit Maximum number of rows.
 * @param int $offset Number of rows to skip.
 *
 * @return array Table or view rows.
 */
function getTableData(string $database_name, string $table_name, int $limit = 20, int $offset = 0): array 
{
    $rows = [];

    try {
        $db = tableModelGetConnection($database_name);

        if ($db !== null && $limit > 0 && $offset >= 0) {

            $table_info = tableModelGetObjectInfo($db, $table_name);

            if ($table_info !== null) {

                $quoted_table = tableModelQuoteIdentifier($table_name);

                $sql = "SELECT * FROM {$quoted_table} LIMIT :limit OFFSET :offset";

                $stmt = $db->prepare($sql);

                $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

                $stmt->execute();

                $rows = $stmt->fetchAll();
            }
        }

    } catch (PDOException $e) {
        error_log(__FUNCTION__ . '(): ' . $e->getMessage());
    }

    return $rows;
}


/**
 * Get filtered table or view data with pagination.
 *
 * @param string $database_name Name of the external database.
 * @param string $table_name Table or view name.
 * @param string $column_name Column used for filtering.
 * @param mixed $value Value to search for.
 * @param int $limit Maximum number of rows.
 * @param int $offset Number of rows to skip.
 *
 * @return array Filtered rows.
 */
function getFilteredTableData(string $database_name, string $table_name, string $column_name, mixed $value, int $limit = 20, int $offset = 0): array 
{
    $rows = [];

    try {
        $db = tableModelGetConnection($database_name);

        if ($db !== null && $limit > 0 && $offset >= 0) {

            $table_info = tableModelGetObjectInfo($db, $table_name);

            if ($table_info !== null && tableModelColumnExists($db, $table_name, $column_name)) 
                {
                $quoted_table = tableModelQuoteIdentifier($table_name);
                $quoted_column = tableModelQuoteIdentifier($column_name);

                // Handle NULL values separately because SQL uses IS NULL.
                if ($value === null) {
                    $condition = "{$quoted_column} IS NULL";
                } else {
                    $condition = "{$quoted_column} = :value";
                }

                $sql = "SELECT * FROM {$quoted_table} WHERE {$condition} LIMIT :limit OFFSET :offset";

                $stmt = $db->prepare($sql);

                if ($value !== null) {
                    $stmt->bindValue(':value', $value);
                }

                $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

                $stmt->execute();

                $rows = $stmt->fetchAll();
            }
        }

    } catch (PDOException $e) {
        error_log(__FUNCTION__ . '(): ' . $e->getMessage());
    }

    return $rows;
}


/**
 * Get sorted table or view data with pagination.
 *
 * @param string $database_name Name of the external database.
 * @param string $table_name Table or view name.
 * @param string $column_name Column used for sorting.
 * @param string $direction Sort direction: ASC or DESC.
 * @param int $limit Maximum number of rows.
 * @param int $offset Number of rows to skip.
 *
 * @return array Sorted rows.
 */
function getSortedTableData(string $database_name, string $table_name, string $column_name, string $direction = 'ASC', int $limit = 20, int $offset = 0): array 
{
    $rows = [];

    try {
        $db = tableModelGetConnection($database_name);

        if ($db !== null && $limit > 0 && $offset >= 0) {

            $table_info = tableModelGetObjectInfo($db, $table_name);

            $direction = strtoupper($direction);

            if (
                $table_info !== null &&
                in_array($direction, ['ASC', 'DESC'], true) &&
                tableModelColumnExists($db, $table_name, $column_name)
            ) {
                $quoted_table = tableModelQuoteIdentifier($table_name);
                $quoted_column = tableModelQuoteIdentifier($column_name);

                $sql = "SELECT * FROM {$quoted_table} ORDER BY {$quoted_column} {$direction} LIMIT :limit OFFSET :offset";

                $stmt = $db->prepare($sql);

                $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

                $stmt->execute();

                $rows = $stmt->fetchAll();
            }
        }

    } catch (PDOException $e) {
        error_log(__FUNCTION__ . '(): ' . $e->getMessage());
    }

    return $rows;
}


/**
 * Count the rows in a table or view.
 *
 * @param string $database_name Name of the external database.
 * @param string $table_name Table or view name.
 *
 * @return int Number of rows.
 */
function getTableCount(string $database_name, string $table_name): int
{
    $count = 0;

    try {
        $db = tableModelGetConnection($database_name);

        if ($db !== null) {

            $table_info = tableModelGetObjectInfo($db, $table_name);

            if ($table_info !== null) {

                $quoted_table = tableModelQuoteIdentifier($table_name);

                $sql = "SELECT COUNT(*) FROM {$quoted_table}";

                $stmt = $db->prepare($sql);
                $stmt->execute();

                $count = (int) $stmt->fetchColumn();
            }
        }

    } catch (PDOException $e) {
        error_log(__FUNCTION__ . '(): ' . $e->getMessage());
    }

    return $count;
}