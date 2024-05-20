<?php
include_once 'Venta.php';
include_once 'Moto.php';
class Empresa
{
    private $denominacion;
    private $direccion;
    private $coleccionClientes;
    private $coleccionMotos;
    private $ventasRealizadas;
    private $ventas;

    //METODO CONSTRUCT
    public function __construct($denominacion, $direccion, $coleccionClientes, $coleccionMotos, $ventasRealizadas)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->coleccionClientes = $coleccionClientes;
        $this->coleccionMotos = $coleccionMotos;
        $this->ventasRealizadas = $ventasRealizadas;
        $this->ventas = [];
    }

    //Acceso a las variables
    //Observadores
    public function getDenominacion()
    {
        return $this->denominacion;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function getColeccionClientes()
    {
        return $this->coleccionClientes;
    }
    public function getColeccionMotos()
    {
        return $this->coleccionMotos;
    }
    public function getVentasRealizadas()
    {
        return $this->ventasRealizadas;
    }

    //Modificadores
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    public function setColeccionClientes($coleccionClientes)
    {
        $this->coleccionClientes = $coleccionClientes;
    }
    public function setColeccionMotos($coleccionMotos)
    {
        $this->coleccionMotos = $coleccionMotos;
    }
    public function setVentasRealizadas($ventasRealizadas)
    {
        $this->ventasRealizadas = $ventasRealizadas;
    }

    

    public function addVenta($venta)
    {
        $this->ventas[] = $venta;
    }

    public function retornarMoto($codigoMoto)
    {
        $encontrado = false;
        $i = 0;
        $retorna = null;
        while ($i < count($this->getColeccionMotos()) && !$encontrado) {
            if ($this->coleccionMotos[$i]->getCodigo() == $codigoMoto) {
                $retorna = $this->coleccionMotos[$i];
                $encontrado = true;
            }
            $i++;
        }
        return $retorna;
    }

    public function registrarVenta($codigoMoto, $objCliente)
    {
        $precioFinal = 0;
        if (!$objCliente->getBaja()) {
            $numero = count($this->ventasRealizadas);
            $fecha = date('Y');
            $Vendida = new Venta($numero, $fecha, $objCliente);
            for ($i = 0; $i < count($codigoMoto); $i++) {
                $codigo = $codigoMoto[$i];
                $moto = $this->retornarMoto($codigo);
                if ($moto != null) {
                    $Vendida->incorporarMoto($moto);
                }
            }
            if (count($Vendida->getRefeMotos()) != 0) {
                $this->ventasRealizadas[] = $Vendida;
                $precioFinal = $Vendida->getPrecioFinal();
            }
        }
        return $precioFinal;
    }

    // Metodo que muestra las ventas de la coleccion
    public function mostrarVentas()
    {
        $arregloVentas = $this->getVentasRealizadas();
        $cadena = "";
        $numVenta = 0;
        for ($i = 0; $i < count($arregloVentas); $i++) {
            $numVenta++;
            $venta = $arregloVentas[$i];
            $cadena = $cadena . "Venta:" . $numVenta . "\n" . $venta . "\n";
        }
        return $cadena;
    }

    public function retornarVentasXCliente($tipo, $numDoc)
    {
        $ventasCliente = [];
        $i = 0;
        $encontrado = false;
        while ($i < count($this->ventas)) {
            if ($this->ventas[$i]->getCliente()->getTipoDocumento() === $tipo && $this->ventas[$i]->getCliente()->getNumeroDocumento() === $numDoc && !$encontrado) {
                $ventasCliente[] = $this->ventas[$i];
                $encontrado = true;
            }
            $i++;
        }
        return $ventasCliente;
    }

    public function informarSumaVentasNacionales()
    {
        $totalVentasNacionales = 0;
        foreach ($this->ventas as $venta) {
            $totalVentasNacionales += $venta->retornarTotalVentaNacional();
        }
        return $totalVentasNacionales;
    }

    public function informarVentasImportadas()
    {
        $ventasImportadas = [];
        foreach ($this->ventas as $venta) {
            if (count($venta->retornarMotosImportadas()) > 0) {
                $ventasImportadas[] = $venta;
            }
        }
        return $ventasImportadas;
    }

    public function __toString()
    {
        $infoColeccionClientes = "";
        foreach ($this->coleccionClientes as $cC) {
            $infoColeccionClientes .= $cC->__toString() . "\n";
        }
        $infoColeccionMotos = "";
        foreach ($this->coleccionMotos as $cM) {
            $infoColeccionMotos .= $cM->__toString() . "\n";
        }
        $infoColeccionVentas = "";
        foreach ($this->ventasRealizadas as $vR) {
            $infoColeccionVentas .= $vR->__toString() . "\n";
        }
        return "Denominacion: " . $this->getDenominacion() .
            "\nDireccion: " . $this->getDireccion() .
            "\nClientes: \n" . $infoColeccionClientes .
            "Productos: \n" . $infoColeccionMotos .
            "Ventas: \n" . $infoColeccionVentas;
    }
}
