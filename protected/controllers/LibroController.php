<?php

class LibroController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','search'),
				'roles'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','imagen','admin','delete'),
				'roles'=>array('admin','gerente','libreria','sysadmin'),
			),
			array('deny',  // deny all users
				'roles'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		
		$libro = $this->loadModel($id);
		$this->render('view',array(
			'model'=>$libro,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Libro;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Libro']))
		{
			$model->attributes=$_POST['Libro'];
			if($model->save()){
				if(file_exists(Yii::getPathOfAlias('webroot').'/images/portadas/0_BIG.png')){
					if(copy(Yii::getPathOfAlias('webroot').'/images/portadas/0_BIG.png',Yii::getPathOfAlias('webroot').'/images/portadas/'.$model->IdLibro.'.png')){
					}
				}
				$this->redirect(array('view','id'=>$model->IdLibro));
			}
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

		if(isset($_POST['Libro']))
		{
			$model->attributes=$_POST['Libro'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IdLibro));
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
		$dataProvider=new CActiveDataProvider('Libro',
			array(
				'pagination'=> array(
					'pageSize'=>10
				)
				)
			);
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Libro('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Libro']))
			$model->attributes=$_GET['Libro'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Libro the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Libro::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Libro $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='libro-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionImagen($id)
        {
			$model_libro=$this->loadModel($id);
            $model = new ImagenForm();
             if(isset($_POST['ImagenForm']))
            {       
				$model->attributes=$_POST['ImagenForm'];
                if(isset($_FILES) and $_FILES['ImagenForm']['error']['foto']==0)
                 {
                    $uf = CUploadedFile::getInstance($model, 'foto');
                    if($uf->getExtensionName() == "jpg" || $uf->getExtensionName() == "png" ||
                        $uf->getExtensionName() == "jpeg" || $uf->getExtensionName()== "gif")
                    {
						$uf->saveAs(Yii::getPathOfAlias('webroot').'/images/portadas/'.$model_libro->IdLibro.'tem.png');
                          Yii::app()->user->setFlash('imagen','/images/portadas/'.$model_libro->IdLibro.'tem.png');
                    }else{
                        Yii::app()->user->setFlash('error_imagen','Imagen no valida');
                    }  
                 }
				 elseif(isset($_POST['BotonGuardar'])){
					if(file_exists(Yii::getPathOfAlias('webroot').'/images/portadas/'.$model_libro->IdLibro.'tem.png')){
						if(rename(Yii::getPathOfAlias('webroot').'/images/portadas/'.$model_libro->IdLibro.'tem.png',Yii::getPathOfAlias('webroot').'/images/portadas/'.$model_libro->IdLibro.'.png')){
							$model = new ImagenForm();
							Yii::app()->user->setFlash('noerror_imagen','Imagen: '.$model_libro->IdLibro.' Subida Correctamente');
						}
					}
				}
            }
            $this->render('imagen',array('model'=>$model,'model_libro'=>$model_libro));
        }
	
	public function actionSearch()
	{
		$model = new Libro('search');
		$model->unsetAttributes();
		if(isset($_GET['search_key'])) 
			$model->Titulo = $_GET['search_key']; 

		$this -> render('search', array(
			'model' => $model,
		));
	}
}
