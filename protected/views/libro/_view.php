<?php
/* @var $this LibroController */
/* @var $data Libro */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdLibro')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdLibro), array('view', 'id'=>$data->IdLibro)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ISBN')); ?>:</b>
	<?php echo CHtml::encode($data->ISBN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdEditorial')); ?>:</b>
	<?php echo CHtml::encode($data->IdEditorial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Titulo')); ?>:</b>
	<?php echo CHtml::encode($data->Titulo); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('IdIdioma')); ?>:</b>
	<?php echo CHtml::encode($data->IdIdioma); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Resumen')); ?>:</b>
	<?php echo CHtml::encode($data->Resumen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Precio')); ?>:</b>
	<?php echo CHtml::encode($data->Precio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Stock')); ?>:</b>
	<?php echo CHtml::encode($data->Stock); ?>
	<br />

	*/ ?>

</div>