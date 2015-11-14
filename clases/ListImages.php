<?php


/**
 * Description of Listpodcast
 *
 * @author Miguel
 */
class ListImages {
    
    //Funcion para volcar canciones en lista según seas admin o usuario normal
    static function listar($paciente) {
        $string = "";
        if ($paciente != null) {
            $folder = "../../../Pacientes/$paciente/";
            if (file_exists($folder)) {
                $directorio = opendir($folder);
                while ($archivo = readdir($directorio)) {
                    if (!is_dir($archivo)) {
                        $string = $string . "<li><a href=leer.php?image=../../../Pacientes/" . $paciente . "/" . $archivo . ">$archivo" . '</a></li>';
                    }
                }
                return $string;
            }
        }else{
             return "Error al mostrar la imagen.";
            
        }
    }

}
