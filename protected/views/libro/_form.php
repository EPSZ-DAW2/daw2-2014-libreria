<?php
/* @var $this LibroController */
/* @var $model Libro */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'libro-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Todos los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ISBN'); ?>
		<?php echo $form->textField($model,'ISBN',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'ISBN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IdEditorial'); ?>
		<?php echo $form->dropDownList($model,'IdEditorial',CHtml::listData(Editorial::model()->findAll(array('order' => 'Nombre')),'IdEditorial','Nombre'), array('prompt' => 'Seleccione una Editorial')); ?>
		<?php echo $form->error($model,'IdEditorial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Titulo'); ?>
		<?php echo $form->textField($model,'Titulo',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Edicion'); ?>
		<?php echo $form->textField($model,'Edicion',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'Edicion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Paginas'); ?>
		<?php echo $form->textField($model,'Paginas'); ?>
		<?php echo $form->error($model,'Paginas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Formato'); ?>
		<?php echo $form->dropDownList($model,'Formato',array('PAPEL'=>'PAPEL','EBOOK'=>'EBOOK')); ?>
		<?php echo $form->error($model,'Formato'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IdIdioma'); ?>
		<?php echo $form->dropDownList($model,'IdIdioma',CHtml::listData(Idioma::model()->findAll(array('order' => 'Nombre')),'IdIdioma','Nombre'), array('prompt' => 'Seleccione un Idioma')); ?>
		<?php echo $form->error($model,'IdIdioma'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Resumen'); ?>
		<?php echo $form->textArea($model,'Resumen',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Resumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Precio'); ?>
		<?php echo $form->textField($model,'Precio'); ?>
		<?php echo $form->error($model,'Precio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Stock'); ?>
		<?php echo $form->textField($model,'Stock'); ?>
		<?php echo $form->error($model,'Stock'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->