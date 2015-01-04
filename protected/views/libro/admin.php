<?php
/* @var $this LibroController */
/* @var $model Libro */

$this->breadcrumbs=array(
	'Libros'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Libro', 'url'=>array('index')),
	array('label'=>'Create Libro', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#libro-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Libros</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'libro-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'IdLibro',
		'ISBN',
		'IdEditorial',
		'Titulo',
		'Edicion',
		'Paginas',
		/*
		'Formato',
		'IdIdioma',
		'Resumen',
		'Precio',
		'Stock',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
