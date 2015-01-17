<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->usuario->Nombre.' '.$model->usuario->Apellidos,
);

$this->menu=array(
	array('label'=>'Listar Clientes', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create'), 'visible'=>!Yii::app()->user->checkAccess('cliente'), 'visible'=>!Yii::app()->user->checkAccess('cliente')),
	array('label'=>'Actualizar Cliente', 'url'=>array('update', 'id'=>$model->IdCliente), 'visible'=>!Yii::app()->user->checkAccess('cliente')),
	array('label'=>'Borrar Cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdCliente),'confirm'=>'¿Estás seguro de que desea borrar este autor?'), 'visible'=>!Yii::app()->user->checkAccess('cliente')),
	array('label'=>'Gestionar Clientes', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->checkAccess('cliente')),
);
?>


<h1>Cliente: <?php echo $model->usuario->Nombre.' '.$model->usuario->Apellidos; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'usuario.Nombre',
		'usuario.Apellidos',
		'usuario.NIF',
		'usuario.Telefono',
		'DomicilioFacturacion',
		'CPFacturacion',
		'PoblacionFacturacion',
		'ProvinciaFacturacion',
		array(
				'label'=>$model->usuario->getAttributeLabel('Bloqueado'),
				'value'=>$model->usuario->Bloqueado==0 ? 'NO' : 'SI',
			),
		array(
				'label'=>$model->usuario->getAttributeLabel('Revisado'),
				'value'=>$model->usuario->Revisado==0 ? 'NO' : 'SI',
			),
	),
)); ?>

<br/>
<h1>Editar datos:</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cliente-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'DomicilioFacturacion'); ?>
		<?php echo $form->textField($model,'DomicilioFacturacion',array('size'=>60,'maxlength'=>100,'placeholder'=>'C/Roble, 5 1D')); ?>
		<?php echo $form->error($model,'DomicilioFacturacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CPFacturacion'); ?>
		<?php echo $form->textField($model,'CPFacturacion',array('maxlength'=>5,'placeholder'=>'49003')); ?>
		<?php echo $form->error($model,'CPFacturacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PoblacionFacturacion'); ?>
		<?php echo $form->textField($model,'PoblacionFacturacion',array('size'=>60,'maxlength'=>60,'placeholder'=>'Zamora')); ?>
		<?php echo $form->error($model,'PoblacionFacturacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ProvinciaFacturacion'); ?>
		<?php echo $form->textField($model,'ProvinciaFacturacion',array('size'=>40,'maxlength'=>40,'placeholder'=>'Zamora')); ?>
		<?php echo $form->error($model,'ProvinciaFacturacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>

