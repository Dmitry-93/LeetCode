<?php

namespace module\main;

class Application
{
    /**
     * Объект приложения
     * @var Application|null
     */
    private static ?Application $instance = null;

    /**
     * Массив с именами системных файлов и папок не участвующих в построении структуры меню.
     * @var array|string[]
     */
    private static array $systemFilesAndDir = [
        './module',
        './vendor',
    ];

    /**
     * Метод возвращает экземпляр приложения.
     * @return static $instance
     */
    public static function getInstance(): self
    {
        if (!static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    public static function getMenuStructure(bool $showSystemFilesOrDir = false): array
    {
        $menu[] = self::recursive('/', $showSystemFilesOrDir);
        return $menu;
    }

    private static function recursive(string $path, bool $showSystemFilesOrDir): array
    {
        $scanFiles = scandir('.' . $path);
        $menu = [];
        foreach ($scanFiles as $fileName) {
            $filePath = $path . $fileName;
            if (str_contains($fileName, '.') || (!$showSystemFilesOrDir && self::isSystemFilesOrDir('.' . $filePath))) {
                continue;
            }
            $menu[$fileName] = self::recursive($filePath, $showSystemFilesOrDir);
        }
        return $menu;
    }

    /**
     * Метод проверяет папку/файл на то, является ли она системной и скрытой для публичного отображения.
     * @param string $path Имя файла с путем к нему от корня проекта без точки.
     * @return bool
     */
    public static function isSystemFilesOrDir(string $path): bool
    {
        return in_array('.' . $path, self::$systemFilesAndDir, true);
    }

}