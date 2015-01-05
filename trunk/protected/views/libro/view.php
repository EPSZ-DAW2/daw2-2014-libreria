<?php
/* @var $this LibroController */
/* @var $model Libro */


$this->breadcrumbs=array(
	'Libros'=>array('index'),
	$model->Titulo,
);

?>

<img class="portada_libro" src="<?php echo Yii:: app() ->baseUrl.'/images/portadas/'.$model->IdLibro.'.png' ?>">

<div id="precio_libro">
	Precio: <?php echo number_format($model->Precio, 2, ',', ' ')."€";?>
	<?php
		echo "<br /><br />";
		echo CHtml::form(Yii::app()->createUrl('carrito'),'get');
		echo CHtml::hiddenField('IdLibro',$model->IdLibro);
		echo CHtml::submitButton('Comprar');
		echo CHtml::endForm();
	?>
</div>
<div id="datos_libro">
	<p style="font-size:20px;"><?php echo $model->Titulo; ?></p>
	<?php /*
		 $this->widget('zii.widgets.CListView', array(
			'dataProvider'=> $dataProvider,
			'itemView'=>'_view',
			'emptyText'=>'No existen libros de este autor',
			'template'=>"{sorter}\n{items}\n<div style='float:left;'>{summary}</div>\n{pager}",
		)); 
		*/
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
