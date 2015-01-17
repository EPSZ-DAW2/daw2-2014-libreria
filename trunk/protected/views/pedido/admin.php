<?php
/* @var $this PedidoController */
/* @var $model Pedido */

$this->breadcrumbs=array(
	'Pedidos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Pedidos', 'url'=>array('index')),
	//array('label'=>'Crear Pedido', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pedido-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Pedidos</h1>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php
	if(Yii::app()->user->checkAccess( 'cliente'))
	{
		$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'pedido-grid',
		'dataProvider'=>$model->search2(array(
					'condition'=>'IdCliente=:id',
					'params'=>array( ':id'=>Yii::app()->user->id),)),
		'filter'=>$model,
		'columns'=>array(
			'IdPedido',
			'Serie',
			'Numero',
			'Fecha',
			'estado.Nombre',
			array(
				'class'=>'CButtonColumn',
			),
		),
	)); 
	
	} else {

		$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'pedido-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			'IdPedido',
			'Serie',
			'Numero',
			'Fecha',
			'IdCliente',
			'usuario.Nombre',
			'Pagado',
			'estado.Nombre',
			array(
				'class'=>'CButtonColumn',
			),
		),
	)); 
}
?>
