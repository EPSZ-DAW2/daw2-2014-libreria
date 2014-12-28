<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->cliente->Nombre.' '.$model->cliente->Apellidos,
);

$this->menu=array(
	array('label'=>'Listar Clientes', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),
	array('label'=>'Actualizar Cliente', 'url'=>array('update', 'id'=>$model->IdCliente)),
	array('label'=>'Borrar Cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdCliente),'confirm'=>'¿Estás seguro de que desea borrar este autor?')),
	array('label'=>'Gestionar Clientes', 'url'=>array('admin')),
);
?>

<h1>Cliente: <?php echo $model->cliente->Nombre.' '.$model->cliente->Apellidos; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cliente.Nombre',
		'cliente.Apellidos',
		'cliente.NIF',
		'cliente.Telefono',
		'DomicilioFacturacion',
		'CPFacturacion',
		'PoblacionFacturacion',
		'ProvinciaFacturacion',
		array(
				'label'=>$model->cliente->getAttributeLabel('Bloqueado'),
				'value'=>$model->cliente->Bloqueado==0 ? 'NO' : 'SI',
			),
		array(
				'label'=>$model->cliente->getAttributeLabel('Revisado'),
				'value'=>$model->cliente->Revisado==0 ? 'NO' : 'SI',
			),
	),
)); ?>
