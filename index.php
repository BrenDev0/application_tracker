<?php

$request = explode('/', $_SERVER['REQUEST_URI']);
$page = $request[2];
$styles = $request[4] ?? null;
$id = $request[3] ?? null;

if(isset($id) && intval($id)){
    $_SESSION['id'] = intval($id);
}

$folder = './private/pages/';
$files = glob($folder . '*.php');


if(in_array($folder . $page . '.php', $files)){
    include ($folder . $page . '.php');
} else {
    http_response_code(404);
    echo '<a href="home">home</a>';
};



