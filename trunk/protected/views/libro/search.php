<?php
/* @var $this LibroController */
/* @var $model Libro */
/* @var $form CActiveForm */
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'libro-grid',
    'dataProvider'=>$model->search(),
    //'filter'=>$model,
    'columns'=>array(
        'Titulo',
        array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>