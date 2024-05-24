<?php
include_once 'Partido.php';
class Futbol extends Partido{
    private $coef_Menores  = 0.13;
    private $coef_Juveniles = 0.19;
    private $coef_Mayores = 0.27;

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2)
    {   
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
    }

    //OBSERVADORES
    public function getCoef_Menores(){
        return $this->coef_Menores;
    }
    public function getCoef_Juveniles(){
        return $this->coef_Juveniles;
    }
    public function getCoef_Mayores(){
        return $this->coef_Mayores;
    }

    //MODIFICADORES
    public function setCoef_Menores($menores){
        $this->coef_Menores = $menores;
    }
    public function setCoef_Juveniles($juveniles){
        $this->coef_Juveniles = $juveniles;
    }
    public function setCoef_Mayores($mayores){
        $this->coef_Mayores = $mayores;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.= "\n Coeficiente menores: ". $this->getCoef_Menores().
        "\n Coeficiente Juveniles: ". $this->getCoef_Juveniles().
        "\n Coeficiente Mayores: ". $this->getCoef_Mayores();
        return $cadena;
    }

    public function coeficienteTotal(){
        $categoria = $this->getObjEquipo1()->getObjCategoria()->getDescripcion();
        $cantGoles = $this->getCantGolesE1() + $this->getCantGolesE2();
        $cantJugadores = $this->getObjEquipo1()->getCantJugadores() + $this->getObjEquipo2()->getCantJugadores();

        $coef = $this->getCoefBase() * $cantGoles * $cantJugadores;

        if($categoria == 'Menores'){
            $coef = $coef * $this->getCoef_Menores();
        } elseif ($categoria == 'Juveniles'){
            $coef = $coef * $this->getCoef_Juveniles();
        } elseif ($categoria == 'Mayores')  {
            $coef = $coef * $this->getCoef_Mayores();
        }

        return $coef;
    }

}