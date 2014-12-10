<?php
/* @var $this AutorController */
/* @var $model Autor */

$this->breadcrumbs=array(
	'Autores'=>array('index'),
	$model->Nombre=>array('view','id'=>$model->IdAutor),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Autores', 'url'=>array('index')),
	array('label'=>'Crear Autor', 'url'=>array('create')),
	array('label'=>'Ver Autor', 'url'=>array('view', 'id'=>$model->IdAutor)),
	array('label'=>'Gestionar Autor', 'url'=>array('admin')),
);
?>

<h1>Actualizar Autor: <?php echo $model->Nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
