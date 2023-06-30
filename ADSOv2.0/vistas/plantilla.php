<?php

include_once "vistas/modulos/cabecera.php";
include_once "vistas/modulos/navbar.php";
include_once "vistas/modulos/jumbotron.php";

if (isset($_GET["ruta"])) {
    if ($_GET["ruta"] == "usuarios" || 
        $_GET["ruta"] == "cursos" || 
        $_GET["ruta"] == "quienesSomos") {
        
        include_once "vistas/modulos/".$_GET["ruta"].".php";

    } else {
        include_once "vistas/modulos/404.php";
    }
}

include_once "vistas/modulos/pie.php";
