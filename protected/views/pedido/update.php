<?php
/* @var $this PedidoController */
/* @var $model Pedido */

$this->breadcrumbs=array(
	'Pedidos'=>array('index'),
	$model->IdPedido=>array('view','id'=>$model->IdPedido),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Pedidos', 'url'=>array('index')),
	//array('label'=>'Create Pedido', 'url'=>array('create')),
	array('label'=>'Ver Pedido', 'url'=>array('view', 'id'=>$model->IdPedido)),
	array('label'=>'Gestionar Pedidos', 'url'=>array('admin')),
);
?>

<h1>Actualizar Pedido nº <?php echo $model->IdPedido.'-'.$model->Serie.'-'.$model->Numero; ?></h1>

<?php 
	if(Yii::app()->user->checkAccess( 'cliente')){
		$this->renderPartial('_form2', array('model'=>$model)); 
	} else {
		$this->renderPartial('_form', array('model'=>$model));
	}
?>