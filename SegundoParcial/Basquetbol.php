<?php
include_once 'Partido.php';
class Basquetbol extends Partido{
    private $cantInfracciones;
    private $coeficiente = 0.75;

    public function __construct($cantInfracciones, $idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2)
    {
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->cantInfracciones = $cantInfracciones;
    }

    //OBSERVADORES
    public function getCantInfracciones(){
        return $this->cantInfracciones;
    }
    public function getCoeficiente(){
        return $this->coeficiente;
    }

    //MODIFICADORES
    public function setCantInfracciones($cantInfracciones){
        $this->cantInfracciones = $cantInfracciones;
    }
    public function setCoeficiente($coeficiente){
        $this->coeficiente = $coeficiente;
    }

    //METODO TOSTRING
    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.= "\nCantidad de Infracciones: ". $this->getCantInfracciones().
        "\nCoeficiente: ". $this->getCoeficiente();
        return $cadena;
    }

    public function coeficientePenalizacion(){
        $coeficientaBase = $this->getCoefBase();
        $coeficienteTotal = $coeficientaBase - ($this->getCoeficiente() * $this->getCantInfracciones());
        return  $coeficienteTotal;
    }
}