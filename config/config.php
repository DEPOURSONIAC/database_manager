<?php

/*
    Project configuration.

    Contains:
    - Application settings
    - Project paths
    - Application URL
    - Storage paths
    - Database configuration
*/

// --------------------
// APPLICATION
// --------------------

define('APP_NAME', 'Database Manager');

define('APP_ENV', 'development');

define('APP_DEBUG', true);

// --------------------
// PROJECT ROOT
// --------------------

define('ROOT', dirname(__DIR__));

define('APP_PATH', ROOT . '/app');
define('MODEL_PATH', APP_PATH . '/models');
define('VIEW_PATH', APP_PATH . '/views');
define('CONTROLLER_PATH', APP_PATH . '/controllers');

define('CORE_PATH', ROOT . '/core');
define('INCLUDE_PATH', ROOT . '/includes');
define('PUBLIC_PATH', ROOT . '/public');

// --------------------
// URL
// --------------------

define('BASE_URL', 'http://localhost/gestionnaire_bdd/');

// --------------------
// STORAGE
// --------------------

define('STORAGE_PATH', ROOT . '/storage');

define('DATABASES_PATH', STORAGE_PATH . '/databases');
define('UPLOAD_TEMP_PATH', STORAGE_PATH . '/uploads/temporary');
define('LOGS_PATH', STORAGE_PATH . '/logs');

// --------------------
// DATABASE
// --------------------

define('DB_PATH', ROOT . '/config/application.db');