<?php

class pdfControlador
{

    public function mostrarDatosPDF()
    {
        # code...
        $datos = pdfModelo::mostrarDatosPDFMante();
        return $datos;
    }
}
