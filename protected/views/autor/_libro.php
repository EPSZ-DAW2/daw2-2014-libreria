<?php
/* @var $this LibroController */
/* @var $data Libro */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Titulo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Titulo), array('view', 'id'=>$data->IdLibro)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('ISBN')); ?>:</b>
	<?php echo CHtml::encode($data->ISBN); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('Formato')); ?>:</b>
	<?php echo CHtml::encode($data->Formato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Edicion')); ?>:</b>
	<?php echo CHtml::encode($data->Edicion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Paginas')); ?>:</b>
	<?php echo CHtml::encode($data->Paginas); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('Precio')); ?>:</b>
	<?php echo CHtml::encode(number_format($data->Precio, 2, ',', ' ').'€'); ?>
	<br />

</div>
