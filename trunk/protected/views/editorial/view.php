<?php
/* @var $this EditorialController */
/* @var $model Editorial */

$this->breadcrumbs=array(
	'Editorials'=>array('index'),
	$model->IdEditorial,
);

$this->menu=array(
	array('label'=>'List Editorial', 'url'=>array('index')),
	array('label'=>'Create Editorial', 'url'=>array('create')),
	array('label'=>'Update Editorial', 'url'=>array('update', 'id'=>$model->IdEditorial)),
	array('label'=>'Delete Editorial', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdEditorial),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Editorial', 'url'=>array('admin')),
);
?>

<h1>View Editorial #<?php echo $model->IdEditorial; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdEditorial',
		'Nombre',
		'Web',
	),
)); ?>
