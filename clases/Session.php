<?php

class Session {

    private static $iniciada = false;
    private $trusted = true;

    //ip del cliente
    // navegador
    // tiempo


    function __construct() {
        if (!self::$iniciada) {
            session_start();
//            $this->_control();
            $ip = $this->get("_ip");
            $cliente = $this->get("_cliente");
            if ($ip == null && $cliente == null) {
                $this->set("_ip", Server::getClientAddres());
                $this->set("_cliente", Server::getUserAgent());
            } else {
                if ($ip !== Server::getClientAddres() || $cliente !== Server::getUserAgent()) {
                    $this->destroy();
                    //$this->truested = false;  // Esto lo podemos usar como alternativa (lo veremos más adelante)
                }
            }
        }
        self::$iniciada = true;
    }

//    private function _control() {
//        $ip = $this->get("_ip");
//        $cliente = $this->get("_cliente");
//        if ($ip == null && $cliente == null) {
//            $this->set("_ip", Server::getClientAddres());
//            $this->set("_cliente", Server::getUserAgent());
//        } else {
//            if ($ip !== Server::getClientAddres() || $cliente !== Server::getUserAgent()) {
//                $this->destroy();
//                //$this->truested = false;  // Esto lo podemos usar como alternativa (lo veremos más adelante)
//            }
//        }
//    }

    function get($nombre) {
        if (isset($_SESSION[$nombre])) {
            return $_SESSION[$nombre];
        }
        return null;
    }

    function getUser(){
        return $this->get("_usuario");
        
    }
            
    function isLogged(){
        return $this->getUser() !== null;
        
    }
            
    
    function set($nombre, $valor) {
        $_SESSION[$nombre] = $valor;
    }
    
    
    function setUser($usuario){
        $this->set("_usuario", $usuario);
                
    }
    
    
                function delete($nombre) {
        if (isset($_SESSION[$nombre])) {
            unset($_SESSION["nombre"]);
        }
        return null;
    }

    function destroy() {
        session_destroy();
    }

    function sendRedirect ($destino = "index.php", $final = true){
        header("Location: $destino");
        if($fianl===true){
            exit();
        }
        
    }




    // Esquema de sesion mínimo //
}
