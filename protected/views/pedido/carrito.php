<?php
/* @var $this PedidoController */
/* @var $dataProvider CActiveDataProvider */

?>

<h1 style="text-align: center;">MI CARRITO</h1>

<?php 

if(Yii::app()->user->getState('carrito')){
	$productos= Yii::app()->user->getState('carrito');
	$basePrecio=0;
	foreach($productos as $linea){
		$basePrecio+=$linea->Importe;
		echo CHtml::form(Yii::app()->createUrl('/pedido/carrito'),'get'); 
		echo CHtml::hiddenField('IdLibro',$linea->IdLibro);
		?>
		<div class="view">
		
			<img style="max-width: 8%;" src="<?php echo Yii:: app() ->baseUrl.'/images/portadas/'.$linea->IdLibro.'.png' ?>"/>
			
			<p style="float: right; text-align: center;">
			<br/><br/>
			<?php echo CHtml::submitButton('Eliminar',array('name'=>'Borrar')); ?>
			</p>
			
			<span class="vista_carrito">
			<b><?php echo CHtml::encode($linea->getAttributeLabel('Importe')); ?>:</b>
			<br/><br/>
			<?php echo number_format(CHtml::encode($linea->Importe), 2, ',', '.')."€"; ?>
			</span>
			
			<span class="vista_carrito">
			<b><?php echo CHtml::encode($linea->getAttributeLabel('Precio')); ?>:</b>
			<br/><br/>
			<?php echo number_format(CHtml::encode($linea->Precio), 2, ',', '.')."€"; ?>
			</span>
			
			<span class="vista_carrito">
			<b><?php echo CHtml::encode($linea->getAttributeLabel('Cantidad')); ?>:</b>
			<br/><br/>
			<?php echo CHtml::submitButton('-',array('name'=>'Restar')); ?>
			<?php echo CHtml::encode($linea->Cantidad); ?>
			<?php echo CHtml::submitButton('+',array('name'=>'Sumar')); ?>
			</span>
			
			<p style="max-width: 25%; float: right; padding: 5px; text-align: center; font-size: 14px;  font-weight: bold;">
			<?php echo CHtml::link(CHtml::encode($linea->libro->Titulo), array('libro/view', 'id'=>$linea->IdLibro)); ?>
			</p>

		</div>
		<?php
		echo CHtml::endForm();
	}?>
	<div style="float: right; padding: 10px; margin: 10px 0;">
	<?php
		$pedido= new Pedido;
		$pedido->IVA=21;
		$pedido->GastosEnvio=3.55;
		$pedido->IdEstado=1;
		$pedido->Pagado=0;
		if(Yii::app()->user->getState('usuario')){
			$usuarios= Usuario::model()->search(Yii::app()->user->getState('usuario'));
			$Criteria = new CDbCriteria();
			$Criteria->condition = "Email like '".Yii::app()->user->getState('usuario')."'";
			$Criteria->limit = 1;
			if($model_usuario= Usuario::model()->find($Criteria)){
				$pedido->TelefonoEnvio=$model_usuario->Telefono;
				$pedido->IdCliente= $model_usuario->IdUsuario;
				if($model_cliente= Cliente::model()->findByPk($model_usuario->IdUsuario)){
					$pedido->DomicilioEnvio=$model_cliente->DomicilioFacturacion;
					$pedido->CPEnvio=$model_cliente->CPFacturacion;
					$pedido->PoblacionEnvio=$model_cliente->PoblacionFacturacion;
					$pedido->ProvinciaEnvio=$model_cliente->ProvinciaFacturacion;
				}else{
					$pedido->DomicilioEnvio=null;
				}
				
				echo CHtml::submitButton('Seguir Comprando', array('submit' => $this->createUrl('/libro')));
				?></br></br><?php
				echo CHtml::form(Yii::app()->createUrl('/pedido/datos'),'post');
				Yii::app()->user->setState('pedido',$pedido);
				echo CHtml::submitButton(' Finalizar Compra ');
				echo CHtml::endForm();
				
			}
			
		}
	?>
	</div>
	<div class="Totales_Carrito">
			<br/>
			<?php echo CHTML::encode('Total Productos (21% IVA incluido):   ');?>
			<?php echo CHTML::encode(number_format($basePrecio, 2, ',', '.')."€");?>	
			<br/>
			<?php echo CHTML::encode('Gastos de Envío (21% IVA incluido):   ');?>
			<?php echo CHTML::encode(number_format(3.55, 2, ',', '.')."€");?>
			<br/><br/>
			<?php echo CHTML::encode('Importe Total del Pedido:   ');?>
			<?php echo CHTML::encode(number_format($basePrecio+3.55, 2, ',', '.')."€");?>
			<br/>
	</div>
	<?php
}
else{
	echo "<h3>El Carrito esta vacio</h3>";
}
?>
