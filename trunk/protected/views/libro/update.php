<?php
/* @var $this LibroController */
/* @var $model Libro */

$this->breadcrumbs=array(
	'Libros'=>array('index'),
	$model->IdLibro=>array('view','id'=>$model->IdLibro),
	'Update',
);

$this->menu=array(
	array('label'=>'List Libro', 'url'=>array('index')),
	array('label'=>'Create Libro', 'url'=>array('create')),
	array('label'=>'View Libro', 'url'=>array('view', 'id'=>$model->IdLibro)),
	array('label'=>'Manage Libro', 'url'=>array('admin')),
);
?>

<h1>Update Libro <?php echo $model->IdLibro; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>