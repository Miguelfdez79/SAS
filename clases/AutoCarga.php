<?php

class AutoCarga {
    static function cargar($clase){
        $clases = str_replace("\\", "/", $clase);
        $archivo = $clase . ".php";
        require $archivo;
    }
    
}
spl_autoload_register('AutoCarga::cargar');
