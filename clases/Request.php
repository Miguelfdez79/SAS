<?php

class Request {

    static function get($nombre, $filtrar = true, $indice = null) {
        if (isset($_GET[$nombre])) {
            return self::read($_GET[$nombre], $filtrar, $indice);
        }
        return null;
    }

    static function post($nombre, $filtrar = true, $indice = null) {
        if (isset($_POST[$nombre])) {
            return self::read($_POST[$nombre], $filtrar, $indice);
        }
        return null;
    }

    static function req($nombre, $indice = null) {
        //if (Server::isPost() && self::post($nombre, $indice) != null) {
        $valor = self::post($nombre, $indice);

        if ($valor !== null) {
            return $valor;
        }
        return self::get($nombre, $indice);
    }

// filtrar y limpiar valores <script>...</script>
    private static function clean($valor, $filtrar) {
//.. limpiando
        if ($filtrar === true) {
            $valor = htmlspecialchars($valor);
        }
        return trim($valor);
    }

//$parametro llegará -> $_GET[$nombre] o $_POST[$nombre];
    private static function read($parametro, $filtrar = true, $indice = null) {

//Lee un array y devuelve un array o lee un array y devuelve la posición.

        /* a) si es null -> leemos el nombre y devolver el array de valores del nombre
         * b) si se intrduce el índice i -> comprobar que esté dentro del rango permitido y devolver
         *      el valor del elemento i y si no existe, que devuelva null
         *      (y otro que sea elements($nombre) y devuelva el numero de elementos hay 
         */

        if (is_array($parametro)) {
            if ($indice === null) {
                $array = array();
                foreach ($parametro as $valor) {
                    $array[] = self::clean($valor, $filtrar);
                }
                return $array;
            } else {
                if (isset($parametro[$indice])) {
                    return self::clean($parametro[$indice], $filtrar);
                }
            }
        } else {
            return self::clean($parametro, $filtrar);
        }
    }

//    static function requestV2($nombre) {
//        if (Server::isPost()) {
//            if (self::post($nombre) != null) {
//                return self::post($nombre);
//            }
//        } else {
//            return self::get($nombre);
//        }
//    }
}
