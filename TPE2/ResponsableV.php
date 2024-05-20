<?php
class ResponsableV{
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;

    //Metodo Construct    
    public function __construct($numEmpleado,$numLicencia,$nombre,$apellido){
        $this->numEmpleado = $numEmpleado;
        $this->numLicencia = $numLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    //Acceso a las variables
    
    //GET's
    public function getNumEmpleado(){
        return $this->numEmpleado;
    }
    public function getNumLicencia(){
        return $this->numLicencia;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }

    //SET's
    public function setNumEmpleado($numEmpleado){
        $this->numEmpleado = $numEmpleado;
    }
    public function setNumLicencia($numLicencia){
        $this->numLicencia = $numLicencia;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    //Metodo ToString
    public function __toString()
    {
        return "Los datos del Responsable del Viaje son: " .
        "\nNumero de empleado: " . $this->getNumEmpleado().
        "\nEl numero de Licencia: ". $this->getNumLicencia().
        "\nEl nombre: " . $this->getNombre().
        "\nEl apellido: " . $this->getApellido();
    }
}