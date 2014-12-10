<?php
/* @var $this AutorController */
/* @var $model Autor */

$this->breadcrumbs=array(
	'Autores'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Autores', 'url'=>array('index')),
	array('label'=>'Gestionar Autores', 'url'=>array('admin')),
);
?>

<h1>Crear Autor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
