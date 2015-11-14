<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TransformarDump
 *
 * @author Miguel
 */
class TransformarDump {

    private static function transformar($files) {
        $array = array();
        $numerodeindices = count($files['name']);
        for ($i = 0; $i < $numerodeindices; $i++) {
            $array[$i]["name"] = $files["name"][$i];
            $array[$i]["type"] = $files["type"][$i];
            $array[$i]["tmp_error"] = $files["tmp_error"][$i];
            $array[$i]["error"] = $files["error"][$i];
            $array[$i]["size"] = $files["size"][$i];
        }
        return $array;
    }

    private static function transformar2($files) {
        $array = array();
        foreach ($files as $indice => $valor) {
            foreach ($valorarray as $numeroarchivo => $valor2) {
                $array[$numeroarchivo][$indice] = $valor;
            }
        }
        
        return $array;
    }

}
