<?php

require "/clases/AutoCarga.php";
$tarjeta = Request::post("id_us");
$dni = Request::post("dni");
$sesion = new Session();
$paciente = new Paciente();
$paciente->setTarjetasanitaria($tarjeta);
$paciente->setDni($dni);
$sesion->setUser($paciente);


$files = new UploadFiles ("imagen", "../../../Pacientes/$tarjeta/" );  // Creamos el objeto upload

if ($files == null) {
    $sesion->sendRedirect("sas.html");
}


if (!is_dir("../../../Pacientes/$tarjeta/")) {
    mkdir("../../../Pacientes/$tarjeta/", 0777, true);
}

$files->upload();

$sesion->set("exitosos", $files->getSubidosExitosos());
$sesion->set("intentos", count($files->getArray()));

$sesion->sendRedirect("galeriapaciente.php");


