<?php
/* @var $this LibroController */
/* @var $data Libro */
?>

<div class="view">

	<div id="bloque_comprar">
		<?php
		echo CHtml::form(Yii::app()->createUrl('/pedido/carrito'),'get');
			echo CHtml::hiddenField('IdLibro',$data->IdLibro);
			echo CHtml::submitButton('Comprar');
		echo CHtml::endForm();
		?>
	</div>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('Titulo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Titulo), array('view', 'id'=>$data->IdLibro)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('ISBN')); ?>:</b>
	<?php echo CHtml::encode($data->ISBN); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('Formato')); ?>:</b>
	<?php echo CHtml::encode($data->Formato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Edicion')); ?>:</b>
	<?php echo CHtml::encode($data->Edicion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Paginas')); ?>:</b>
	<?php echo CHtml::encode($data->Paginas); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('Precio')); ?>:</b>
	<?php echo CHtml::encode(number_format($data->Precio, 2, ',', ' ').'€');?>
	<br />

	<?php /*
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('IdLibro')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdLibro), array('view', 'id'=>$data->IdLibro)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('IdIdioma')); ?>:</b>
	<?php echo CHtml::encode($data->IdIdioma); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Resumen')); ?>:</b>
	<?php echo CHtml::encode($data->Resumen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Editorial')); ?>:</b>
	<?php echo CHtml::encode($data->IdEditorial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Stock')); ?>:</b>
	<?php echo CHtml::encode($data->Stock); ?>
	<br />

	*/ ?>

</div>