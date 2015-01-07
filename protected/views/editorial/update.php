<?php
/* @var $this EditorialController */
/* @var $model Editorial */

$this->breadcrumbs=array(
	'Editoriales'=>array('index'),
	$model->Nombre=>array('view','id'=>$model->IdEditorial),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Editoriales', 'url'=>array('index')),
	array('label'=>'Crear Editorial', 'url'=>array('create')),
	array('label'=>'Ver Editorial', 'url'=>array('view', 'id'=>$model->Nombre)),
	array('label'=>'Gestionar Editoriales', 'url'=>array('admin')),
);
?>

<h1>Actualizar Editorial: <?php echo $model->Nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
