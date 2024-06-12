<?php
/*
 
Adquirir un plan implica un contrato. Los contratos tienen la fecha de inicio, la fecha de vencimiento, el plan, un estado (al día, moroso, suspendido), un costo, si se renueva o no y una referencia al cliente que adquirió el contrato.
*/
class Contrato
{

     //ATRIBUTOS
     private $fechaInicio;
     private $fechaVencimiento;
     private $objPlan;
     private $estado;  //al día, moroso, suspendido
     private $costo;
     private $seRenueva;
     private $objCliente;

     //CONSTRUCTOR
     public function __construct($fechaInicio, $fechaVencimiento, $objPlan, $costo, $seRenueva, $objCliente)
     {

          $this->fechaInicio = $fechaInicio;
          $this->fechaVencimiento = $fechaVencimiento;
          $this->objPlan = $objPlan;
          $this->estado = 'AL DIA';
          $this->costo = $costo;
          $this->seRenueva = $seRenueva;
          $this->objCliente = $objCliente;
     }


     public function getFechaInicio()
     {
          return $this->fechaInicio;
     }

     public function setFechaInicio($fechaInicio)
     {
          $this->fechaInicio = $fechaInicio;
     }

     public function getFechaVencimiento()
     {
          return $this->fechaVencimiento;
     }

     public function setFechaVencimiento($fechaVencimiento)
     {
          $this->fechaVencimiento = $fechaVencimiento;
     }


     public function getObjPlan()
     {
          return $this->objPlan;
     }

     public function setObjPlan($objPlan)
     {
          $this->objPlan = $objPlan;
     }

     public function getEstado()
     {
          return $this->estado;
     }

     public function setEstado($estado)
     {
          $this->estado = $estado;
     }

     public function getCosto()
     {
          return $this->costo;
     }

     public function setCosto($costo)
     {
          $this->costo = $costo;
     }

     public function getSeRenueva()
     {
          return $this->seRenueva;
     }

     public function setSeRenueva($seRenueva)
     {
          $this->seRenueva = $seRenueva;
     }


     public function getObjCliente()
     {
          return $this->objCliente;
     }

     public function setObjCliente($objCliente)
     {
          $this->objCliente = $objCliente;
     }

     public function __toString()
     {
          //string $cadena
          $cadena = "Fecha inicio: " . $this->getFechaInicio() . "\n";
          $cadena = "Fecha Vencimiento: " . $this->getFechaVencimiento() . "\n";
          $cadena = $cadena . "Plan: " . $this->getObjPlan() . "\n";
          $cadena = $cadena . "Estado: " . $this->getEstado() . "\n";
          $cadena = $cadena . "Costo: " . $this->getCosto() . "\n";
          $cadena = $cadena . "Se renueva: " . $this->getSeRenueva() . "\n";
          $cadena = $cadena . "Cliente: " . $this->getObjCliente() . "\n";


          return $cadena;
     }

     public function diasContratoVencido()
     {
          $fechaHoy = new DateTime();
          $fechaVencimiento = new DateTime($this->getFechaVencimiento());
          $diferencia = 0;
          $devolver = 0;
          if ($fechaHoy > $fechaVencimiento) {
              $diferencia = $fechaVencimiento->diff($fechaHoy);
              $devolver = $diferencia->days;
          }
          return $devolver;
     }

     public function actualizarEstadoContrato(){
          $diasVencido = $this->diasContratoVencido();
          if($diasVencido > 10) {
              $this->setEstado("Suspendido");
              $this->setSeRenueva(false);
          } else if($diasVencido <= 10 && $diasVencido > 0) {
              $this->setEstado("Moroso");
          } else {
              $this->setEstado("Al dia");
          }
          return $diasVencido;
      }

      public function calcularImporte(){
          $plan = $this->getObjPlan();
          $importeFinal = $plan->getImporte();
          $coleccionCanales = $plan->getColCanales();
          $diasVencido = $this->actualizarEstadoContrato();
     
          foreach ($coleccionCanales as $objCanal) {
              $importeFinal += $objCanal->getImporte();
          }
          if($this->getEstado() == "Moroso") {
              $importeFinal += $importeFinal * 0.1 * $diasVencido;
          } else if($this->getEstado() == "Suspendido") {
              $importeFinal += $importeFinal * 0.1 * 10;
          }
          return $importeFinal;
      }
}
