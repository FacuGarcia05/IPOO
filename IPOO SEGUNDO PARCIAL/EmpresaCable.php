<?php

class EmpresaCable
{
    private $coleccionPlanes;
    private $coleccionContratos;

    //METODO CONSTRUCT
    public function __construct()
    {
        $this->coleccionPlanes = [];
        $this->coleccionContratos = [];
    }


    //OBSERVADORES
    public function getColeccionPlanes()
    {
        return $this->coleccionPlanes;
    }
    public function getColeccionContratos()
    {
        return $this->coleccionContratos;
    }

    //MODIFICADORES
    public function setColeccionPlanes($coleccionPlanes)
    {
        $this->coleccionPlanes = $coleccionPlanes;
    }
    public function setColeccionContratos($coleccionContratos)
    {
        $this->coleccionContratos = $coleccionContratos;
    }

    //METODO TOSTRING
    public function __toString()
    {
        return "Planes:\n" . $this->coleccionAString($this->getColeccionPlanes()) .
            "\nContratos:\n" . $this->coleccionAString($this->getColeccionContratos());
    }

    private function coleccionAString($coleccion)
    {
        $retorno = "";
        foreach ($coleccion as $obj) {
            $retorno .= $obj . "\n------------------------------\n";
        }
        return $retorno;
    }

    public function incorporarPlan($objPlan)
    {
        $devuelve = true;
        foreach ($this->coleccionPlanes as $existe) {
            if ($existe->getColCanales() === $objPlan->getColCanales() && $existe->getIncluyeMG() === $objPlan->getIncluyeMG()) {
                $devuelve = false;
            }
        }
        $this->coleccionPlanes[] = $objPlan;
        return $devuelve;
    }

    public function incorporarContrato($objPlan, $objCliente, $fechaDesde, $fechaVenc, $esViaWeb){
        $coleccionContratos = $this->getColeccionContratos();
        if ($esViaWeb) {
            $nuevoContrato = new ContratoWeb($fechaDesde, $fechaVenc, $objPlan, $objPlan->getImporte(), true, $objCliente);
        } else {
            $nuevoContrato = new ContratoOficina($fechaDesde, $fechaVenc, $objPlan,$objPlan->getImporte(), true, $objCliente);
        }
        array_push($coleccionContratos, $nuevoContrato);
        $this->setColeccionContratos($coleccionContratos);
    }

    public function retornarImporteContratos($codigoPlan){
        $retorno = 0;
        $coleccionContratos = $this->getColeccionContratos();
        foreach ($coleccionContratos as $objContrato) {
            if ($objContrato->getObjPlan()->getCodigo() == $codigoPlan) {
                $retorno += $objContrato->calcularImporte();
            }
        }
        return $retorno;
    }

    public function pagarContrato($objContrato){
        $objContrato->actualizarEstadoContrato();
        $costoContrato = $objContrato->calcularImporte();
        return $costoContrato;
    }
}
