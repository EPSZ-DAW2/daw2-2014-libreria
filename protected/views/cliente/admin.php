<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Gestionar Clientes',
);

$this->menu=array(
	array('label'=>'Listar Cliente', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),
);

?>


<h1>Gestionar Clientes</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cliente-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('name'=>'nombreCliente', 'value'=>'$data->usuario->Nombre'),
		array('name'=>'apellidosCliente', 'value'=>'$data->usuario->Apellidos'),
		array('name'=>'nifCliente', 'value'=>'$data->usuario->NIF'),
		'DomicilioFacturacion',
		'CPFacturacion',
		'PoblacionFacturacion',
		'ProvinciaFacturacion',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
