<?php
/* @var $this LibroController */
/* @var $data Libro */
?>

<div class="view">

	<h5 style="margin-bottom:0.5em;"><?php echo CHtml::link(CHtml::encode($data->Titulo), array('/libro/view', 'id'=>$data->IdLibro)); ?></h5 style="margin-bottom:0.5em;">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ISBN')); ?>:</b>
	<?php echo CHtml::encode($data->ISBN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdEditorial')); ?>:</b>
	<?php echo CHtml::encode($data->editorial->Nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Edicion')); ?>:</b>
	<?php echo CHtml::encode($data->Edicion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Paginas')); ?>:</b>
	<?php echo CHtml::encode($data->Paginas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Formato')); ?>:</b>
	<?php echo CHtml::encode($data->Formato); ?>
	<br />

</div>
