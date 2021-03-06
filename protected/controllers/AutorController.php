<?php

class AutorController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all: sysadmin y admin
				'actions'=>array('index','view', 'create', 'update', 'admin', 'delete', 'search'),
				'roles'=>array('sysadmin', 'admin', 'gerente', 'libreria', 'vendedor'),
			),
			array('allow',  // allow all: sysadmin y admin
				'actions'=>array('index','view'),
				'roles'=>array('cliente'),
			),
			array('allow',
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('deny'),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$autor = $this->loadModel($id);
		$dataProvider=new CArrayDataProvider(
			$autor->libros,
			array(
				'keyField'=>'IdLibro',
				'sort'=>array(
					'attributes'=>array(
						'Titulo',
						'editorial.Nombre',
					)
				),
				'pagination'=> array(
					'pageSize' => 2,
				)
			)
		);
		$this->render('view',array(
			'model'=>$autor,
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Autor;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Autor']))
		{
			$model->attributes=$_POST['Autor'];
			if($model->Web == '')
				$model->Web = NULL;
			if($model->save())
				$this->redirect(array('view','id'=>$model->IdAutor));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Autor']))
		{
			$model->attributes=$_POST['Autor'];
			if($model->Web == '')
				$model->Web = NULL;
			if($model->save())
				$this->redirect(array('view','id'=>$model->IdAutor));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Autor');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new Autor('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Autor']))
			$model->attributes=$_GET['Autor'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Autor the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Autor::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'La página solicitada no está disponible.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Autor $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='autor-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
