<?php

namespace module\main;

class Application
{
    private static ?Application $instance = null;

    private static array $systemFilesAndDir = [
        'module',
        'vendor',
    ];

    public static function getInstance(): self
    {
        if (!static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    public static function getHeader(bool $showSystemFilesOrDir = false): array
    {
        $files = scandir('./');
        $menu = [];
        foreach ($files as $file) {
            if (str_contains($file, '.') || (!$showSystemFilesOrDir && self::isSystemFilesOrDir($file))) {
                continue;
            }
            dump($file);
            $menu[] = $file;
        }
        return $menu;
    }

    /**
     * @param string $name
     * @return bool
     */
    public static function isSystemFilesOrDir(string $name): bool
    {
        return in_array($name, self::$systemFilesAndDir, true);
    }

}