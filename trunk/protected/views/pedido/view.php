<?php
/* @var $this PedidoController */
/* @var $model Pedido */

$this->breadcrumbs=array(
	'Pedidos'=>array('index'),
	$model->IdPedido,
);

$this->menu=array(
	array('label'=>'List Pedido', 'url'=>array('index')),
	array('label'=>'Create Pedido', 'url'=>array('create')),
	array('label'=>'Update Pedido', 'url'=>array('update', 'id'=>$model->IdPedido)),
	array('label'=>'Delete Pedido', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdPedido),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pedido', 'url'=>array('admin')),
);
?>

<h1>View Pedido #<?php echo $model->IdPedido; $gastos=$model->GastosEnvio?></h1>

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
<h2>Libros<?php $lineasp = $model->lineas; $preciototal=0; ?></h2>
<?php
	foreach($lineasp as $lineas) {
			echo '<hr />';
			echo 'ISBN:'.$lineas->libro->ISBN.'<br/>';
			echo 'Titulo:'.$lineas->libro->Titulo.'<br/>';
			echo 'Cantidad:'.$lineas->Cantidad.'<br/>';
			echo 'Precio:'.$lineas->Precio.'<br/>'; 
			$preciototal=$preciototal+($lineas->Cantidad*$lineas->Precio); //Calcula importe total
			echo 'Importe:'.$lineas->Importe.'<br/>';
			echo '<br/><hr />';
        
		}
?>
<br/>
<h2>Importe total del pedido:  <?php echo ($preciototal+$gastos).'€'; ?></h2>
<br/>