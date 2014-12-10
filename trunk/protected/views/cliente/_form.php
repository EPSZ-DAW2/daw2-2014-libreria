<?php
/* @var $this ClienteController */
/* @var $model Cliente */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cliente-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'IdCliente'); ?>
		<?php echo $form->textField($model,'IdCliente'); ?>
		<?php echo $form->error($model,'IdCliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DomicilioFacturacion'); ?>
		<?php echo $form->textField($model,'DomicilioFacturacion',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'DomicilioFacturacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CPFacturacion'); ?>
		<?php echo $form->textField($model,'CPFacturacion'); ?>
		<?php echo $form->error($model,'CPFacturacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PoblacionFacturacion'); ?>
		<?php echo $form->textField($model,'PoblacionFacturacion',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'PoblacionFacturacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ProvinciaFacturacion'); ?>
		<?php echo $form->textField($model,'ProvinciaFacturacion',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'ProvinciaFacturacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->