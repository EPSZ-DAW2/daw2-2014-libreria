<?php
/* @var $this AutorController */
/* @var $model Autor */

$this->breadcrumbs=array(
	'Autores'=>array('index'),
	$model->Nombre,
);

$this->menu=array(
	array('label'=>'Listar Autores', 'url'=>array('index')),
	array('label'=>'Crear Autor', 'url'=>array('create')),
	array('label'=>'Actualizar Autor', 'url'=>array('update', 'id'=>$model->IdAutor)),
	array('label'=>'Borrar Autor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdAutor),'confirm'=>'¿Estás seguro de que desea borrar este autor?')),
	array('label'=>'Gestionar Autores', 'url'=>array('admin')),
);
?>

<h1>Autor: <?php echo $model->Nombre; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Nombre',
		'nacionalidad.NombreNacionalidad',
		'Web',
	),
)); ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=> $dataProvider,
	'itemView'=>'_libro',
)); ?>
