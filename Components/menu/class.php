<?php

namespace Main\Component;

class Menu
{

    public static function getCurrentMenu()
    {
        dump(__FILE__);
        dump(__DIR__);
        $files = scandir(__DIR__);
        $menu = [];
        foreach ($files as $file) {
            dump($file);
            $menu[] = $file;
        }
        return $menu;
    }
}
