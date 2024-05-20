<?php
include_once 'Pasajero.php';
class PasajerosConNecesidad extends Pasajero{
    private $sillaRuedas;
    private $asistencia;
    private $comidaEspecial;

    public function __construct($nombre, $apellido, $doc, $telefono, $vNumeroAsiento, $vNumeroTicket, $vSillaRuedas, $vAsistencia, $vComidaEspecial) {
        parent::__construct($nombre, $apellido, $doc, $telefono, $vNumeroAsiento, $vNumeroTicket);
        $this->sillaRuedas = $vSillaRuedas;
        $this->asistencia = $vAsistencia;
        $this->comidaEspecial = $vComidaEspecial;
    }

    public function getAsistencia(){
        return $this->asistencia;
    }
    public function getSillaRuedas(){
        return $this->sillaRuedas;
    }
    public function getComidaEspecial(){
        return $this->comidaEspecial;
    }

    public function setAsistencia($vAsistencia){
        $this->asistencia = $vAsistencia;
    }
    public function setSillaRuedas($vSillaRuedas){
        $this->sillaRuedas = $vSillaRuedas;
    }
    public function setComidaEspecial($vComidaEspecial){
        $this->comidaEspecial = $vComidaEspecial;
    }

    public function darPorcentajeIncremento() {
        if ($this->sillaRuedas && $this->asistencia && $this->comidaEspecial) {
            $porcentaje = 30;
        } elseif ($this->sillaRuedas || $this->asistencia || $this->comidaEspecial) {
            $porcentaje = 15;
        }
        return $porcentaje;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena .= "\nRequiere asistencia: ". $this->getAsistencia().
        "\nRequiere silla de ruedas: ". $this->getSillaRuedas().
        "\nrequiere comida especial: ". $this->getComidaEspecial();
        return $cadena;
    }
}