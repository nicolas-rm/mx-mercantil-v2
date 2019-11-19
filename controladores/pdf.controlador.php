<?php

class pdfControlador
{

    public function mostrarDatosPDF()
    {
        # code...
        $datos = pdfModelo::mostrarDatosPDFConductores();
        return $datos;
    }
}
