<?php

class pdfControlador
{

    public function mostrarDatosPDF()
    {
        # code...
        $datos = pdfModelo::mostrarDatosPDFConductores();
        return $datos;
    }
    public function mostrarDatosPDFUnique($id)
    {
        # code...
        $datos = pdfModelo::mostrarDatosPDFCamionesUnique($id);
        return $datos;
    }

    public function mostrarDatosMantenimientoUnique($id)
    {
        # code...
        $datos = pdfModelo::mostrarDatosMantenimientoUnique($id);
        return $datos;
    }

    public function mostrarDatosPDFMantetodos()
    {
        # code...
        $datos = pdfModelo::mostrarDatosPDFMante();
        return $datos;
    }
    public function mostrarDatosPDFMantetotal1()
    {
        # code...
        $datos = pdfModelo::mostrarDatosPDFMantetota();
        return $datos;
    }
}
