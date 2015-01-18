<?php
/* @var $this ClienteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clientes',
);
if(!Yii::app()->user->isGuest){
$this->menu=array(
	array('label'=>'Crear Cliente', 'url'=>array('create'), 'visible'=>!Yii::app()->user->checkAccess('cliente')),
	array('label'=>'Gestionar Cliente', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->checkAccess('cliente')),
);
}
?>

<h1>Clientes</h1>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
