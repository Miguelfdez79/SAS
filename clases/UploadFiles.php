<?php

/**
 * Description of Listpodcast
 *
 * @author Miguel
 */

class UploadFiles {

    private $arrayarchivos = [ Array()];
    private $arrayDeTipos = Array("JPG" => 1, "jpg" => 1);

    const CONSERVAR = 1;
    const REMPLAZAR = 2;
    const RENOMBRAR = 3;

    private $politica = self::RENOMBRAR, $error = false, $long = 0;

    //Nuestro constructor similar al uploadfile normal, añadiremos un foreach
    function __construct($parametro, $destino = "../../../Pacientes/") {
        if (isset($_FILES[$parametro])) { // Si está seteado
            $arrayTemp = $this->tranformar($_FILES[$parametro]); // Creamos un array temporal llamando a transformar pasandole el array donde irá el parametro
            foreach ($arrayTemp as $indice => $valor) {
                if ($valor["name"] !== "") { // Recogemos por name
                    $this->long++;
                    $this->arrayarchivos[$indice]["destino"] = $destino;
                    $this->arrayarchivos[$indice]["ubicacionTemporal"] = $valor["tmp_name"];
                    $this->arrayarchivos[$indice]["nombre"] = pathinfo($valor["name"])["filename"];
                    $this->arrayarchivos[$indice]["extension"] = pathinfo($valor["name"])["extension"];
                    $this->arrayarchivos[$indice]["tamaño"] = $valor["size"];
                    $this->arrayarchivos[$indice]["tamañoMax"] = 5000000000;
                    $this->arrayarchivos[$indice]["parametro"] = $parametro;
                    $this->arrayarchivos[$indice]["errorArchivo"] = false;
                    $this->arrayarchivos[$indice]["error"] = $valor["error"];
                    $this->arrayarchivos[$indice]["subido"] = false;
                } else {
                    $this->arrayarchivos["errorArchivo"] = true;
                }
            }
        } else {
            $this->error = true;
        }
    }


    public function getDestino($indice) {
        return $this->arrayarchivos[$indice]["destino"];
    }

    public function getSize() {
        return $this->long;
    }


    public function setSize($long) {
        $this->long = $long;
    }

    public function getName($indice) {
        return $this->arrayarchivos[$indice]["nombre"];
    }

    public function getTamaño($indice) {
        return $this->arrayarchivos[$indice]["tamaño"];
    }

    public function getExtension($indice) {
        return $this->arrayarchivos[$indice]["extension"];
    }

    public function getPolitica() {
        return $this->politica;
    }

    public function setName($name, $indice) {
        $this->arrayarchivos[$indice]["nombre"] = $name;
    }

    public function setDestino($destino, $indice) {
        $this->arrayarchivos[$indice]["destino"] = $destino;
    }
    
       public function getArray() {
        return $this->arrayarchivos;
    }

    public function setArray($array) {
        $this->arrayarchivos = $array;
    }

    public function upload() {
        foreach ($this->arrayarchivos as $archivo => $valor) {
            if ($valor["subido"])
                continue;
            if ($valor["error"])
                continue;
            if ($valor["errorArchivo"] != UPLOAD_ERR_OK)
                continue;
            if ($valor["tamaño"] > $valor["tamañoMax"])
                continue;
            if (!$this->isTipo($valor["extension"]))
                continue;
            if (!(is_dir($valor["destino"]) && substr($valor["destino"], -1) === "/"))
                continue;
            if ($this->politica === self::RENOMBRAR && file_exists($valor["destino"] . $valor["nombre"] . "." . $valor["extension"]))
                $valor["nombre"] = $this->remplazar($archivo, $valor["nombre"]);
            if (move_uploaded_file($valor["ubicacionTemporal"], $valor["destino"] . $valor["nombre"] . "." . $valor["extension"])) {
                $this->arrayarchivos[$archivo]["subido"] = true;
            } else {
                $this->arrayarchivos[$archivo]["subido"] = false;
            }
        }
    }

    private function remplazar($indice, $nombre) { // Si optamos por la politica de reemplazar
        $i = 1;
        while (file_exists($this->arrayarchivos[$indice]["destino"] . $nombre . "_" . $i . "." . $this->arrayarchivos[$indice]["extension"])) {
            $i++;
        }
        return $nombre . "_" . $i;
    }

    public function addTipo($tipo) { // Añadir nuevos tipos
        if (!$this->isTipo($tipo)) {
            $this->arrayDeTipos[$tipo] = 1;
            return true;
        }
        return false;
    }

    public function removeTipo($tipo) {
        if ($this->isTipo($tipo)) {
            unset($this->arrayDeTipos[$tipo]);
            return true;
        }
        return false;
    }

    public function isTipo($tipo) { // preguntar por el tipo y ver si está  seteado
        return isset($this->arrayDeTipos[$tipo]);
    }

    public function tranformar($array) { //
        $arrayarchivos = Array();
        foreach ($array as $datoFiles => $valorDatos) {
            foreach ($valorDatos as $indiceArchivo => $valorArchivo) {
                $miArray[$indiceArchivo][$datoFiles] = $valorArchivo;
            }
        }
        return $miArray;
    }

     public function getSubidosExitosos() {
        $subidos = 0;
        foreach ($this->arrayarchivos as $indice => $valor) {
            if ($valor["subido"])
                $subidos++;
        }
        return $subidos;
    }


}
