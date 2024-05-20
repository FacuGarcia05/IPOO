<?php
include_once 'Pasajero.php';
class PasajeroVIP extends Pasajero{
    private $numeroViajero;
    private $cantidadMillas;

    public function __construct($nombre, $apellido, $doc,  $telefono, $vNumeroAsiento, $vNumeroTicket, $vNumeroViajero, $vCantidadMillas)
    {
        parent::__construct($nombre, $apellido, $doc, $telefono,$vNumeroAsiento, $vNumeroTicket);
        $this->numeroViajero = $vNumeroViajero;
        $this->cantidadMillas = $vCantidadMillas;
    }

    public function getNumeroViajero(){
        return $this->numeroViajero;
    }
    public function getCantidadMillas(){
        return $this->cantidadMillas;
    }

    public function setNumeroViajero($vNumeroViajero){
        $this->numeroViajero = $vNumeroViajero;
    }
    public function setCantidadMillas($vCantidadMillas){
        $this->cantidadMillas = $vCantidadMillas;
    }

    public function darPorcentajeIncremento() {
        $incremento = 35; // Incremento base del 35%
        if ($this->millasPasajero > 300) {
            $incremento = 30; // Incremento adicional del 30% para más de 300 millas
        }
        return $incremento;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena .= "\nEl numero de viajero es: ". $this->getNumeroViajero().
        "\nLa cantidad de millas es de: ". $this->getCantidadMillas();
        return $cadena;
    }
}
