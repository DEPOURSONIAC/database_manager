<?php

/**
 * Load application files.
 *
 * Files are loaded in the following order:
 * 1. Models
 * 2. Controllers
 *
 * @return void
 */


// ---------------
// MODELS
// ---------------
require_once MODEL_PATH . '/DatabasehModel.php';
require_once MODEL_PATH . '/TableModel.php';

// ---------------
// CONTROLLERS
// ---------------
require_once CONTROLLER_PATH . '/HomeController.php';