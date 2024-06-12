<?php
include_once 'Contrato.php';
class ContratoWeb extends Contrato {
    private $descuento;

    public function __construct($fechaInicio, $fechaVencimiento, $objPlan, $costo, $seRenueva, $objCliente, $descuento = 10) {
        parent::__construct($fechaInicio, $fechaVencimiento, $objPlan, $costo, $seRenueva, $objCliente);
        $this->descuento = $descuento;
    }

    public function getDescuento() {
        return $this->descuento;
    }

    public function setDescuento($descuento) {
        $this->descuento = $descuento;
    }

    public function calcularImporte() {
        $importeFinal = parent::calcularImporte();
        $importeFinal -= $importeFinal * 0.1;
        return $importeFinal;
    }

    public function __toString() {
        return parent::__toString() . ", Descuento: " . $this->descuento; "%";
    }
}
