<?php
/* @var $this AutorController */
/* @var $model Autor */

$this->breadcrumbs=array(
	'Autores'=>array('index'),
	$model->Nombre,
);

$this->menu=array(
	array('label'=>'Listar Autores', 'url'=>array('index')),
	array('label'=>'Crear Autor', 'url'=>array('create')),
	array('label'=>'Actualizar Autor', 'url'=>array('update', 'id'=>$model->IdAutor)),
	array('label'=>'Borrar Autor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdAutor),'confirm'=>'¿Estás seguro de que desea borrar este autor?')),
	array('label'=>'Gestionar Autores', 'url'=>array('admin')),
);
?>

<h1>Autor: <?php echo $model->Nombre; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Nombre',
		'nacionalidad.NombreNacionalidad',
		array(
			'label'=>$model->getAttributeLabel('Web'),
			'type'=>'html',
			'value'=>$model->Web===NULL ? 'Sin página web' : CHtml::link($model->Web,$model->Web),
		),
	),
)); ?>
<h2 style="margin:0.5em 0;">Libros del Autor</h2>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=> $dataProvider,
	'itemView'=>'_libro',
	'emptyText'=>'No existen libros de este autor',
	'template'=>"{sorter}\n{items}\n<div style='float:left;'>{summary}</div>\n{pager}",
)); ?>
