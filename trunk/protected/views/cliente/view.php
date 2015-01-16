<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->usuario->Nombre.' '.$model->usuario->Apellidos,
);

$this->menu=array(
	array('label'=>'Listar Clientes', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create'), 'visible'=>!Yii::app()->user->checkAccess('cliente'), 'visible'=>!Yii::app()->user->checkAccess('cliente')),
	array('label'=>'Actualizar Cliente', 'url'=>array('update', 'id'=>$model->IdCliente), 'visible'=>!Yii::app()->user->checkAccess('cliente')),
	array('label'=>'Borrar Cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdCliente),'confirm'=>'¿Estás seguro de que desea borrar este autor?'), 'visible'=>!Yii::app()->user->checkAccess('cliente')),
	array('label'=>'Gestionar Clientes', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->checkAccess('cliente')),
);
?>

<h1>Cliente: <?php echo $model->usuario->Nombre.' '.$model->usuario->Apellidos; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'usuario.Nombre',
		'usuario.Apellidos',
		'usuario.NIF',
		'usuario.Telefono',
		'DomicilioFacturacion',
		'CPFacturacion',
		'PoblacionFacturacion',
		'ProvinciaFacturacion',
		array(
				'label'=>$model->usuario->getAttributeLabel('Bloqueado'),
				'value'=>$model->usuario->Bloqueado==0 ? 'NO' : 'SI',
			),
		array(
				'label'=>$model->usuario->getAttributeLabel('Revisado'),
				'value'=>$model->usuario->Revisado==0 ? 'NO' : 'SI',
			),
	),
)); ?>
