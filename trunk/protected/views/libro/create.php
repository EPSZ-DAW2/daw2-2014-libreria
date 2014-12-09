<?php
/* @var $this LibroController */
/* @var $model Libro */

$this->breadcrumbs=array(
	'Libros'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Libro', 'url'=>array('index')),
	array('label'=>'Manage Libro', 'url'=>array('admin')),
);
?>

<h1>Create Libro</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>