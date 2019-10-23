<?php

class EstatusControlador
{

    /* MOSTRAR ESTATUS */

    static public function mostrarEstatus($table)
    {
        $status = EstatusModelo::MostrarEstatus($table);
        var_dump($status);
        return $status;
    }
}
