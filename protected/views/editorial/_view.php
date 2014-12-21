<?php
/* @var $this EditorialController */
/* @var $data Editorial */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Nombre), array('view', 'id'=>$data->IdEditorial)); ?>
	<br />

	<?php if($data->Web!==NULL) : ?>
		<b><?php echo CHtml::encode($data->getAttributeLabel('Web')); ?>:</b>
		<?php echo CHtml::link($data->Web, $data->Web); ?>
		<br />
	<?php endif;?>


</div>
