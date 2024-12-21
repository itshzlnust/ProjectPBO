<?php
session_start();
require_once './App/init.php';

// Ambil URL yang diminta
$url = isset($_GET['url']) ? $_GET['url'] : 'user/home';
$segments = explode('/', $url);
$controllerName = ucfirst($segments[0]) . 'Controller';
$controllerFile = './App/Controllers/' . $controllerName . '.php';

// Debugging: Tampilkan informasi tentang controller yang dicari
// echo "URL: $url<br>";
// echo "Controller Name: $controllerName<br>";
// echo "Controller File: $controllerFile<br>";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controller = new $controllerName();
    $method = isset($segments[1]) ? $segments[1] : 'home';

    // Debugging: Tampilkan informasi tentang metode yang dipanggil
    // echo "Method: $method<br>";

    // Menangani login user
    if ($controllerName == 'AuthController' && $method == 'login') {
        $controller->$method();
    } else {
        if (isset($_SESSION['user_id']) || $controllerName == 'AuthController') {
            if (method_exists($controller, $method)) {
                // Handle parameters if any
                $params = array_slice($segments, 2);
                call_user_func_array([$controller, $method], $params);
            } else {
                echo "Method $method not found in controller $controllerName.";
            }
        } else {
            header("Location: index.php?url=auth/login");
        }
    }
} else {
    echo "Page not found. Controller file $controllerFile does not exist.";
}
