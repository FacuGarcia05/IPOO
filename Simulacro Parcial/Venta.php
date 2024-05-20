<?php
class Venta {
    private $numero;
    private $fecha;
    private $refeCliente;
    private $refeMotos;
    private $precioFinal;
    private $motos;

    //Metodo Constructor
    public function __construct($numero,$fecha,$refeCliente){
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->refeCliente = $refeCliente;
        $this->refeMotos = [];
        $this->precioFinal = 0;
        $this->motos = [];
    }

    //Acceso a las variables
    //Observadores
    public function getNumero(){
        return $this->numero;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getRefeCliente(){
        return $this->refeCliente;
    }
    public function getRefeMotos(){
        return $this->refeMotos;
    }
    public function getPrecioFinal(){
        return $this->precioFinal;
    }
    

    //Modificadores
    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    public function setRefeCliente($refeCliente){
        $this->refeCliente = $refeCliente;
    }
    public function setRefeMotos($refeMotos){
        $this->refeMotos = $refeMotos;
    }
    public function setPrecioFinal($precioFinal){
        $this->precioFinal = $precioFinal;
    }

    public function incorporarMoto($moto) {
        if ($moto->getActiva()) {
            $precioVenta = $moto->darPrecioVenta();
            if ($precioVenta >= 0) {
                $this->motos[] = $moto;
                $this->precioFinal += $precioVenta;
            }
        }
    }

    public function retornarTotalVentaNacional() {
        $total = 0;
        foreach ($this->motos as $moto) {
            if ($moto instanceof MotoNacional) {
                $total += $moto->darPrecioVenta();
            }
        }
        return $total;
    }

    public function retornarMotosImportadas() {
        $motosImportadas = [];
        foreach ($this->motos as $moto) {
            if ($moto instanceof MotoImportada) {
                $motosImportadas[] = $moto;
            }
        }
        return $motosImportadas;
    }

    public function __toString() {
        $infoMotosStr = "";
        foreach ($this->motos as $moto) {
            $infoMotosStr .= $moto->__toString() . ", ";
        }
        return "Número de Venta: {$this->numero}, Fecha: {$this->fecha}, Cliente: {$this->refeCliente}, Motos: [{$infoMotosStr}], Precio Final: {$this->precioFinal}";
    }   
}
