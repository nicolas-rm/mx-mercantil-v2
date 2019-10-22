<?php

require_once "controladores/plantilla.controlador.php";

require_once "controladores/usuarios.controlador.php";
require_once "controladores/sucursales.controlador.php";
require_once "controladores/empleados.controlador.php";
require_once "controladores/roles.controlador.php";
require_once "controladores/mantenimiento.controlador.php";
require_once "controladores/conductores.controlador.php";


require_once "modelos/usuarios.modelo.php";
require_once "modelos/sucursales.modelo.php";
require_once "modelos/empleados.modelo.php";
require_once "modelos/roles.modelo.php";
require_once "modelos/mantenimiento.modelo.php";
require_once "modelos/conductores.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();

?>

 
