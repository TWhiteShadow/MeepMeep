<?php

final class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {

            var_dump($class);

            if (str_starts_with($class, "App\\")){
                $class=substr_replace($class,"src", 0, 3);
            }

            $file = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';

            var_dump($file);

            if (file_exists($file)) {
                require $file;

                return true;
            }

            return false;
        });
    }
}

Autoloader::register();
