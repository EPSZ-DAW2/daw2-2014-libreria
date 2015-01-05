<?php
/* @var $this LibroController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Libros',
);
?>

<h1>Libros</h1>

<div id="ordenar" style="text-align: right;">
<?php 
echo CHtml::form(Yii::app()->createUrl('libro'),'get');
echo CHtml::submitButton('Orden PVP');
echo CHtml::submitButton('Orden Titulo');
echo CHtml::endForm();
echo "<br />";
if(isset($_GET['yt0'])&&($_GET['yt0']=='Orden PVP')){
	$dataProvider->sort->defaultOrder='Precio ASC';
	echo "Libros ordenados por Precio";
}
else{
	$dataProvider->sort->defaultOrder='Titulo ASC';
	echo "Libros ordenados por Título";
}
?>
</div>
<?php
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
