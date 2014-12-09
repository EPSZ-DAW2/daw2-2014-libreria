<?php
/* @var $this LibroController */
/* @var $model Libro */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdLibro'); ?>
		<?php echo $form->textField($model,'IdLibro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ISBN'); ?>
		<?php echo $form->textField($model,'ISBN',array('size'=>13,'maxlength'=>13)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdEditorial'); ?>
		<?php echo $form->textField($model,'IdEditorial'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Titulo'); ?>
		<?php echo $form->textField($model,'Titulo',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Edicion'); ?>
		<?php echo $form->textField($model,'Edicion',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Paginas'); ?>
		<?php echo $form->textField($model,'Paginas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Formato'); ?>
		<?php echo $form->textField($model,'Formato',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdIdioma'); ?>
		<?php echo $form->textField($model,'IdIdioma'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Resumen'); ?>
		<?php echo $form->textArea($model,'Resumen',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Precio'); ?>
		<?php echo $form->textField($model,'Precio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Stock'); ?>
		<?php echo $form->textField($model,'Stock'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->