<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		/*$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		*/
		$usuario= Usuario::model()->findByAttributes( array(
			'Email'=>$this->username,
			'Password'=>$this->password,
		));
		if ($usuario === null) {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		} else {
			$this->errorCode=self::ERROR_NONE;
			$this->_id= $usuario->IdUsuario;
			$this->_nombre= $usuario->Nombre;
		}
		return !$this->errorCode;
	}
	
	
	private $_id= null;
	private $_nombre= null;
	//Devolver el ID del usuario activo
	public function getId()
	{
		return $this->_id;
	}

	//Devolver el Nombre del usuario activo
	public function getName()
	{
		return $this->_nombre;
	}	
}