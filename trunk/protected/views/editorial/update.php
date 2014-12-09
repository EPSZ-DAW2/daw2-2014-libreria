<?php
/* @var $this EditorialController */
/* @var $model Editorial */

$this->breadcrumbs=array(
	'Editorials'=>array('index'),
	$model->IdEditorial=>array('view','id'=>$model->IdEditorial),
	'Update',
);

$this->menu=array(
	array('label'=>'List Editorial', 'url'=>array('index')),
	array('label'=>'Create Editorial', 'url'=>array('create')),
	array('label'=>'View Editorial', 'url'=>array('view', 'id'=>$model->IdEditorial)),
	array('label'=>'Manage Editorial', 'url'=>array('admin')),
);
?>

<h1>Update Editorial <?php echo $model->IdEditorial; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>