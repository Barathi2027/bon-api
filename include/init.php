<?php

// Database
require_once '../config/DB.php';

// Core
require_once 'Models.php';
require_once 'sanitize.php';

// Constants
define('FETCH', 'FETCH');
define('EXECUTE', 'EXECUTE');
define('MESSAGE', 'message');
define('ERROR', 'error');
define('DATA', 'data');
define('METHOD', $_SERVER['REQUEST_METHOD']);
define('POST', 'POST');
define('GET', 'GET');
define('PUT', 'PUT');
define('DELETE', 'DELETE');
