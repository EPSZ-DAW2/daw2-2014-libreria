<?php
/* @var $this LibroController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Libros',
);
?>

<h1>Libros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
