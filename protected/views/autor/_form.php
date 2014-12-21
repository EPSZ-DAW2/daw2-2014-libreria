<?php
/* @var $this AutorController */
/* @var $model Autor */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'autor-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre',array('size'=>60,'maxlength'=>100,'placeholder'=>'Miguel de Cervantes Saavedra')); ?>
		<?php echo $form->error($model,'Nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IdNacionalidad'); ?>
		<?php echo $form->dropDownList($model,'IdNacionalidad',CHtml::listData(Nacionalidad::model()->findAll(array('order' => 'NombreNacionalidad')),'IdNacionalidad','NombreNacionalidad'), array('prompt' => 'Seleccione una Nacionalidad')); ?>
		<?php echo $form->error($model,'IdNacionalidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Web'); ?>
		<?php echo $form->textField($model,'Web',array('size'=>60,'maxlength'=>100,'placeholder'=>'http://www.nombredelaweb.com')); ?>
		<?php echo $form->error($model,'Web'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
