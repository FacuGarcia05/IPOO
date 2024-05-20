<?php
Class Viaje{
    private $codigoViaje;
    private $destino;
    private $max;
    private $pasajeros = [];
    private $responsable;
    private $costoViaje;
    private $costoTotalPasajes = 0;

    //Metodo Construct
    public function __construct($codigoViaje, $destino, $max,  $responsable, $costoViaje){
        $this->codigoViaje = $codigoViaje;
        $this->destino = $destino;
        $this->max = $max;
        $this->responsable = $responsable;
        $this->costoViaje = $costoViaje;
    }

    //Acceso a las variables

    //GET's
    public function getCodigoViaje(){
        return $this->codigoViaje;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getMax(){
        return $this->max;
    }
    public function getPasajeros(){
        return $this->pasajeros;
    }
    public function getResposable(){
        return $this->responsable;
    }
    public function getCostoViaje()
    {
        return $this->costoViaje;
    }
    public function getCostoTotalPasajes()
    {
        return $this->costoTotalPasajes;
    }



    //SET's
    public function setCodigoViaje($codigoViaje){
        $this->codigoViaje = $codigoViaje;
    }
    public function setDestino($destino){
        $this->destino = $destino;
    }
    public function setMax($max){
        $this->max = $max;
    }
    public function setPasajeros($pasajeros){
        $this->pasajeros = $pasajeros;
    }
    public function setResponsable($responsable){
        $this->responsable = $responsable;
    }
    public function setCostoViaje($costoViaje)
    {
        $this->costoViaje = $costoViaje;
    }

    //Metodo que se fija si el pasajero ya se encuentra en el viaje
    public function PasajeroExiste($pasajero){
        $seEnceuntra = false;
        foreach($this->pasajeros as $p){
            if($p->getDoc() == $pasajero->getDoc()){
                $seEnceuntra = true;
            }
        }
        return $seEnceuntra;
    }


    //Metodo que agrega pasajeros
    public function añadirPasajero($pasajero){
        $agregado = false;
        if(count($this->pasajeros) < $this->max){
            if(!$this->PasajeroExiste($pasajero)){
                $this->pasajeros[] = $pasajero;
                $agregado = true;
            }
        }
        return $agregado;
    }

    private function actualizarCostoTotal($pasajero)
    {
        $porcentajeIncremento = $pasajero->darPorcentajeIncremento() / 100;
        $costoPasaje = $this->costoViaje * (1 + $porcentajeIncremento);
        $this->costoTotalPasajes += $costoPasaje;
    }

    public function venderPasaje($objPasajero)
    {
        $vendido = false;
        if ($this->añadirPasajero($objPasajero)) {
            $vendido = $this->costoTotalPasajes;
        }
        return $vendido;
    }

    public function hayPasajesDisponibles()
    {
        return count($this->pasajeros) < $this->max;
    }

    //Metodo ToString
    public function __toString()
    {
        //Inicializa un string en vacio y luego va agregando a los pasajeros.
        $infoPasajeros = "";
        foreach($this->pasajeros as $p){
            $infoPasajeros .= $p->__toString() . "\n";
        }
        {
        return "Los datos del Viaje son: ". 
        "\nCodigo del viaje: ". $this->getCodigoViaje().
        "\nDestino: ". $this->getDestino().
        "\nCantidad maxima de Pasajeros: ". $this->getMax().
        "\nPasajeros del viaje: \n". $infoPasajeros;
        }
    }   
}