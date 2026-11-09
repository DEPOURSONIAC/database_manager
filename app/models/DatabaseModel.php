<?php

/**
 * Get all registered databases.
 *
 * @return array List of all registered databases.
 */
function getAllDatabases(): array
{
    $db = getPDO();
    $databases = [];

    try {
        $sql = "SELECT * FROM databases ORDER BY id DESC";

        $stmt = $db->query($sql);

        $databases = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log(__FUNCTION__ . '(): ' . $e->getMessage());
    }

    return $databases;
}


/**
 * Get a registered database by its ID.
 *
 * @param int $database_id Database ID.
 *
 * @return array|null Database data if found, otherwise null.
 */
function getDatabaseById(int $database_id): ?array
{
    $db = getPDO();
    $database = null;

    try {
        if ($database_id > 0) {
            $sql = "SELECT * FROM databases WHERE id = ? LIMIT 1";

            $stmt = $db->prepare($sql);
            $stmt->execute([$database_id]);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $database = $result ?: null;
        }
    } catch (PDOException $e) {
        error_log(__FUNCTION__ . '(): ' . $e->getMessage());
    }

    return $database;
}


/**
 * Get a registered database by its name.
 *
 * @param string $name Database name.
 *
 * @return array|null Database data if found, otherwise null.
 */
function getDatabaseByName(string $name): ?array
{
    $db = getPDO();
    $database = null;

    try {
        if (!empty($name)) {
            $sql = "SELECT * FROM databases WHERE name = ? LIMIT 1";

            $stmt = $db->prepare($sql);
            $stmt->execute([$name]);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $database = $result ?: null;
        }
    } catch (PDOException $e) {
        error_log(__FUNCTION__ . '(): ' . $e->getMessage());
    }

    return $database;
}


/**
 * Get the total number of registered databases.
 *
 * @return int Total number of registered databases.
 */
function getDatabaseCount(): int
{
    $db = getPDO();
    $count = 0;

    try {
        $sql = "SELECT COUNT(*) FROM databases";

        $stmt = $db->query($sql);

        $count = (int) $stmt->fetchColumn();
    } catch (PDOException $e) {
        error_log(__FUNCTION__ . '(): ' . $e->getMessage());
    }

    return $count;
}


/**
 * Register a new database.
 *
 * @param string $name Database name.
 *
 * @return bool True if the database was registered successfully.
 */
function addDatabase(string $name): bool
{
    $db = getPDO();
    $created = false;

    try {
        if (preg_match('/^[a-zA-Z0-9_-]+$/', $name)) {
            $sql = "INSERT INTO databases (name) VALUES (?)";

            $stmt = $db->prepare($sql);

            $created = $stmt->execute([$name]);
        }
    } catch (PDOException $e) {
        error_log(__FUNCTION__ . '(): ' . $e->getMessage());
    }

    return $created;
}


/**
 * Delete a registered database.
 *
 * @param int $database_id Database ID.
 *
 * @return bool True if the database reference was deleted successfully.
 */
function deleteDatabase(int $database_id): bool
{
    $db = getPDO();
    $deleted = false;

    try {
        if ($database_id > 0) {
            $sql = "DELETE FROM databases WHERE id = ?";

            $stmt = $db->prepare($sql);
            $stmt->execute([$database_id]);

            $deleted = $stmt->rowCount() > 0;
        }
    } catch (PDOException $e) {
        error_log(__FUNCTION__ . '(): ' . $e->getMessage());
    }

    return $deleted;
}