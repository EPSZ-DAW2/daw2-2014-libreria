<?php
/* @var $this LibroController */
/* @var $data Libro */
?>

<div class="view">

	<h5 style="margin-bottom:0.5em;"><?php echo CHtml::link(CHtml::encode($data->libro->Titulo), array('/libro/view', 'id'=>$data->IdLibro)); ?></h5 style="margin-bottom:0.5em;">
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('ISBN')); ?>:</b>
	<?php echo CHtml::encode($data->libro->ISBN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Edicion')); ?>:</b>
	<?php echo CHtml::encode($data->libro->Edicion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->Cantidad); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('Precio')); ?>:</b>
	<?php echo CHtml::encode(number_format($data->Precio, 2, ',', ' ').'€'); ?>
	<br />

</div>
