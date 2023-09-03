<?php 

spl_autoload_register(function ($className) {
    $baseDir = __DIR__ . '/app/';

    $className = str_replace("App\\", "", $className);

    $className = str_replace('\\', '/', $className);
    
    $classFile = $baseDir . $className . '.php';

    if (file_exists($classFile)) {
        require_once $classFile;
    }
});