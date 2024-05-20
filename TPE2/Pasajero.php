<?php
class Pasajero{
    private $nombre;
    private $apellido;
    private $doc;
    private $telefono;
    private $numeroAsiento;
    private $numeroTicket; 

    //Metodo Construct
    public function __construct($nombre, $apellido, $doc, $telefono, $vNumeroAsiento, $vNumeroTicket)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->doc = $doc;
        $this->telefono = $telefono;
        $this->numeroAsiento = $vNumeroAsiento;
        $this->numeroTicket = $vNumeroTicket;
    }

    //Acceso a las variables
    
    //GET's
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getDoc(){
        return $this->doc;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function getNumeroAsiento(){
        return $this->numeroAsiento;
    }
    public function getNumeroTicket(){
        return $this->numeroTicket;
    }


    //SET's
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function setDoc($doc){
        $this->doc = $doc;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    public function setNumeroAsiento($vNumeroAsiento){
        $this->numeroAsiento = $vNumeroAsiento;
    }
    public function setNumeroTicket($vNumeroTicket){
        $this->numeroTicket = $vNumeroTicket;
    }

    public function darPorcentajeIncremento() {
        return 10; // Porcentaje de incremento para pasajeros estándares
    }

    //Metodo ToString
    public function __toString()
    {
        return "Los datos del pasajero son: " .
        "\nNombre: " . $this->getNombre().
        "\nApellido: ". $this->getApellido().
        "\nEl Documento: " . $this->getDoc().
        "\nEl telefono: " . $this->getTelefono().
        "\nEl numero de asiento: ". $this->getNumeroAsiento().
        "\nEl numero de ticket: ". $this->getNumeroTicket();
    }    
}