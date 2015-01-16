<?php
/* @var $this AutorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Autores',
);
$this->menu=array(
	array('label'=>'Crear Autor', 'url'=>array('create'), 'visible'=>!Yii::app()->user->checkAccess('cliente')),
	array('label'=>'Gestionar Autores', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->checkAccess('cliente')),
);
?>


<h1>Autores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
