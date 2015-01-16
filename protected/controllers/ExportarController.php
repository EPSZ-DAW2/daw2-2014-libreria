<?php

class ExportarController extends Controller
{
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index'),
				'roles'=>array('sysadmin', 'admin'),
			),
			array('deny'),
		);
	}

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function actionIndex(){
		$modelo=new ExportarForm;
		if(isset($_POST['ExportarForm'])){
			$modelo->attributes=$_POST['ExportarForm'];
			//Además de validar el propio modeloo, se deberán validar también las tablas (que al menos haya una marcada)
			if ($modelo->validate() && $modelo->validarTablas()){
				//Guardamos un array booleano con que tablas deben ser guardadas
				$tablas = array($modelo->authassignment, $modelo->authitem, $modelo->authitemchild, $modelo->autor, $modelo->categoria, $modelo->cliente, $modelo->configuracion, $modelo->editorial, $modelo->estado, $modelo->forma_pago, $modelo->idioma, $modelo->libro, $modelo->libro_autor, $modelo->libro_categoria, $modelo->linea, $modelo->nacionalidad, $modelo->pedido, $modelo->usuario);

				//Comprobamos si hay que exportar en SQL o XML
				if($modelo->opcion) CopiaDeSeguridad::exportarSQL($tablas,true);
				else CopiaDeSeguridad::exportarXML($tablas);
			}else Yii::app()->user->setFlash('error','Debes elegir al menos una tabla');
		}
		$this->render('index',array('exportar'=>$modelo));
	}
}
?>
