<?php
require '/clases/Autocarga.php';
$sesion = new Session();
if(!$sesion->isLogged()){
    $sesion->sendRedirect("galeriapacientes.php");
      
}else{
$paciente = new Paciente();
$paciente = $sesion->getUser();
$param = Request::get('imagen');  
}


?>

<html>
    <head>
         <head>

        <meta charset="UTF-8">

        <title>SAS Galeria</title>
        <link rel="stylesheet" type="text/css" href="reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    </head>
    <body>
        <h1>BASES DE DATOS SAS</h1>
        <div id="container">
        <div id="cabeceropaciente"> <h2>Galleria del paciente número: <?php echo $paciente->getTarjetasanitaria()?>. DNI: <?php echo $paciente->getDni()?>.  </h2></div>
        <div id="contenedorenlaces">
        <h3>Número de arcihovos subidos con exito: <?php echo $sesion->get("exitosos")?> </h3>
        <h3>Número de intentos: <?php echo $sesion->get("intentos")?> </h3>
        
         <div id="areafotos">
                    <div class="titulosecciones"><p id="textostandar1">Listado de imagenes:</p></div>
                    <ul class="listadoimagenes">       
                        <?php
                        echo ListImages::listar($paciente->getTarjetasanitaria());
                        ?>
                    </ul>
                </div>
        
        <p id="cierre"><a href="logout.php">Cerra Sesión</a></p>
        
        </div>
       </div>  
    </body>
</html>
