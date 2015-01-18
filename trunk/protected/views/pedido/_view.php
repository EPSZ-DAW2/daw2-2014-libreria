<?php
/* @var $this PedidoController */
/* @var $data Pedido */
?>

<div class="view">

	<b><?php echo CHtml::encode('Ver Pedido'); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdPedido.'-'.$data->Serie.'-'.$data->Numero), 
	array('view', 'id'=>$data->IdPedido)); ?>
	<br /><br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Serie')); ?>:</b>
	<?php echo CHtml::encode($data->Serie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Numero')); ?>:</b>
	<?php echo CHtml::encode($data->Numero); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('IdCliente')); ?>:</b>
	<?php echo CHtml::encode($data->IdCliente); ?>
	<br />
	*/?>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('Cliente')); ?>:</b>
	<?php echo CHtml::encode($data->usuario->Nombre).'&nbsp';
	      echo CHtml::encode($data->usuario->Apellidos);?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('Forma de pago')); ?>:</b>
	<?php echo CHtml::encode($data->pago->Nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Estado del Pedido')); ?>:</b>
	<?php echo CHtml::encode($data->estado->Nombre); ?>
	<br />
	
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('IVA')); ?>:</b>
	<?php echo CHtml::encode($data->IVA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GastosEnvio')); ?>:</b>
	<?php echo CHtml::encode($data->GastosEnvio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pagado')); ?>:</b>
	<?php echo CHtml::encode($data->Pagado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DomicilioEnvio')); ?>:</b>
	<?php echo CHtml::encode($data->DomicilioEnvio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CPEnvio')); ?>:</b>
	<?php echo CHtml::encode($data->CPEnvio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PoblacionEnvio')); ?>:</b>
	<?php echo CHtml::encode($data->PoblacionEnvio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProvinciaEnvio')); ?>:</b>
	<?php echo CHtml::encode($data->ProvinciaEnvio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TelefonoEnvio')); ?>:</b>
	<?php echo CHtml::encode($data->TelefonoEnvio); ?>
	<br />

	*/ ?>

</div>