<?php
/* @var $this EditorialController */
/* @var $data Editorial */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdEditorial')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdEditorial), array('view', 'id'=>$data->IdEditorial)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::encode($data->Nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Web')); ?>:</b>
	<?php echo CHtml::encode($data->Web); ?>
	<br />


</div>