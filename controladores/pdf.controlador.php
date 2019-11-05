<?php

class pdfControlador
{

    public function mostrarDatosPDF()
    {
        # code...
        $datos = pdfModelo::mostrarDatosPDF("CONDUCTORES");
    }
}
