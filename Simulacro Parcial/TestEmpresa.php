<?php
include_once 'Cliente.php';
include_once 'Moto.php';
include_once 'MotoNacional.php';
include_once 'MotoImportada.php';
include_once 'Venta.php';
include_once 'Empresa.php';
//1
$objCliente1 = new Cliente('Josefina', 'Pelimetlal', false, 'DNI', 12345678);
$objCliente2 = new Cliente('Marcos', 'Gominola', false, 'DNI', 87654321);
//2
$obMoto11 = new MotoNacional(11, 2230000, 2022, 'Benelli Imperiale 400', 0.85, true, 10);
$obMoto12 = new MotoNacional(12, 584000, 2021, 'Zanella Zr 150 Ohc', 0.70, true, 10);
$obMoto13 = new MotoNacional(13, 999900, 2023, 'Zanella Patagonian Eagle 250', 0.55, false, 10);
$obMoto14 = new MotoImportada(14, 12499900, 2020, 'Pitbike Enduro Motocross Apollo Aiii 190cc Plr', 1.00, true, 'Francia', 6244400);
//3
$empresa = new Empresa('Alta Gama', 'Av Argentina 123', [$objCliente1, $objCliente2], [$obMoto11, $obMoto12, $obMoto13, $obMoto14], []);
//4
$colCodigosMoto1 = [11, 12, 13, 14];
$resultado1 = $empresa->registrarVenta($colCodigosMoto1, $objCliente2);
echo "Resultado de la primera venta: $resultado1\n";
//5
$colCodigosMoto2 = [13, 14];
$resultado2 = $empresa->registrarVenta($colCodigosMoto2, $objCliente2);
echo "Resultado de la segunda venta: $resultado2\n";
//6
$colCodigosMoto3 = [14, 2]; 
$resultado3 = $empresa->registrarVenta($colCodigosMoto3, $objCliente2);
echo "Resultado de la tercera venta: $resultado3\n";
//7
$ventasImportadas = $empresa->informarVentasImportadas();
echo "Ventas Importadas:\n";
foreach ($ventasImportadas as $venta) {
    echo $venta . "\n";
}
//8
$sumaVentasNacionales = $empresa->informarSumaVentasNacionales();
echo "Suma de Ventas Nacionales: $sumaVentasNacionales\n";
//9
echo $empresa;