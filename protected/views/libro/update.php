<?php
/* @var $this LibroController */
/* @var $model Libro */

$this->breadcrumbs=array(
	'Libros'=>array('index'),
	$model->IdLibro=>array('view','id'=>$model->IdLibro),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Libros', 'url'=>array('index')),
	array('label'=>'Insertar Libro', 'url'=>array('create')),
	array('label'=>'Ver Libro', 'url'=>array('view', 'id'=>$model->IdLibro)),
	array('label'=>'Administrar Libros', 'url'=>array('admin')),
	array('label'=>'Modificar Portada', 'url'=>array('imagen', 'id'=>$model->IdLibro)),
);
?>

<h1>Update Libro <?php echo $model->IdLibro; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>