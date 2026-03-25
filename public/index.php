<?php

/*
 *---------------------------------------------------------------
 * CHECK PHP VERSION
 *---------------------------------------------------------------
 */

$minPhpVersion = '8.1'; // If you update this, don't forget to update `spark`.
// Check for valid PHP version
if (version_compare(PHP_VERSION, '8.1', '<')) {
    exit('Your PHP version must be 8.1 or higher to run CodeIgniter. Current version: ' . PHP_VERSION);
}

// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Ensure the current directory is pointing to the front controller's directory
chdir(FCPATH);

// Load our paths config file
// This is the line that usually needs updating to point to your app/Config/Paths.php
require FCPATH . '../app/Config/Paths.php';
$paths = new Config\Paths();

// LOAD THE FRAMEWORK BOOTSTRAP FILE
require $paths->systemDirectory . '/Boot.php'; // Updated from bootstrap.php to Boot.php

exit(CodeIgniter\Boot::bootWeb($paths));

