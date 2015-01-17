<?php
/* @var $this PedidoController */
/* @var $model Pedido */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pedido-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Todos los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>
		<?php
			$objDateTime = new DateTime('NOW');
			$model->Fecha= $objDateTime->format('Y-m-d H:i:s');
			$Criteria = new CDbCriteria();
			$Criteria->select = "Numero";
			$Criteria->condition = "Serie = '2015'";
			$Criteria->order = "Numero desc";
			$Criteria->limit = 1;
			if($model_pedido= Pedido::model()->find($Criteria)){
				echo $form->hiddenField($model,'Numero',array('value'=>$model_pedido->Numero+1));
			}else{
				echo $form->hiddenField($model,'Numero',array('value'=>'12345678'));
			}
		?>
		<?php echo $form->hiddenField($model,'Serie',array('value'=>'2015')); ?>
		<?php echo $form->hiddenField($model,'Fecha',array('value'=>$model->Fecha)); ?>
		<?php echo $form->hiddenField($model,'IdCliente',array('value'=>$model->IdCliente));?>
		<?php echo $form->hiddenField($model,'IVA',array('value'=>$model->IVA));?>
		<?php echo $form->hiddenField($model,'GastosEnvio',array('value'=>$model->GastosEnvio));?>
		<?php echo $form->hiddenField($model,'Pagado',array('value'=>$model->Pagado));?>
		<?php echo $form->hiddenField($model,'IdEstado',array('value'=>$model->IdEstado));?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'IdPago'); ?>
		<?php echo $form->dropDownList($model,'IdPago',CHtml::listData(FormaPago::model()->findAll(array('order' => 'Nombre')),'IdPago','Nombre'), array('prompt' => 'Seleccione una Forma de Pago')); ?>
		<?php //echo $form->textField($model,'IdPago'); ?>
		<?php echo $form->error($model,'IdPago'); ?>
	</div>
	
	<div class="row">
		<br/>
		<?php echo "<label>Si no ha introducido ninguna dirección de facturación se asignará, como tal, la dirección de envio que introduzca a continuación</label>"; ?>
		<br/>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DomicilioEnvio'); ?>
		<?php echo $form->textField($model,'DomicilioEnvio',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'DomicilioEnvio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CPEnvio'); ?>
		<?php echo $form->textField($model,'CPEnvio'); ?>
		<?php echo $form->error($model,'CPEnvio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PoblacionEnvio'); ?>
		<?php echo $form->textField($model,'PoblacionEnvio',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'PoblacionEnvio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ProvinciaEnvio'); ?>
		<?php echo $form->textField($model,'ProvinciaEnvio',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'ProvinciaEnvio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TelefonoEnvio'); ?>
		<?php echo $form->textField($model,'TelefonoEnvio'); ?>
		<?php echo $form->error($model,'TelefonoEnvio'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->