<?php

class RegistroForm extends CFormModel
{
	public $email;
	public $nombre;
	public $apellidos;
	public $password;
	public $repetir_password;
	public $nif;
	public $telefono;

	public function rules(){
		return array(
			array(
					'email, nombre, password, repetir_password, nif',
					'required',
					'message' => 'Este campo es obligatorio'
			),
			array(
				'repetir_password',
				'compare',
				'compareAttribute'=>'password',
				'message'=>'Las contraseñas no coinciden',
			),
			array('email', 'comprobar_email'),
			array('nif', 'comprobar_nif'),
		);
	}
	
	public function comprobar_email($attributes, $params)
	{
		$conexion = Yii::app()->db;
		
		$consulta = "SELECT Email FROM usuario WHERE ";
		$consulta .= "Email='".$this->email."'";
		
		$resultado=$conexion->createCommand($consulta);
		$filas=$resultado->query();
		
		foreach($filas as $fila)
		{
			if($this->email === $fila['Email'])
			{
				$this->addError('Email', 'Email en uso');
				break;
			}
		}
	}
	
	public function comprobar_nif($attributes, $params)
	{
		$conexion = Yii::app()->db;
		
		$consulta = "SELECT NIF FROM usuario WHERE ";
		$consulta .= "NIF='".$this->nif."'";
		
		$resultado=$conexion->createCommand($consulta);
		$filas=$resultado->query();
		
		foreach($filas as $fila)
		{
			if($this->nif === $fila['NIF'])
			{
				$this->addError('nif', 'NIF en uso');
				break;
			}
		}
	}

}
