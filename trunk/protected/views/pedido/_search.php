<?php
/* @var $this PedidoController */
/* @var $model Pedido */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdPedido'); ?>
		<?php echo $form->textField($model,'IdPedido'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Serie'); ?>
		<?php echo $form->textField($model,'Serie'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Numero'); ?>
		<?php echo $form->textField($model,'Numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha'); ?>
		<?php echo $form->textField($model,'Fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdCliente'); ?>
		<?php echo $form->textField($model,'IdCliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdPago'); ?>
		<?php echo $form->textField($model,'IdPago'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IVA'); ?>
		<?php echo $form->textField($model,'IVA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'GastosEnvio'); ?>
		<?php echo $form->textField($model,'GastosEnvio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pagado'); ?>
		<?php echo $form->textField($model,'Pagado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdEstado'); ?>
		<?php echo $form->textField($model,'IdEstado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DomicilioEnvio'); ?>
		<?php echo $form->textField($model,'DomicilioEnvio',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CPEnvio'); ?>
		<?php echo $form->textField($model,'CPEnvio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PoblacionEnvio'); ?>
		<?php echo $form->textField($model,'PoblacionEnvio',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ProvinciaEnvio'); ?>
		<?php echo $form->textField($model,'ProvinciaEnvio',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TelefonoEnvio'); ?>
		<?php echo $form->textField($model,'TelefonoEnvio'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->