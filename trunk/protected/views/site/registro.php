<?php
/* @var $this SiteController */
/* @var $model RegistroForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Registro';
$this->breadcrumbs=array('registro');
?>

<h1>Registro</h1>

<div class="form">
<?php 
echo Yii::app()->user->getFlash("registro");    

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'registro-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Los campos marcados con <span class="required">*</span> son obligatorios.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre'); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'apellidos'); ?>
		<?php echo $form->textField($model,'apellidos'); ?>
		<?php echo $form->error($model,'apellidos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'repetir_password'); ?>
		<?php echo $form->passwordField($model,'repetir_password'); ?>
		<?php echo $form->error($model,'repetir_password'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'nif'); ?>
		<?php echo $form->textField($model,'nif'); ?>
		<?php echo $form->error($model,'nif'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono'); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Enviar'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
