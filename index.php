<?php

$request = explode('/', $_SERVER['REQUEST_URI']);
$page = $request[2];
$id = $request[3] ?? null;

if(isset($id)){
    $_SESSION['id'] = $id;
    echo $_SESSION['id'];
}

$folder = './private/pages/';
$files = glob($folder . '*.php');

if(in_array($folder . $page . '.php', $files)){
    include ($folder . $page . '.php');
} else {
    http_response_code(404);
    echo '????';
    echo '<a href="home">home</a>';
};

