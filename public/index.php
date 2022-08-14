<?php
include '../vendor/autoload.php';

use Pecee\SimpleRouter\SimpleRouter;

/* Load external routes file */
require_once '../routes/api.php';

/**
 * The default namespace for route-callbacks, so we don't have to specify it each time.
 * Can be overwritten by using the namespace config option on your routes.
 */

SimpleRouter::setDefaultNamespace('\App\Controllers');

SimpleRouter::router()->setDebugEnabled(true);

// Start the routing
SimpleRouter::start();

$messages = SimpleRouter::router()->getDebugLog();