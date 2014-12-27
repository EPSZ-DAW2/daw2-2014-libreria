<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
	/**
	 * Displays the register page
	 */
	public function actionRegistro(){
		
		$model = new RegistroForm;
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='registro-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		if (isset($_POST['RegistroForm'])){
		
			$model->attributes = $_POST['RegistroForm'];
			if(!$model->validate())
				$model->addError('Repetir password', 'Error al enviar el formulario');

		}
		$this->render('registro',array('model'=>$model));	
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/**
	 * Acción para comprobar la configuración de la aplicación.
	 */
	public function actionConfiguracion()
	{
		$html= '<h1>Configuración</h1>';
		$html.= '<br/>';
		
		$valor= Configuracion::LineasPagina();
		$html.= 'LineasPagina= '.var_export( $valor, true);
		$html.= '<br/>';
		
		$valor= Configuracion::LibrosPagina();
		$html.= 'LibrosPagina= '.var_export( $valor, true);
		$html.= '<br/>';
		
		$valor= Configuracion::IvaLibros();
		$html.= 'IvaLibros= '.var_export( $valor, true);
		$html.= '<br/>';
		
		//...
		
		$this->renderText( $html);
	}
	
	/**
	 * Acción para comprobar la configuración de la aplicación.
	 */
	public function actionCrearRoles()
	{
		$html= '<h1>Crear Roles de Aplicación y Usuarios de Prueba</h1>';
		$html.= '<br/>';
		
		$manager= Yii::app()->authManager;
		
		//Borrar todos los datos de autorizaciones existentes.
		$manager->clearAll();
		//Borrar todos los datos de usuarios de prueba.
		Usuario::model()->deleteAll();
		
		//Crear los ROLES fijados en el diseño...
		$roles= array(
			'sysadmin',
			'admin',
			'cliente',
			'vendedor',
			'libreria',
			'gerente',
		);
		foreach( $roles as $i => $rol) {
			$manager->createRole( $rol);
			
			$usuario= new Usuario;
			//--$usuario->IdUsuario= ...;
			$usuario->Email= $rol;
			$usuario->Password= $rol;
			$usuario->Nombre= 'Usuario de Prueba "'.$rol.'"';
			$usuario->Apellidos= 'Apellidos de "'.$rol.'"';
			$usuario->NIF= sprintf( '1234%05d',$i);
			$usuario->Telefono= 123456789;
			$usuario->Bloqueado= 0;
			$usuario->FechaRegistro= date('Y-m-d H:i:s');
			$usuario->Revisado= 1;
			if ($usuario->save()) {
				$manager->assign( $rol,$usuario->IdUsuario);
			} else {
				$html.= 'Error al guardar usuario "'.$rol.'":'.'<br/>';
				$html.= print_r( $usuario->getErrors(), true).'<br/>';
			}
		}
		
		//Comprobar que se ha guardado bien...
		$html.= 'Roles Existentes:'.'<br/>';
		$lista= $manager->getRoles();
		foreach( $lista as $rol) {
			$html.= ' - '.$rol->name.'<br/>';
		}
		$html.= '<hr/>';
		
		$html.= 'Usuarios Existentes:'.'<br/>';
		$usuarios= Usuario::model()->findAll();
		foreach( $usuarios as $usuario) {
			$html.= '* Usuario: '.$usuario->Nombre.'<br/>';
			$lista= $manager->getRoles( $usuario->IdUsuario);
			foreach( $lista as $rol) {
				$html.= ' - '.$rol->name.'<br/>';
			}
		}
		$html.= '<hr/>';
		
		//...
		
		$this->renderText( $html);
	}
}