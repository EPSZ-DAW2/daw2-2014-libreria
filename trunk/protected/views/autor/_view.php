<?php
/* @var $this AutorController */
/* @var $data Autor */
?>

<div class="view">

	<!--<b><?php echo CHtml::encode($data->getAttributeLabel('IdAutor')); ?>:</b>
	<?php echo CHtml::encode($data->IdAutor); ?>
	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Nombre), array('view', 'id'=>$data->IdAutor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdNacionalidad')); ?>:</b>
	<?php echo CHtml::encode($data->IdNacionalidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Web')); ?>:</b>
	<?php echo CHtml::encode($data->Web); ?>
	<br />


</div>
