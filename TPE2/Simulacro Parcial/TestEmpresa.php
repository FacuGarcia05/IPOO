<?php
    include_once "Cliente.php";
    include_once "Empresa.php";
    include_once "Moto.php";
    include_once "Venta.php";

    //1)
    $objCliente1 = new Cliente("Facundo", "Garcia",true, "DNI", 43689222,);
    $objCliente2 = new Cliente("Timoteo", "Segundo",false, "DNI", 46899655,);
    $colClientes = [$objCliente1, $objCliente2];


    //2)
    $moto1 = new Moto(11, 22300000, 2022, "Benelli Imperiale 400", 85, true);
    $moto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
    $moto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);
    $colMotos = [$moto1, $moto2, $moto3];

    //4)
    $objEmpresa = new Empresa("Alta Gama", "Av Argentina 123", $colClientes, $colMotos, []);

//5)
$importe =$objEmpresa->registrarVenta([11,12,13],$objCliente2);
echo "El precio final es de $".$importe."\n";

//6)
$importe2 = $objEmpresa->registrarVenta([0],$objCliente2);
echo "El precio final es de $".$importe2."\n";

//7)
$importe3 = $objEmpresa->registrarVenta([2],$objCliente2);
echo "El precio final es de $".$importe3."\n";


// Metodo que muestra las ventas
function mostrarVentas($ventas){
    if($ventas == null){
        $mensaje = "La venta es nula\n";
    }else{
        $mensaje = "Las ventas del cliente:\n";
        for($i=0;$i<count($ventas);$i++){
            $mensaje= $mensaje.$ventas[$i]."\n";
        }
    }
    return $mensaje;
}

//8)
$tipoDoc1 = $objCliente1->getTipoDoc();
$numDoc1 = $objCliente1->getNumDoc();
$ventasCliente1 = $objEmpresa->retornarVentasXCliente($tipoDoc1,$numDoc1);
echo "8) ". mostrarVentas($ventasCliente1);

//9)
$tipoDoc2 = $objCliente2->getTipoDoc();
$numDoc2 = $objCliente2->getNumDoc();
$ventasCliente2 = $objEmpresa->retornarVentasXCliente($tipoDoc2,$numDoc2);
echo "9) ".mostrarVentas($ventasCliente2)."\n";

//10)
echo $objEmpresa->__toString();
    