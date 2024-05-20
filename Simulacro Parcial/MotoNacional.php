<?php
include_once'Moto.php';
class MotoNacional extends Moto {
    private $porcentajeDescuento;

    public function __construct($codigo, $costo, $anio_fabricacion, $descripcion, $por_inc_anual, $activo, $porcentajeDescuento) {
        parent::__construct($codigo, $costo, $anio_fabricacion, $descripcion, $por_inc_anual, $activo);
        $this->porcentajeDescuento = $porcentajeDescuento;
    }

    public function darPrecioVenta() {
        $precioVenta = parent::darPrecioVenta();
        return $precioVenta - ($precioVenta * $this->porcentajeDescuento / 100);
    }

    public function __toString() {
        return parent::__toString() . ", Porcentaje Descuento: $this->porcentajeDescuento";
    }
}