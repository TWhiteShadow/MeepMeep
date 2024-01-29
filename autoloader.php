<?php

final readonly class Autoloader
{
    public static function register(): void
    {
        spl_autoload_register(function ($class) {
            if (str_starts_with($class, 'App\\')) {
                $class = substr_replace($class, 'src', 0, 3);
            }

            $file = '../' . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

            if (file_exists($file)) {
                require $file;

                return true;
            }

            return false;
        });
    }
}

Autoloader::register();
