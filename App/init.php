<?php
spl_autoload_register(function ($className) {
    $paths = ['./Controllers/', './Models/', './Config/'];
    foreach ($paths as $path) {
        $file = __DIR__ . "/{$path}{$className}.php";
        if (file_exists($file)) {
            // echo "Loading file: $file<br>"; // Debugging
            require_once $file;
            return;
        }
    }
    die("File $className.php tidak tersedia");
});
