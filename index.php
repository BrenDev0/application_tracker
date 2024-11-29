<?php

$request = explode('/', $_SERVER['REQUEST_URI']);
$page = $request[2];

$folder = './private/pages/';
$files = glob($folder . '*.php');

echo 'indexpage';
if(in_array($folder . $page . '.php', $files)){
    include ($folder . $page . '.php');
} else {
    echo '404 FILE NOT FOUND';
};

