<?php

require '/clases/Autocarga.php';
$imagen = Request::get("image");
$trozos = pathinfo($imagen);
$extension = $trozos["extension"];

if($extension == "jpg"){
    
    header('Content-type: image/jpeg');
    
}elseif($extension == "gif"){
    
    header('Content-type: image/gif');
}

readfile($imagen);