<?php
class Torneo
{
    private $coleccionPartidos;
    private $importe;

    //METODO CONSTRUCT
    public function __construct($coleccionPartidos, $importe)
    {
        $this->importe = $importe;
        $this->coleccionPartidos = [];
    }

    //OBSERVADORES
    public function getImporte()
    {
        return $this->importe;
    }
    public function getColeccionPartidos()
    {
        return $this->coleccionPartidos;
    }

    //MODIFICADORES
    public function setImporte($importe)
    {
        $this->importe = $importe;
    }

    public function setColeccionPartidos($coleccionPartidos)
    {
        $this->coleccionPartidos = $coleccionPartidos;
    }

    //METODO TOSTRING
    public function __toString()
    {
        $infoColeccionPartidos = "";
        foreach ($this->coleccionPartidos as $cP) {
            $infoColeccionPartidos .= $cP->__toString() . "\n";
        } {
            return "----------- PARTIDOS -----------" . $infoColeccionPartidos .
                "\n Importe: " . $this->getImporte();
        }
    }

    public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido)
    {

        $resultado = null;

        if ($OBJEquipo1->getObjCategoria() != $OBJEquipo2->getObjCategoria() || $OBJEquipo1->getCantJugadores() != $OBJEquipo2->getCantJugadores()) {
            $resultado = false;
        } else {
            $id =  (count($this->getColeccionPartidos()) + 1);
            if ($tipoPartido == 'Futbol') {
                $partidoNuevo = new Futbol($id, $fecha, $OBJEquipo1, 0, $OBJEquipo2, 0);
            } elseif ($tipoPartido == 'Basquetbol') {
                $partidoNuevo = new Basquetbol(0, 0, $id, $fecha, $OBJEquipo1, 0, $OBJEquipo2, 0);
            } else {
                $resultado = false;
            }
        }
        if ($resultado == null) {
            $coleccionP = $this->getColeccionPartidos();
            $coleccionP[] = $partidoNuevo;
            $this->setColeccionPartidos($coleccionP);
            $resultado = $partidoNuevo;
        }
        return $resultado;
    }

    public function darGanadores($deporte)
    {
        $totalGanadores = [];

        foreach ($this->coleccionPartidos as $partido) {
            $ganador = null;
            if ($deporte == 'Futbol' && $partido instanceof Futbol) {
                $ganador = $partido->darEquipoGanador();
            } elseif ($deporte == 'Basquetbol' && $partido instanceof Basquetbol) {
                $ganador = $partido->darEquipoGanador();
            }

            if ($ganador != null) {
                if (is_array($ganador)) {
                    foreach ($ganador as $equipo) {
                        if (!in_array($equipo, $totalGanadores)) {
                            $totalGanadores[] = $equipo;
                        }
                    }
                } else {
                    if (!in_array($ganador, $totalGanadores)) {
                        $totalGanadores[] = $ganador;
                    }
                }
            }
        }
        return $totalGanadores;
    }

    public function calcularPremioPartido($OBJPartido){
        $ganador = $OBJPartido->darEquipoGanador();
        $coeficiente = $OBJPartido->coeficientePartido();
        $premio = $coeficiente * $this->getImporte();

        if (is_array($ganador)){
            //En caso de empate, hay dos ganadores.
        $equipo = ['equipoGanadores' => $ganador, 'premioPartido' => $premio];
        } else {
            $equipo = ['EquipoGanador' => $ganador, 'premioPartido' => $premio];
        }
        return  $equipo;
    }
}
