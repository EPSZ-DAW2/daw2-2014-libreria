<?php
/* @var $this LibroController */
/* @var $model Libro */


$this->breadcrumbs=array(
	'Libros'=>array('index'),
	$model->Titulo,
);

?>
<img class="portada_libro" src="<?php echo Yii:: app() ->baseUrl.'/images/portadas/'.$model->IdLibro.'.png' ?>" />

<div id="precio_libro">
	Precio: <?php echo number_format($model->Precio, 2, ',', ' ')."€";?>
	<p style="font-size: 12px;">Gastos de Envio para España: <?php echo number_format(3.55, 2, ',', ' ')."€";?></p>
	<?php
		//echo CHtml::form(Yii::app()->createUrl('/pedido/carrito'),'get');
		//echo CHtml::hiddenField('IdLibro',$model->IdLibro);
		//echo CHtml::submitButton('Comprar');
		//echo CHtml::endForm();
		echo CHtml::link(CHtml::encode('Añadir al Carrito'), array('carrito/agregarProductoCarrito', 'id'=>$model->IdLibro));
	?>
</div>
<div id="datos_libro">
	<p style="font-size:20px;"><?php echo $model->Titulo; ?></p>
	<?php
	$i=0;
	foreach($model->autores as $autor){
		if($i==0){
			echo "Autores: ";
		}else{
			echo " - ";
		}
		echo CHtml::link(CHtml::encode($autor->Nombre), array('autor/view', 'id'=>$autor->IdAutor));
		$i++;
	}	
	?>
	<p>
	<?php
	echo CHtml::link(CHtml::encode((($model->editorial !== null) ? $model->editorial->Nombre : '')), $model->editorial->Web);
	echo "<br /> ISBN: ".$model->ISBN;
	echo "<br />".$model->Formato.", ".$model->Edicion;
	echo "<br /> Páginas: ".$model->Paginas;
	echo "<br />".(($model->idioma !== null) ? $model->idioma->Nombre : '');
	?>
	</p>
</div>
<div id="resumen_libro">
	<?php
	echo "<p style='font-size: 18px; font-weight:bold;'>RESUMEN DEL LIBRO:</p>";
	echo "<p>".$model->Resumen."</p>";
	?>
</div>
