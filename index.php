<?php

$request = explode('/', $_SERVER['REQUEST_URI']);
$page = $request[2];

$folder = './private/pages/';
$files = glob($folder . '*.php');

if(in_array($folder . $page . '.php', $files)){
    include ($folder . $page . '.php');
} else {
    http_response_code(404);
};

