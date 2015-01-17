<?php
/* @var $this PedidoController */
/* @var $model Pedido */

$this->breadcrumbs=array(
	'Pedidos'=>array('index'),
	$model->IdPedido,
);

$this->menu=array(
	array('label'=>'Listar Pedidos', 'url'=>array('index')),
	//array('label'=>'Create Pedido', 'url'=>array('create')),
	array('label'=>'Modificar Pedido', 'url'=>array('update', 'id'=>$model->IdPedido)),
	array('label'=>'Borrar Pedido', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdPedido),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Pedidos', 'url'=>array('admin')),
);
?>

<h1>Pedido nº <?php echo $model->IdPedido.'-'.$model->Serie.'-'.$model->Numero; 
$gastos=$model->GastosEnvio?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdPedido',
		'Serie',
		'Numero',
		'Fecha',
		array(
			'label'=>'Cliente',
			'value'=>  $model->usuario->Nombre.' '.$model->usuario->Apellidos,
		),
		array(
			'label'=>'Forma pago',
			'value'=>  $model->pago->Nombre,
		),
		'IVA',
		'GastosEnvio',
		'Pagado',
		array(
			'label'=>'Estado del pedido',
			'value'=>  $model->estado->Nombre,
		),
		'DomicilioEnvio',
		'CPEnvio',
		'PoblacionEnvio',
		'ProvinciaEnvio',
		'TelefonoEnvio',
	),
)); ?>
<br/>
<?php $lineasp = $model->lineas; $preciototal=0; 
	foreach($lineasp as $lineas) {
			$preciototal=$preciototal+($lineas->Cantidad*$lineas->Precio); //Calcula importe total
		}
?>
<h2 style="margin:0.5em 0;">Libros del Pedido</h2>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=> $dataProvider,
	'itemView'=>'_linea',
	'emptyText'=>'No existen libros en este pedido',
	'template'=>"{sorter}\n{items}\n<div style='float:left;'>{summary}</div>\n{pager}",
)); ?>
<br/><br/>
<h2>Importe total del pedido:  <?php echo number_format($preciototal+$gastos, 2, ',', ' ').'€'; ?></h2>
<br/>