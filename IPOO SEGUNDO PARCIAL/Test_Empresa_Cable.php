<?php
include_once 'Canal.php';
include_once 'Cliente.php';
include_once 'Contrato.php';
include_once 'ContratoOficina.php';
include_once 'ContratoWeb.php';
include_once 'EmpresaCable.php';
include_once 'Plan.php';

// a) Se crea 1 instancia de la clase Empresa_Cable
echo "INICIALIZANDO INCISO A...\n";
$empresa = new EmpresaCable();

// b) Se crean 3 instancias de la clase Canal
echo "INICIALIZANDO INCISO B...\n";
$canal1 = new Canal("Noticias", 100, true);
$canal2 = new Canal("Deportivo", 200, true);
$canal3 = new Canal("Películas", 300, false);

// c) Se crean 2 instancias de la clase Planes, cada una de ellas con su código propio que hacen referencia a los canales creados anteriormente
echo "INICIALIZANDO INCISO C...\n";
$plan1 = new Plan(111, [$canal1, $canal2], 500);
$plan2 = new Plan(222, [$canal1, $canal3], 600);

// d) Crear una instancia de la clase Cliente
echo "INICIALIZANDO INCISO D...\n";
$cliente = new Cliente("Jose Deodo", "20-36997866-9", "Linares 220");

// e) Se crean 3 instancias de Contratos, 1 correspondiente a un contrato realizado en la empresa y 2 realizados via web
echo "INICIALIZANDO INCISO E...\n";
$contrato1 = new ContratoOficina("2024-06-01", "2024-07-01", $plan1, 500, true, $cliente);
$contrato2 = new ContratoWeb("2024-06-01", "2024-07-01", $plan2, 600, true, $cliente);
$contrato3 = new ContratoWeb("2024-06-01", "2024-07-01", $plan1, 500, true, $cliente);

// f) Invocar con cada instancia del inciso anterior al método calcularImporte y visualizar el resultado
echo "INICIALIZANDO INCISO F...\n";
echo $contrato1->calcularImporte() . "\n";
echo $contrato2->calcularImporte() . "\n";
echo $contrato3->calcularImporte() . "\n";

// g) Invocar al método incorporaPlan con uno de los planes creados en c)
echo "INICIALIZANDO INCISO G...\n";
echo $empresa->incorporarPlan($plan1) . "\n";

// h) Invocar nuevamente al método incorporaPlan de la empresa con el plan creado en c)
echo "INICIALIZANDO INCISO H...\n";
echo $empresa->incorporarPlan($plan2) . "\n";

// i) Invocar al método incorporarContrato con los siguientes parámetros: uno de los planes creado en c), el cliente creado en e), la fecha de hoy para indicar el inicio del contrato, la fecha de hoy más 30 días para indicar el vencimiento del mismo y false como último parámetro
echo "INICIALIZANDO INCISO I...\n";
echo $empresa->incorporarContrato($plan1, $cliente, "2024-06-12", "2024-07-12", false) . "\n";

// j) Invocar al método incorporarContrato con los siguientes parámetros: uno de los planes creado en c), el cliente creado en e), la fecha de hoy para indicar el inicio del contrato, la fecha de hoy más 30 días para indicar el vencimiento del mismo y true como último parámetro
echo "INICIALIZANDO INCISO J...\n";
echo $empresa->incorporarContrato($plan2, $cliente, "2024-06-12", "2024-07-12", true) . "\n";

// k) Invocar al método pagarContrato que recibe como parámetro uno de los contratos creados en d) y que haya sido contratado en la empresa
echo "INICIALIZANDO INCISO K...\n";
echo $empresa->pagarContrato($contrato1) . "\n";

// l) Invocar al método pagarContrato que recibe como parámetro uno de los contratos creados en d) y que haya sido contratado vía web
echo "INICIALIZANDO INCISO L...\n";
echo $empresa->pagarContrato($contrato2) . "\n";

// m) Invoca al método retornarImporteContratos con el código 111
echo "INICIALIZANDO INCISO M...\n";
echo $empresa->retornarImporteContratos(111) . "\n";
?>