<?php
/* @var $this EditorialController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Editoriales',
);

$this->menu=array(
	array('label'=>'Crear Editorial', 'url'=>array('create')),
	array('label'=>'Gestionar Editoriales', 'url'=>array('admin')),
);
?>

<h1>Editoriales</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
