<?php
include_once "BaseDatos.php";
class persona
{

	private $pDocumento;
	private $pNombre;
	private $pApellido;
	private $pTelefono;
	private $mensajeoperacion;

	public function __construct()
	{

		$this->pDocumento = " ";
		$this->pNombre = " ";
		$this->pApellido = " ";
		$this->pTelefono = null;
	}

	public function getPDocumento()
	{
		return $this->pDocumento;
	}

	public function setPDocumento($nroDoc)
	{
		$this->pDocumento = $nroDoc;
	}

	public function getPNombre()
	{
		return $this->pNombre;
	}

	public function setPNombre($nombre)
	{
		$this->pNombre = $nombre;
	}

	public function getPApellido()
	{
		return $this->pApellido;
	}

	public function setPApellido($apellido)
	{
		$this->pApellido = $apellido;
	}

	public function getPTelefono()
	{
		return $this->pTelefono;
	}

	public function setPTelefono($telefono)
	{
		$this->pTelefono = $telefono;
	}
	public function getmensajeoperacion()
	{
		return $this->mensajeoperacion;
	}

	public function setmensajeoperacion($mensaje)
	{
		$this->mensajeoperacion = $mensaje;
	}

	public function cargar($nroDoc, $nombre, $apellido, $telefono)
	{

		$this->setPDocumento($nroDoc);
		$this->setPNombre($nombre);
		$this->setPApellido($apellido);
		$this->setPTelefono($telefono);
	}
	/**
	 * Recupera los datos de una persona por dni
	 */
	public function buscar($dni)
	{
		$base = new BaseDatos();
		$consultaPersona = "Select * from persona where pdocumento= " . $dni;
		$resp = false;
		if ($base->iniciar()) {
			if ($base->ejecutar($consultaPersona)) {
				if ($row2 = $base->registro()) {
					$this->setPDocumento($dni);
					$this->setPNombre($row2['pnombre']);
					$this->setPApellido($row2['papellido']);
					$this->setPTelefono($row2['ptelefono']);
					$resp = true;
				}
			} else {
				$this->setmensajeoperacion($base->getError());
			}
		} else {
			$this->setmensajeoperacion($base->getError());
		}
		return $resp;
	}


	public function listar($condicion = "")
	{
		$arregloPersona = null;
		$base = new BaseDatos();
		$consultaPersonas = "SELECT * FROM persona";
		if ($condicion != "") {
			$consultaPersonas .= ' WHERE ' . $condicion;
		}
		$consultaPersonas .= " ORDER BY papellido";

		if ($base->iniciar()) {
			if ($base->ejecutar($consultaPersonas)) {
				$arregloPersona = [];
				while ($row2 = $base->Registro()) {
					$nroDoc = $row2['pdocumento'];
					$nombre = $row2['pnombre'];
					$apellido = $row2['papellido'];
					$telefono = $row2['ptelefono'];

					$perso = new persona();
					$perso->cargar($nroDoc, $nombre, $apellido, $telefono);
					array_push($arregloPersona, $perso);
				}
			} else {
				$arregloPersona = false;
				$this->setMensajeOperacion($base->getError());
			}
		} else {
			$arregloPersona = false;
			$this->setMensajeOperacion($base->getError());
		}

		return $arregloPersona;
	}

	public function insertar()
	{
		$base = new BaseDatos();
		$resp = false;
		$consulta = "INSERT INTO persona(pdocumento,pnombre,papellido,ptelefono) 
				VALUES ('" . $this->getPDocumento() . "','" . $this->getPNombre() . "','" . $this->getPApellido() . "'," . $this->getPTelefono() . ")";
		if ($base->iniciar()) {
			if ($base->ejecutar($consulta)) {
				$resp = true;
			} else {
				$this->setmensajeoperacion($base->getError());
			}
		} else {
			$this->setmensajeoperacion($base->getError());
		}
		return $resp;
	}

	public function modificar()
	{
		$resp = false;
		$base = new BaseDatos();
		$consultaModifica = "UPDATE persona SET pnombre = '{$this->getPnombre()}', papellido = '{$this->getPapellido()}', ptelefono = '{$this->getPtelefono()}' WHERE pdocumento =  '{$this->getPdocumento()}'";
		if ($base->iniciar()) {
			if ($base->ejecutar($consultaModifica)) {
				$resp =  true;
			} else {
				$this->setmensajeoperacion($base->getError());
			}
		} else {
			$this->setmensajeoperacion($base->getError());
		}
		return $resp;
	}

	public function eliminar()
	{
		$base = new BaseDatos();
		$resp = false;
		if ($base->iniciar()) {
			$consultaBorra = "DELETE FROM persona WHERE pdocumento=" . $this->getPDocumento();
			if ($base->ejecutar($consultaBorra)) {

				$resp =  true;
			} else {
				$this->setmensajeoperacion($base->getError());
			}
		} else {
			$this->setmensajeoperacion($base->getError());
		}
		return $resp;
	}

	public function __toString()
	{
		$cadena =  "Nombre: " . $this->getPNombre() . "\n";
		$cadena .= "Apellido: " . $this->getPApellido() . "\n";
		$cadena .= "DNI: " . $this->getPDocumento() . "\n";
		$cadena .= "Telefono: " . $this->getPTelefono() . "\n";

		return $cadena;
	}
}
