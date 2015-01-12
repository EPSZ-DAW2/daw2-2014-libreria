<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->usuario->Nombre=>array('view','id'=>$model->IdCliente),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Clientes', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),
	array('label'=>'Ver Cliente', 'url'=>array('view', 'id'=>$model->IdCliente)),
	array('label'=>'Gestionar Clientes', 'url'=>array('admin')),
);
?>

<h1>Actualizar Cliente: <?php echo $model->usuario->Nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
