<?php
class Cliente{
    private $nombre;
    private $apellido;
    private $baja;
    private $tipoDoc;
    private $numDoc;

    //Metodo Constructor
    public function __construct($nombre,$apellido,$baja,$tipoDoc,$numDoc){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->baja = $baja;
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
    public function getBaja(){
        return $this->baja;
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
    public function setBaja($baja){
        $this->baja = $baja;
    }
    public function setTipoDoc($tipoDoc){
        $this->tipoDoc = $tipoDoc;
    }
    public function setNumDoc($numDoc){
        $this->numDoc = $numDoc;
    }

    //Metodo ToString
    public function __toString(){
    $estado = "activo";
    if ($this->baja == true) {
        $estado = "dado de baja";
    }
    {
        return "Nombre: " . $this->getNombre() .
        "\nApellido: " . $this->getApellido() .
        "\nTipo de Documento: " . $this->getTipoDoc() .
        "\nNumero de Documento: " . $this->getNumDoc() .
        "\nEstado del cliente: " . $estado . "\n"; // Agregado "\n" aquí
    }
}
}