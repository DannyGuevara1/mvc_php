<?php

class Route {
    // Properties
    private static $routes = [];

    // Methods
    public static function get($url, $fn) {
        self::$routes['GET'][$url] = $fn;
    }
    public static function post($url, $fn) {
        self::$routes['POST'][$url] = $fn;
    }

    public static function dispatch() {
        $url = $_SERVER['REQUEST_URI'];
        $url = str_replace('/pdo/public', '', $url);
        $method = $_SERVER['REQUEST_METHOD'];

        $routeFound = false;

        foreach (self::$routes[$method] as $route => $callback) {
            // Convertir la ruta a un patrón de expresión regular
            $routePattern = preg_replace('/{[^}]+}/', '([^/]+)', $route);
            if (preg_match("#^$routePattern$#", $url, $matches)) {
                array_shift($matches); // Eliminar la primera coincidencia que es la URL completa
                $routeFound = true;

                if (is_array($callback)) {
                    // Crear una instancia del controlador
                    $controller = new $callback[0];
                    $method = $callback[1];
                    call_user_func_array([$controller, $method], $matches);
                } else {
                    // Si es una función anónima, simplemente llamarla
                    call_user_func_array($callback, $matches);
                }
                break;
            }
        }

        if (!$routeFound) {
            echo "404 Not Found";
        }
    }

}

?>
