<?php
include_once 'Contrato.php';
class ContratoOficina extends Contrato {

    public function __construct($fechaInicio, $fechaVencimiento, $objPlan, $costo, $seRenueva, $objCliente) {
        parent::__construct($fechaInicio, $fechaVencimiento, $objPlan, $costo, $seRenueva, $objCliente);
    }

    public function calcularImporte() {
        $importeFinal = parent::calcularImporte();
        return $importeFinal;
    }

    public function __toString() {
        return parent::__toString();
    }
}