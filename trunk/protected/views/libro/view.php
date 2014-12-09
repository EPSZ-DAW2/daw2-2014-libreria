<?php
/* @var $this LibroController */
/* @var $model Libro */

$this->breadcrumbs=array(
	'Libros'=>array('index'),
	$model->IdLibro,
);

$this->menu=array(
	array('label'=>'List Libro', 'url'=>array('index')),
	array('label'=>'Create Libro', 'url'=>array('create')),
	array('label'=>'Update Libro', 'url'=>array('update', 'id'=>$model->IdLibro)),
	array('label'=>'Delete Libro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdLibro),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Libro', 'url'=>array('admin')),
);
?>

<h1>View Libro <?php echo $model->Titulo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdLibro',
		'ISBN',
		array( 'name'=>'IdEditorial', 'value'=>(($model->editorial !== null) ? $model->editorial->Nombre : '')),
		'Titulo',
		'Edicion',
		'Paginas',
		'Formato',
		'IdIdioma',
		'Resumen',
		'Precio',
		'Stock',
	),
)); ?>
