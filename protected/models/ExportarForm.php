<?php


class ExportarForm extends CFormModel
{
	//Botónes de check de cada una de las tablas
	public $authassignment=true;
	public $authitem=true;
	public $authitemchild=true;
	public $autor=true;
	public $categoria=true;
	public $cliente=true;
	public $configuracion=true;
	public $editorial=true;
	public $estado=true;
	public $forma_pago=true;
	public $idioma=true;
	public $libro=true;
	public $libro_autor=true;
	public $libro_categoria=true;
	public $linea=true;
	public $nacionalidad=true;
	public $pedido=true;
	public $usuario=true;

	//Botón de radio para escoger SQL o XML
	public $opcion;

	//Reglas del modelo
	public function rules()
	{
		return array(
			array('authassignment, authitem, authitemchild, autor, categoria, cliente, configuracion, editorial, estado, forma_pago, idioma, libro, libro_autor, libro_categoria, linea, nacionalidad, pedido, usuario', 'boolean'),
			array('opcion', 'safe'),

		);
	}

	//Función para validar los botones de check. Deberá estar activado al menos uno
	public function validarTablas()
	{
		if($this->authassignment || $this->authitem || $this->authitemchild || $this->autor || $this->categoria || $this->cliente || $this->configuracion || $this->editorial || $this->estado || $this->forma_pago || $this->idioma || $this->libro || $this->libro_autor || $this->libro_categoria || $this->linea || $this->nacionalidad || $this->pedido || $this->usuario)
			return true;
		else
			return false;
	}
}
