<?php

use MyApp\classes\Product;

require_once('../vendor/autoload.php');
include_once('db_credentials.php');

$database = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

Product::set_database($database);

?>