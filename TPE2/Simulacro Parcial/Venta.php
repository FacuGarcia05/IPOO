<?php
class Venta {
    private $numero;
    private $fecha;
    private $refeCliente;
    private $refeMotos;
    private $precioFinal;

    //Metodo Constructor
    public function __construct($numero,$fecha,$refeCliente){
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->refeCliente = $refeCliente;
        $this->refeMotos = [];
        $this->precioFinal = 0;
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

    //Metodo incorporarMoto($objMoto) que recibe una moto y la incorpora a la coleccion de motos.
    public function incorporarMoto($objMoto){
        $arrayMotos = $this->getRefeMotos();
        $precio = $this->getPrecioFinal();
        if($objMoto->getActiva()){
            $arrayMotos[] = $objMoto;
            $this->setRefeMotos($arrayMotos);
            $precio += $objMoto->darPrecioVenta();
            $this->setPrecioFinal($precio);
        }
    }

    public function __toString()
    {
        $infoMotos = "";
        foreach($this->getRefeMotos() as $moto){
            $infoMotos .= $moto->__toString() . "\n";
        }
        return "El numero de venta es: " . $this->getNumero() .
        "\nLa fecha de la venta es: " . $this->getFecha() .
        "\nLa referencia del cliente: " . $this->getRefeCliente() .
        "\nLa referencia de la coleccion de motos: \n" . $infoMotos .
        "El precio final de: " . $this->getPrecioFinal();
    }
}
?>
