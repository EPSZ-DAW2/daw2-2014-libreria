<?php

class Consultas_registroDB {
	//la consulta para insertar nuevo usuario en la bd
	
	public function guardar_usuario($email, $password, $nombre, $apellidos, $nif, $telefono)
	{
		$conexion = Yii::app()->db;
		
		$consulta = "INSERT INTO usuario(Email,Password,Nombre,Apellidos,NIF,Telefono)";
		$consulta .= "VALUES";
		$consulta .= "('$email', '$password', '$nombre', '$apellidos', '$nif', '$telefono')";
		
		$resultado = $conexion->createCommand($consulta)->execute();
		
	}
	
}

?>