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
					'email',
					'email',
					'message' => 'Mensaje, el formato de email es incorrecto'
			),			
			array(
					'password',
					'match',
					'pattern' => '/^[a-zA-Z0-9]{7,12}+$/i',
					'message' => 'Mensaje, solamente mayúsculas, minúsculas y números, entre 7 y 12 caracteres.'
			),
			array(
					'nombre',
					'match',
					'pattern' => '/^[a-z0-9áéíóú\_]+$/i',
					'message' => 'Mensaje, solo letras, números y guiones bajos'
			),
			array(
					'apellidos',
					'match',
					'pattern' => '/^[a-z0-9áéíóú\-]+$/i',
					'message' => 'Mensaje, solo letras, números y guiones medios'
			),
			array(
					'nif',
					'match',
					'pattern' => '/^[0-9]{8}[A-Z]{1}+$/i',
					'message' => 'Mensaje, DNI con formato 12345678Z'
			),
			array(
					'telefono',
					'match',
					'pattern' => '/^[0-9]{9,12}+$/i',
					'message' => 'Mensaje, entre 9 y 12 números'
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
