<?php
/* @var $this AutorController */
/* @var $model Autor */

$this->breadcrumbs=array(
	'Autors'=>array('index'),
	$model->IdAutor=>array('view','id'=>$model->IdAutor),
	'Update',
);

$this->menu=array(
	array('label'=>'List Autor', 'url'=>array('index')),
	array('label'=>'Create Autor', 'url'=>array('create')),
	array('label'=>'View Autor', 'url'=>array('view', 'id'=>$model->IdAutor)),
	array('label'=>'Manage Autor', 'url'=>array('admin')),
);
?>

<h1>Update Autor <?php echo $model->IdAutor; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>