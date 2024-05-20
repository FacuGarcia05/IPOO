<?php
class Cliente{
    private $nombre;
    private $apellido;
    private $alta;
    private $tipoDoc;
    private $numDoc;

    //Metodo Constructor
    public function __construct($nombre,$apellido,$alta,$tipoDoc,$numDoc){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->alta = $alta;
        $this->tipoDoc = $tipoDoc;
        $this->numDoc = $numDoc;
    }

    //Acceso a las variables
    //Observadores
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getAlta(){
        return $this->alta;
    }
    public function getTipoDoc(){
        return $this->tipoDoc;
    }
    public function getNumDoc(){
        return $this->numDoc;
    }

    //Modificadores
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function setAlta($alta){
        $this->alta = $alta;
    }
    public function setTipoDoc($tipoDoc){
        $this->tipoDoc = $tipoDoc;
    }
    public function setNumDoc($numDoc){
        $this->numDoc = $numDoc;
    }

    //Metodo ToString
    public function __toString()
    {
        return "Nombre: " . $this->getNombre() .
        "\nApellido: " . $this->getApellido() .
        "\nTipo de Documento: " . $this->getTipoDoc() .
        "\nNumero de Documento: " . $this->getNumDoc() .
        "\nEstado del cliente: " . $this->getAlta() . "\n"; // Agregado "\n" aquí
    }
}