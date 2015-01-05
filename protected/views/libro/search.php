<?php
/* @var $this LibroController */
/* @var $model Libro */
/* @var $form CActiveForm */
?>

<?php 
	/*
	$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'libro-grid',
    'dataProvider'=>$model->search(),
    //'filter'=>$model,
    'columns'=>array(
        'Titulo',
        array(
            'class'=>'CButtonColumn',
        ),
    ),
));
	*/
	if(isset($_GET['search_key'])){
		echo "<h1>Búsqueda realizada: '".$_GET['search_key']."'</h1>";
	}
	echo "Libros ordenados por Precio";
	$dataProvider= $model->search();
	$dataProvider->sort->defaultOrder='Precio ASC';
	$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
?>