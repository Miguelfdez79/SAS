<?php


/**
 * Description of Usuario
 *
 * @author Miguel
 */
class Paciente {
    private $nombre, $tarjetasanitaria, $dni;
    
       function _construct($nombre = null, $tarjetasanitaria = null, $dni=null ){
        $this->tarjetasanitaria =$tarjetasanitaria;
        $this->nombre= $nombre;
        $this->dni=$dni;
    }
 
    function getNombre() {
        return $this->nombre;
    }

    function getTarjetasanitaria() {
        return $this->tarjetasanitaria;
    }

    function getDni() {
        return $this->dni;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setTarjetasanitaria($tarjetasanitaria) {
        $this->tarjetasanitaria = $tarjetasanitaria;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }





}
