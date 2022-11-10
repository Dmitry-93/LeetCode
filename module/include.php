<?php

spl_autoload_register(function ($className) {
    $baseName = 'module';
    $className = trim(mb_substr($className, mb_strlen($baseName)), '\\');
    $classPath = __DIR__ . '/' . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    if (file_exists($classPath)) {
        require_once($classPath);
    }
});
