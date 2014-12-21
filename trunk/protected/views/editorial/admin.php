<?php
/* @var $this EditorialController */
/* @var $model Editorial */

$this->breadcrumbs=array(
	'Editoriales'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Editoriales', 'url'=>array('index')),
	array('label'=>'Crear Editorial', 'url'=>array('create')),
);?>

<h1>Gestionar Editoriales</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'editorial-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Nombre',
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
