<?php
/* @var $this EditorialController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Editoriales',
);
if(!Yii::app()->user->isGuest){
$this->menu=array(
	array('label'=>'Crear Editorial', 'url'=>array('create'), 'visible'=>!Yii::app()->user->checkAccess('cliente')),
	array('label'=>'Gestionar Editoriales', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->checkAccess('cliente')),
);
}
?>

<h1>Editoriales</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
