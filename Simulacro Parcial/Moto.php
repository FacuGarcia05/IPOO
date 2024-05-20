<?php
class Moto {
    private $codigo;
    private $costo;
    private $anioF;
    private $descripcion;
    private $incA;
    private $activa; //Boolean

    //Metodo Constructor
    public function __construct($codigo,$costo,$anioF,$descripcion,$incA,$activa){
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioF = $anioF;
        $this->descripcion = $descripcion;
        $this->incA = $incA;
        $this->activa = $activa;
    }

    //Acceso a las variables
    //Observadores
    public function getCodigo(){
        return $this->codigo;
    }
    public function getCosto(){
        return $this->costo;
    }
    public function getAnioF(){
        return $this->anioF;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getIncA(){
        return $this->incA;
    }
    public function getActiva(){
        return $this->activa;
    }

    //Modificadores
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    public function setCosto($costo){
        $this->costo = $costo;
    }
    public function setAnioF($anioF){
        $this->anioF = $anioF;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function setIncA($incA){
        $this->incA = $incA;
    }
    public function setActiva($activa){ // Corregido aquí
        $this->activa = $activa;
    }

    //Metodo darPrecioVenta calcula el valor por el caual puede ser vendida una moto
    public function darPrecioVenta(){
        // int $precio
        // boolean $d
        if($this->getActiva()){
             $compra = $this->getCosto();
             $anio = date('Y') - $this->getAnioF();
             $incA = $this->getIncA();
             $venta = $compra + $compra * ($anio * $incA);
        } else {
            $venta = -1;
        }
        return $venta; // Corregido aquí
    }

    public function __toString()
    {
        return "El codigo es: " . $this->getCodigo() .
        "\nEl costo: " . $this->getCosto() .
        "\nEl año de fabricacion: " . $this->getAnioF() .
        "\nLa descripcion: " . $this->getDescripcion() .
        "\nEl incremento Anual: " . $this->getIncA() .
        "\nEsta activa: " . $this->getActiva() . "\n"; // Agregado "\n" aquí
    }
}
?>
