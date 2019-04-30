<?php
session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'marianna',
        'password' => 'root',
        'db' => 'ping-pong'
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    )
);


//instead of require_once all the classes, you do this:
spl_autoload_register(function($class) {
    require_once 'classes/' . $class . '.php';

});

require_once 'functions/sanitize.php';