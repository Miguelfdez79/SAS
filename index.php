<?php
require '/clases/Autocarga.php';
$sesion = new Session();
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>RedVinyl</title>
        <link rel="stylesheet" type="text/css" href="reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />

        <link href='https://fonts.googleapis.com/css?family=Work+Sans:200' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <?php
        if (!$sesion->isLogged()) {
            ?>
            <div id="navcontain">
                <div id="nav">
                    <div id="vinilo">
                    </div>
                    <div id="logoname">
                        <h1 id="logotipo">RedVinyl</h1>
                    </div>
                    <div id="list">
                        <ul class="menuH">
                            <li><a href="index.html" class="nave">Home</a></li>
                            <li><a href="index.html"  class="nave">News</a></li>
                            <li><a href="index.html"  class="nave">Team</a></li>
                            <li><a href="index.html"  class="nave">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="containerAll">
                <div id="headercontain">
                    <div id="quotecontain0">
                        <form action="phplogin.php" method="post" enctype="multipart/form-data" id="formContactar">
                            <fieldset>
                                <legend></legend>
                                <p id="encabezadologin">Welcome to the Music!</p>
                                <label for="login"></label>
                                <input type="text" size="30" name="usuario" placeholder="login" id="login" />
                                <label for="pass"></label>
                                <input type="password" size="30" name="password" placeholder="password" id="pass" />
                            </fieldset>

                            <div id="enviar1">
                                <input type="submit" id="botonenviar" class="boton" value="ENVIAR" accesskey="e" tabindex="20" />

                            </div>
                            <div id="parrafooculto">
                                <p id="noregistrado"></p>
                            </div>

                            <div id="enviar2">
                                <p id="encabezadoregister">Not a member? Register here</p>
                                <input type="submit" id="botonregistrar" class="boton" value="Sign up!" accesskey="e" tabindex="20" />
                            </div>
                        </form>
                    </div>

                    <div id="quotecontain">
                        <p id="quoteheader">"Behind every favorite song,<span>there is an untold story."</span></p>
                    </div>
                </div>
            </div>
            <div>
            </div>

<footer>
            <div id="contenidopie">
                <div class="infopie">
                    <p id="copyini">© EIDOSDESIGN ESTUDIO · 2015 · ALL RIGHTS RESERVED<span id="web">www.eidosdesign.es</span></p>
                </div>

            </div>          
        </footer>
            <?php
        } else {         
           $sesion->sendRedirect("index.php");
        }
        ?>
    </body>
</html>