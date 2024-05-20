<?php
class Empresa{
    private $denominacion;
    private $direccion;
    private $direccionClientes;
    private $coleccionClientes;
    private $coleccionMotos;
    private $ventasRealizadas;

    //METODO CONSTRUCT
    public function __construct($denominacion,$direccion,$coleccionClientes,$coleccionMotos,$ventasRealizadas){
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->direccionClientes = [];
        $this->coleccionClientes = $coleccionClientes;
        $this->coleccionMotos = $coleccionMotos;
        $this->ventasRealizadas = [];
    }

    //Acceso a las variables
    //Observadores
    public function getDenominacion(){
        return $this->denominacion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getDireccionClientes(){
        return $this->direccionClientes;
    }
    public function getColeccionClientes(){
        return $this->coleccionClientes;
    }
    public function getColeccionMotos(){
        return $this->coleccionMotos;
    }
    public function getVentasRealizadas(){
        return $this->ventasRealizadas;
    }

    //Modificadores
    public function setDenominacion($denominacion){
        $this->denominacion = $denominacion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function setDireccionClientes($direccionClientes){
        $this->direccionClientes = $direccionClientes;
    }
    public function setColeccionClientes($coleccionClientes){
        $this->coleccionClientes = $coleccionClientes;
    }
    public function setColeccionMotos($coleccionMotos){
        $this->coleccionMotos = $coleccionMotos;
    }
    public function setVentasRealizadas($ventasRealizadas){
        $this->ventasRealizadas = $ventasRealizadas;
    }

    public function retornarMoto($codigoMoto){
        $encontrado = false;
        $i = 0;
        $retorna = null;
        while($i < count($this->getColeccionMotos()) && !$encontrado){
            if($this->coleccionMotos[$i]->getCodigo() == $codigoMoto){
                $retorna = $this->coleccionMotos[$i];
                $encontrado = true;
            }
            $i++;
        }
        return $retorna;
    }

    public function registrarVenta($codigoMoto, $objCliente){
        $precioFinal = 0;
        if(!$objCliente->getAlta()){
            $numero = count($this->ventasRealizadas);
            $fecha = date('Y');
            $Vendida = new Venta($numero, $fecha, $objCliente);
            for ($i = 0; $i < count($codigoMoto); $i++){
                $codigo = $codigoMoto[$i];
                $moto = $this->retornarMoto($codigo);
                if ($moto != null) {
                    $Vendida->incorporarMoto($moto);
                }
            }
            if(count($Vendida->getRefeMotos()) != 0){
                $this->ventasRealizadas[] = $Vendida;
                $precioFinal = $Vendida->getPrecioFinal();
            }
        }
        return $precioFinal;
    }

            // Metodo que muestra las ventas de la coleccion
            public function mostrarVentas(){
                $arregloVentas = $this->getVentasRealizadas();
                $cadena = "";
                $numVenta = 0;
                for($i=0;$i<count($arregloVentas);$i++){
                    $numVenta++;
                    $venta = $arregloVentas[$i];
                    $cadena = $cadena. "Venta:". $numVenta."\n".$venta."\n";  
                }
                return $cadena;
            }

    public function retornarVentasXCliente($tipo, $numDoc){
        $ventasTotales = [];
        foreach($this->getVentasRealizadas() as $objVenta) {
            $cliente = $objVenta->getRefeCliente();
            if ($cliente->getTipoDoc() == $tipo && $cliente->getNumDoc() == $numDoc) {
                array_push($ventasTotales, $objVenta);
            }
        }
        return $ventasTotales;
    }

    public function __toString()
    {
        $infoDirecClientes = "";
        foreach($this->direccionClientes as $dC){
            $infoDirecClientes .= $dC->__toString() . "\n";
        }
        $infoColeccionClientes = "";
        foreach($this->coleccionClientes as $cC){
            $infoColeccionClientes .= $cC->__toString() . "\n";
        }
        $infoColeccionMotos = "";
        foreach($this->coleccionMotos as $cM){
            $infoColeccionMotos .= $cM->__toString() . "\n";
        }
        $infoColeccionVentas = "";
        foreach($this->ventasRealizadas as $vR){
            $infoColeccionVentas .= $vR->__toString() . "\n";
        }
        return "Denominacion: " . $this->getDenominacion() . 
        "\nDireccion: " . $this->getDireccion() . 
        "\nClientes: \n" . $infoColeccionClientes . 
        "Productos: \n" . $infoColeccionMotos . 
        "Ventas: \n" . $infoColeccionVentas; 
    }   
} 
?>