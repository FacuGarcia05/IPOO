<?php
include_once'Moto.php';
class MotoImportada extends Moto {
    private $paisOrigen;
    private $impuestosImportacion;

    public function __construct($codigo, $costo, $anio_fabricacion, $descripcion, $por_inc_anual, $activo, $paisOrigen, $impuestosImportacion) {
        parent::__construct($codigo, $costo, $anio_fabricacion, $descripcion, $por_inc_anual, $activo);
        $this->paisOrigen = $paisOrigen;
        $this->impuestosImportacion = $impuestosImportacion;
    }

    public function darPrecioVenta() {
        $precioVenta = parent::darPrecioVenta();
        return $precioVenta + ($precioVenta * $this->impuestosImportacion / 100);
    }

    public function __toString() {
        return parent::__toString() . ", País de Origen: $this->paisOrigen, Impuestos de Importación: $this->impuestosImportacion";
    }
}