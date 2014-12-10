<?php
/* @var $this ClienteController */
/* @var $model Cliente */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdCliente'); ?>
		<?php echo $form->textField($model,'IdCliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DomicilioFacturacion'); ?>
		<?php echo $form->textField($model,'DomicilioFacturacion',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CPFacturacion'); ?>
		<?php echo $form->textField($model,'CPFacturacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PoblacionFacturacion'); ?>
		<?php echo $form->textField($model,'PoblacionFacturacion',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ProvinciaFacturacion'); ?>
		<?php echo $form->textField($model,'ProvinciaFacturacion',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->