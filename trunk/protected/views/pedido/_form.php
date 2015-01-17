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

	<p class="note"><span class="required">*</span>Campos obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Serie'); ?>
		<?php echo $form->textField($model,'Serie'); ?>
		<?php echo $form->error($model,'Serie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Numero'); ?>
		<?php echo $form->textField($model,'Numero'); ?>
		<?php echo $form->error($model,'Numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Fecha'); ?>
		<?php echo $form->textField($model,'Fecha'); ?>
		<?php echo $form->error($model,'Fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IdCliente'); ?>
		<?php echo $form->textField($model,'IdCliente'); ?>
		<?php echo $form->error($model,'IdCliente'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Forma Pago'); ?>
		<?php echo $form->dropDownList($model,'IdPago',CHtml::listData(FormaPago::model()->findAll(array('order' => 'Nombre')),'IdPago','Nombre'), array('prompt' => 'Seleccione una Forma de Pago')); ?>
		<?php //echo $form->textField($model,'IdPago'); ?>
		<?php echo $form->error($model,'IdPago'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IVA'); ?>
		<?php echo $form->textField($model,'IVA'); ?>
		<?php echo $form->error($model,'IVA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'GastosEnvio'); ?>
		<?php echo $form->textField($model,'GastosEnvio'); ?>
		<?php echo $form->error($model,'GastosEnvio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Pagado'); ?>
		<?php echo $form->textField($model,'Pagado'); ?>
		<?php echo $form->error($model,'Pagado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Estado'); ?>
		<?php //echo $form->textField($model,'IdEstado'); ?>
		<?php echo $form->dropDownList($model,'IdEstado',CHtml::listData(Estado::model()->findAll(array('order' => 'Nombre')),'IdEstado','Nombre'), array('prompt' => 'Seleccione un Estado')); ?>
		<?php echo $form->error($model,'IdEstado'); ?>
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
	<hr><h2>Libros del Pedido</h2><hr>
	<?php $lineas = $model->lineas;  
	foreach($lineas as $pedidoL) {?>
	<div class="row">
		<?php echo $form->labelEx($pedidoL,'Titulo'); ?>
		<?php echo $form->dropDownList($pedidoL,'IdLibro',CHtml::listData(Libro::model()->findAll(array('order' => 'Titulo')),'IdLibro','Titulo'), array('prompt' => 'Seleccione un Libro')); ?>
		<?php //echo $form->textField($pedidoL,'IdLibro'); ?>
		<?php echo $form->error($pedidoL,'IdLibro'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($pedidoL,'Cantidad'); ?>
		<?php echo $form->textField($pedidoL,'Cantidad'); ?>
		<?php echo $form->error($pedidoL,'Cantidad'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($pedidoL,'Precio'); ?>
		<?php echo $form->textField($pedidoL,'Precio'); ?>
		<?php echo $form->error($pedidoL,'Precio'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($pedidoL,'Importe'); ?>
		<?php echo $form->textField($pedidoL,'Importe'); ?>
		<?php echo $form->error($pedidoL,'Importe'); ?>
	</div>
	<hr><hr>

<?php
	
	}
?>
	<?php //$pedidoL = Linea::model()->findByPk($model->IdPedido); 
	                    /*foreach ($_SESSION['carrito'] as $key => $producto) {
                        $pedidoLinea = new Linea;

                        $pedidoLinea->IdLibro = $producto['IdLibro'];
                        $pedidoLinea->Precio = $producto['Precio'];
                        $pedidoLinea->Cantidad = $producto['Cantidad'];
                        $pedidoLinea->Importe = ($producto['Precio'] * $producto['Cantidad']);
                        $pedidoLinea->IdPedido = $pedido->IdPedido;

                        $pedidoLinea->save();
                    }*/
	?>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->