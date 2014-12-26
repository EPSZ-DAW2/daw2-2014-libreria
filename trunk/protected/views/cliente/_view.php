<?php
/* @var $this ClienteController */
/* @var $data Cliente */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdCliente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdCliente), array('view', 'id'=>$data->IdCliente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DomicilioFacturacion')); ?>:</b>
	<?php echo CHtml::encode($data->DomicilioFacturacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CPFacturacion')); ?>:</b>
	<?php echo CHtml::encode($data->CPFacturacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PoblacionFacturacion')); ?>:</b>
	<?php echo CHtml::encode($data->PoblacionFacturacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProvinciaFacturacion')); ?>:</b>
	<?php echo CHtml::encode($data->ProvinciaFacturacion); ?>
	<br />


</div>