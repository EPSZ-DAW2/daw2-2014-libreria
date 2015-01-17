<?php
/* @var $this PedidoController */
/* @var $model Pedido */

$this->breadcrumbs=array(
	'Pedidos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Pedidos', 'url'=>array('index')),
	array('label'=>'Gestionar Pedidos', 'url'=>array('admin')),
);
?>

<h1>Crear Pedido</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>