<?php

require_once "controladores/plantilla.controlador.php";

require_once "controladores/usuarios.controlador.php";
require_once "controladores/sucursales.controlador.php";
require_once "controladores/empleados.controlador.php";
require_once "controladores/roles.controlador.php";
require_once "controladores/mantenimiento.controlador.php";
require_once "controladores/conductores.controlador.php";
require_once "controladores/estatus.controlador.php";
require_once "controladores/pdf.controlador.php";
require_once "controladores/camiones.controlador.php";
require_once "controladores/viaje.controlador.php";

require_once "controladores/calendario.controlador.php";


require_once "modelos/usuarios.modelo.php";
require_once "modelos/sucursales.modelo.php";
require_once "modelos/empleados.modelo.php";
require_once "modelos/roles.modelo.php";
require_once "modelos/mantenimiento.modelo.php";
require_once "modelos/conductores.modelo.php";
require_once "modelos/estatus.modelo.php";
require_once "modelos/pdf.modelo.php";
require_once "modelos/condiciones.modelo.php";
require_once "modelos/camiones.modelo.php";
require_once "modelos/viaje.modelo.php";

require_once "modelos/calendario.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
