<?php

class Validar {
    
    static function isEmail($valor){
        return filter_var($valor, FILTER_VALIDATE_EMAIL);
    }
    
    static function isInt($valor){
        return filter_var($valor, FILTER_VALIDATE_INT);
    }
    
    static function isFloat($valor){
        return filter_var($valor, FILTER_VALIDATE_FLOAT);
    }
    
    static function isIp($valor){
        return filter_var($valor, FILTER_VALIDATE_IP);
    }
    
    static function isUrl($valor){
        return filter_var($valor, FILTER_VALIDATE_URL);
    }
    
    static function isMinLength($valor, $length){
        return strlen($valor) >= $length;
    }
    
    static function isLogin($valor){
        return preg_match("/^[A-Za-z][A-Za-z0-9]{5,9}$/", $valor);
    }
    
}
