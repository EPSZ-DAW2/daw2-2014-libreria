<?php
/* @var $this EditorialController */
/* @var $model Editorial */

$this->breadcrumbs=array(
	'Editoriales'=>array('index'),
	$model->Nombre,
);

$this->menu=array(
	array('label'=>'Listar Editoriales', 'url'=>array('index')),
	array('label'=>'Crear Editorial', 'url'=>array('create')),
	array('label'=>'Actualizar Editorial', 'url'=>array('update', 'id'=>$model->IdEditorial)),
	array('label'=>'Borrar Editorial', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdEditorial),'confirm'=>'¿Estás seguro de que desea borrar esta editorial?')),
	array('label'=>'Gestionar Editoriales', 'url'=>array('admin')),
);
?>

<h1>Editorial: <?php echo $model->Nombre; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Nombre',
		array(
			'label'=>$model->getAttributeLabel('Web'),
			'type'=>'html',
			'value'=>$model->Web===NULL ? 'Sin página web' : CHtml::link($model->Web,$model->Web),
		),
	),
)); ?>
<h2 style="margin:0.5em 0;">Libros de la Editorial</h2>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=> $dataProvider,
	'itemView'=>'_libro',
	'emptyText'=>'No existen libros de este editorial',
	'template'=>"{sorter}\n{items}\n<div style='float:left;'>{summary}</div>\n{pager}",
)); ?>
