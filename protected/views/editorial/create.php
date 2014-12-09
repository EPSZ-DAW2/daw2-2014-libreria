<?php
/* @var $this EditorialController */
/* @var $model Editorial */

$this->breadcrumbs=array(
	'Editorials'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Editorial', 'url'=>array('index')),
	array('label'=>'Manage Editorial', 'url'=>array('admin')),
);
?>

<h1>Create Editorial</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>