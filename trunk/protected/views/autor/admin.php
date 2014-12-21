<?php
/* @var $this AutorController */
/* @var $model Autor */

$this->breadcrumbs=array(
	'Autores'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Autores', 'url'=>array('index')),
	array('label'=>'Crear Autor', 'url'=>array('create')),
);
?>

<h1>Gestionar Autores</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'autor-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Nombre',
		array(
			'name'=>'IdNacionalidad',
			'value'=>'$data->nacionalidad->NombreNacionalidad',
			'filter'=>CHtml::listData(Nacionalidad::model()->findAll(array('order' => 'NombreNacionalidad')),'IdNacionalidad','NombreNacionalidad'),
		),
		array(
			'name'=>'Web',
			'type'=>'html',
			'value'=>'$data->Web===NULL ? "Sin página web" : CHtml::link($data->Web,$data->Web)',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
