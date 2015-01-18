<div style="margin-bottom: 20px; width:100%; clear:left;">
<?php /*
    <div class="row" style="width:200px;float: left;">
        <?php echo CHtml::activeLabelEx($model, '[' . $index . ']IdLinea'); ?>
        <?php echo CHtml::activeTextField($model, '[' . $index . ']IdLinea', array('size' => 20, 'maxlength' => 255)); ?>
        <?php echo CHtml::error($model, '[' . $index . ']IdLinea'); ?>
    </div>
*/?>
	<div class="row">
		<?php echo CHtml::activeLabelEx($model, '[' . $index . ']Titulo'); ?>
		<?php echo CHtml::activeDropDownList($model,'[' . $index . ']IdLibro',CHtml::listData(Libro::model()->findAll(array('order' => 'Titulo')),'IdLibro','Titulo'), array('prompt' => 'Seleccione un Libro')); ?>
		<?php echo CHtml::error($model, '[' . $index . ']IdLibro'); ?>
	</div>
	
    <div class="row">
        <?php echo CHtml::activeLabelEx($model, '[' . $index . ']Cantidad'); ?>
        <?php echo CHtml::activeTextField($model, '[' . $index . ']Cantidad'); ?>
        <?php echo CHtml::error($model, '[' . $index . ']Cantidad'); ?>
    </div>

	<div class="row">
        <?php echo CHtml::activeLabelEx($model, '[' . $index . ']Precio'); ?>
        <?php echo CHtml::activeTextField($model, '[' . $index . ']Precio'); ?>
        <?php echo CHtml::error($model, '[' . $index . ']Precio'); ?>
    </div>
	
	<div class="row">
        <?php echo CHtml::activeLabelEx($model, '[' . $index . ']Importe'); ?>
        <?php echo CHtml::activeTextField($model, '[' . $index . ']Importe',array('readonly' => true)); ?>
        <?php echo CHtml::error($model, '[' . $index . ']Importe'); ?>
    </div>
	
    <div class="row">
        <br />
        <?php echo CHtml::link('Borrar libro', '#', array('onclick' => 'deleteChild(this, ' . $index . '); return false;'));
        ?>
    </div>
<hr>
</div>
 
<?php
Yii::app()->clientScript->registerScript('deleteChild', "
function deleteChild(elm, index)
{
    element=$(elm).parent().parent();
    /* animate div */
    $(element).animate(
    {
        opacity: 0.25,
        left: '+=50',
        height: 'toggle'
    }, 500,
    function() {
        /* remove div */
        $(element).remove();
    });
}", CClientScript::POS_END);