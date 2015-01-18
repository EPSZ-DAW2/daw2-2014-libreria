<?php

class PedidoController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete','carrito','datos','loadChildByAjax'),
				'roles'=>array('admin','gerente','libreria','sysadmin','vendedor','cliente'),
			),/*
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'roles'=>array('admin','gerente','libreria','sysadmin','vendedor','cliente'),
			),/*
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),*/
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$pedido = $this->loadModel($id);
		$dataProvider=new CArrayDataProvider(
			$pedido->lineas,
			array(
				'keyField'=>'IdLinea',
				'sort'=>array(
					'attributes'=>array(
						'libro.Titulo',
					)
				),
				'pagination'=> array(
					'pageSize' => 2,
				)
			)
		);
		$this->render('view',array(
			'model'=>$pedido,
			'dataProvider' => $dataProvider,
		));
		/*
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
		*/
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pedido;
		//$linea=new Linea;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		//$this->performAjaxValidation(array($model,$linea));
		/*
        if(isset($_POST['Pedido'],$_POST['Linea']))
        {
            $model->attributes=$_POST['Pedido'];
            $linea->attributes=$_POST['Linea'];

			$valid=$model->validate();
			$valid=$linea->validate() && $valid;
			
			if($valid)
			{
				$model->save();
				$linea->save();
				$this->redirected(array('view','id'=>$model->IdPedido));
			}
			
            if($model->validate()){
                $model->save();
            }
            if($linea->validate()){
                $linea->IdPedido = $model->IdPedido;
                $linea->save();
            }

            if($model->validate() && $linea->validate()){
				$this->redirected(array('view','id'=>$model->IdPedido));
            }

		}
		}
        $this->render('create',array(
            'model'=>$model,
            'linea'=>$linea,
        ));
	}		
		*/
		if(isset($_POST['Pedido']))
		{
			$model->attributes=$_POST['Pedido'];
			if (isset($_POST['Linea']))
            {
                $model->lineas = $_POST['Linea'];
            }
            if ($model->saveWithRelated('lineas'))
                $this->redirect(array('view', 'id' => $model->IdPedido));
            else
                $model->addError('lineas', 'Error occured while saving linea.');
        }
			
			
			/*if($model->save())	$this->redirect(array('view','id'=>$model->IdPedido));*/

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

		if(isset($_POST['Pedido']))
		{
			$model->attributes=$_POST['Pedido'];
			if (isset($_POST['Linea']))
            {
                $model->lineas = $_POST['Linea'];
            }
            if ($model->saveWithRelated('lineas'))
                $this->redirect(array('view', 'id' => $model->IdPedido));
            else
                $model->addError('lineas', 'Error occured while saving linea.');
        }
			
			
			/*if($model->save())
				$this->redirect(array('view','id'=>$model->IdPedido));
			*/
		
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
		$dataProvider=new CActiveDataProvider('Pedido');
		if(Yii::app()->user->checkAccess( 'cliente')){
			$dataProvider->setCriteria(array(
			'condition'=>'IdCliente=:id',
			'params'=>array( ':id'=>Yii::app()->user->id
			),
		));
		}
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionCarrito(){
		$model= array();
		
		if(isset($_GET['IdLibro'])){
			if(Yii::app()->user->getState('carrito')){
				$model=Yii::app()->user->getState('carrito');
			}			
			if($model_libro= Libro::model()->findByPk($_GET['IdLibro'])){
				if(isset($model[$model_libro->IdLibro])){
					if(isset($_GET['Borrar'])){
						if(isset($model[$model_libro->IdLibro])){
							unset($model[$model_libro->IdLibro]);
							Yii::app()->user->setState('carrito',$model);
						}
					}elseif(isset($_GET['Restar'])){
						if(isset($model[$model_libro->IdLibro])){
							$model[$model_libro->IdLibro]->Cantidad--;
							$model[$model_libro->IdLibro]->Importe=($model[$model_libro->IdLibro]->Precio)*($model[$model_libro->IdLibro]->Cantidad);	
							if($model[$model_libro->IdLibro]->Cantidad<=0){
								unset($model[$model_libro->IdLibro]);
								Yii::app()->user->setState('carrito',$model);
							}
						}
					}else{
						$model[$model_libro->IdLibro]->Cantidad++;
						$model[$model_libro->IdLibro]->Importe=($model[$model_libro->IdLibro]->Precio)*($model[$model_libro->IdLibro]->Cantidad);			
					}
				}else{
					$model[$model_libro->IdLibro]= new Linea;
					$model[$model_libro->IdLibro]->IdLibro=$model_libro->IdLibro;
					$model[$model_libro->IdLibro]->Cantidad=1;
					$model[$model_libro->IdLibro]->Precio=$model_libro->Precio;
					$model[$model_libro->IdLibro]->Importe=($model[$model_libro->IdLibro]->Precio)*($model[$model_libro->IdLibro]->Cantidad);
					Yii::app()->user->setState('carrito',$model);
				}
			}
		}
		$this->render('carrito');
	}
	
	public function actionDatos(){
		$model=new Pedido;
		
		if(Yii::app()->user->getState('pedido')){
			$model= Yii::app()->user->getState('pedido');
		}

		if(isset($_POST['Pedido']))
		{
			$model->attributes=$_POST['Pedido'];
			if($model->validate()){
				if(!$model_cliente= Cliente::model()->findByPk($model->IdCliente)){
					$model_cliente= new Cliente;
					$model_cliente->IdCliente=$model->IdCliente;
					$model_cliente->DomicilioFacturacion=$model->DomicilioEnvio;
					$model_cliente->CPFacturacion=$model->CPEnvio;
					$model_cliente->PoblacionFacturacion=$model->PoblacionEnvio;
					$model_cliente->ProvinciaFacturacion=$model->ProvinciaEnvio;
					$model_cliente->Save();
				}
				if($model->save()){
					if(Yii::app()->user->getState('carrito')){
						$productos= Yii::app()->user->getState('carrito');
						foreach($productos as $model_linea){
							$model_linea->IdLinea=null;
							$model_linea->IdPedido=$model->IdPedido;
							$model_linea->Save();
						}
						unset(Yii::app()->user->carrito);
						unset(Yii::app()->user->pedido);
						$this->redirect(array('view','id'=>$model->IdPedido));
					}
				}
			}
		}
		$this->render('datos',array(
					'model'=>$model,
				));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		/*$model=new Pedido('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pedido']))
			$model->attributes=$_GET['Pedido'];
		*/
		if(Yii::app()->user->checkAccess( 'cliente'))
		{
			$model=new Pedido('search2');
		} else {
			$model=new Pedido('search');
		}
		
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pedido']))
			$model->attributes=$_GET['Pedido'];
			
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pedido the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pedido::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pedido $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pedido-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionLoadChildByAjax($index)
    {
        $model = new Linea;
        $this->renderPartial('linea/_form', array(
            'model' => $model,
            'index' => $index,
            'display' => 'block',
        ), false, true);
    }
}
