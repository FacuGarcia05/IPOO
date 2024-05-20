<?php
include_once 'Viaje.php';
include_once 'Pasajero.php';
include_once 'ResponsableV.php';
include_once 'PasajerosConNecesidad.php';
include_once 'PasajeroVIP.php';

$viaje = null;
$opcion= 0;

//Creacion de clases
$responsableViaje = new ResponsableV(23984, "VP2344", "Luis", "Bicci");


// Bucle del menú
do {
    // Mostrar el menú
    echo "Menú de Opciones\n";
    echo "1. Crear un nuevo viaje\n";
    echo "2. Agregar pasajero a un viaje\n";
    echo "3. Verificar disponibilidad de pasajes\n";
    echo "4. mostrar viaje\n";
    echo "5. Salir\n";

    // Solicitar la opción al usuario
    echo "Seleccione una opción: ";
    $opcion = intval(trim(fgets(STDIN)));

    switch ($opcion) {
        case 1:
            // Crear un nuevo viaje
            echo "Ingrese el código del viaje: ";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese el destino del viaje: ";
            $destino = trim(fgets(STDIN));
            echo "Ingrese la capacidad máxima del viaje: ";
            $capacidad = intval(trim(fgets(STDIN)));
            echo "Ingrese el costo del viaje: ";
            $costoViaje = floatval(trim(fgets(STDIN)));

            $viaje = new Viaje($codigo, $destino, $capacidad, $responsableViaje, $costoViaje);
            echo "Viaje creado correctamente.\n";
            break;
        case 2:
            if ($viaje !== null) {
                echo "Ingrese el nombre del pasajero: ";
                $nombre = trim(fgets(STDIN));
                echo "ingrese el apellido del pasajero: ";
                $apellido = trim(fgets(STDIN));
                echo "Ingrese el documento del pasajero: ";
                $doc = trim(fgets(STDIN));
                echo "Ingrese el telefono del pasajero: ";
                $telefono = trim(fgets(STDIN));
                echo "Ingrese el número de asiento del pasajero: ";
                $vNumeroAsiento = trim(fgets(STDIN));
                echo "Ingrese el número de ticket del pasajero: ";
                $vNumeroTicket = trim(fgets(STDIN));
                echo "¿Es pasajero VIP? (si/no): ";
                $esVIP = (trim(fgets(STDIN))) === 'si';
                echo "¿Tiene necesidades especiales? (si/no): ";
                $tieneNecesidadesEspeciales = (trim(fgets(STDIN))) === 'si';

                if ($esVIP) {
                    echo "Ingrese el número de viajero frecuente del pasajero: ";
                    $vNumeroViajero = trim(fgets(STDIN));
                    echo "Ingrese la cantidad de millas del pasajero: ";
                    $millas = intval(trim(fgets(STDIN)));

                    $pasajero = new PasajeroVIP($nombre, $apellido, $doc, $telefono, $vNumeroAsiento, $vNumeroTicket, $vNumeroViajero, $millas);
                } elseif ($tieneNecesidadesEspeciales) {
                    echo "necesita silla de ruedas(si/no): ";
                    $vSillaRuedas = trim(fgets(STDIN)) == 'si';
                    echo "necesita asistencia(si/no): ";
                    $vAsistencia = trim(fgets(STDIN)) == 'si';
                    echo "necesita comida especial(si/no): ";
                    $vComidaEspecial = trim(fgets(STDIN))== 'si' ;


                    $pasajero = new PasajerosConNecesidad($nombre,$apellido, $doc, $telefono, $vNumeroAsiento, $vNumeroTicket, $vSillaRuedas,$vAsistencia,$vComidaEspecial);
                } else {
                    $pasajero = new Pasajero($nombre, $apellido, $doc, $telefono, $vNumeroAsiento, $vNumeroTicket);
                }

                if ($viaje->venderPasaje($pasajero)) {
                    $costo = $viaje->getCostoTotalPasajes();
                    echo "Pasajero agregado correctamente al viaje, costo total del viaje(".$costo.").\n";
                } else {
                    echo "Error: No se pudo agregar el pasajero al viaje.\n";
                }
            } else {
                echo "Error: Primero debe crear un viaje.\n";
            }
            break;
        case 3:
            if ($viaje !== null) {
                if ($viaje->hayPasajesDisponibles()) {
                    echo "Hay pasajes disponibles en este viaje.\n";
                } else {
                    echo "No hay pasajes disponibles en este viaje.\n";
                }
            } else {
                echo "Error: Primero debe crear un viaje.\n";
            }
           
            break;
        case 4:
          echo $viaje;
            break;
        case 5:
            // Salir del programa
            echo "Saliendo...\n";
            break;
        default:
            echo "Opción no válida. Por favor, seleccione una opción válida.\n";
            break;
    }
} while ($opcion !== 5);