<?php
/* @var $this AutorController */
/* @var $data Autor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Nombre), array('autor/view', 'id'=>$data->IdAutor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdNacionalidad')); ?>:</b>
	<?php echo CHtml::encode($data->nacionalidad->NombreNacionalidad); ?>
	<br />

	<?php if($data->Web!==NULL) : ?>
		<b><?php echo CHtml::encode($data->getAttributeLabel('Web')); ?>:</b>
		<?php echo CHtml::link($data->Web,$data->Web); ?>
		<br />
	<?php endif;?>


</div>
