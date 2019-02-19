<?php
require_once 'messages.php';

//site specific configuration declartion
define( 'BASE_PATH', 'http://localhost/homestayku.my-jquery');
define( 'DB_HOST', 'localhost' );
define( 'DB_USERNAME', 'root');
define( 'DB_PASSWORD', '');
define( 'DB_NAME', 'homestayku.my');

function __autoload($class)
{
	$parts = explode('_', $class);
	$path = implode(DIRECTORY_SEPARATOR,$parts);
	require_once $path . '.php';
}
