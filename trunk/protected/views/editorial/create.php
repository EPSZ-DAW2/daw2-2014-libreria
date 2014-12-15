<?php
/* @var $this EditorialController */
/* @var $model Editorial */

$this->breadcrumbs=array(
	'Editoriales'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Editorial', 'url'=>array('index')),
	array('label'=>'Gestionar Editorial', 'url'=>array('admin')),
);
?>

<h1>Crear Editorial</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
