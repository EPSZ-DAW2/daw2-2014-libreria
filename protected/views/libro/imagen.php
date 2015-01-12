<?php
/* @var $this LibroController */
/* @var $model Imagen */
/* @var $model_libro Libro */

$this->pageTitle=Yii::app()->name . ' - Subir Imagen';
$this->breadcrumbs=array(
	'Libros'=>array('index'),
	$model_libro->IdLibro=>array('imagen','id'=>$model_libro->IdLibro),
	'Actualizar Imagen Portada',
);
?>
<img class="portada_libro" src="<?php echo Yii:: app() ->baseUrl.'/images/portadas/'.$model_libro->IdLibro.'.png' ?>">
<h1>Actualizar la imagen de Portada</h1>
<p style="font-size:20px;"><?php echo $model_libro->Titulo; ?></p>
<?php if(Yii::app()->user->hasFlash("error_imagen")){?>
<div class="flash-error">
    <?php echo Yii::app()->user->getFlash("error_imagen"); ?>   
</div>
<?php }?>
<?php if(Yii::app()->user->hasFlash("noerror_imagen")){?>
<div class="flash-success">    
    <?php echo Yii::app()->user->getFlash("noerror_imagen"); ?>    
</div>
<?php }?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'imagen-form',
	'enableClientValidation'=>true,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'foto'); ?>
		<?php echo $form->fileField($model,'foto'); ?>
		<?php echo $form->error($model,'foto'); ?>
		<?php echo $form->hiddenField($model,'extension'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Vista Previa'); ?>
	</div>
	<?php if(Yii::app()->user->hasFlash("imagen")){?>
		<div class="flash-success">    
			<?php echo CHtml::image(Yii::app()->request->baseUrl."".Yii::app()->user->getFlash("imagen"),'',array('class'=>'portada_libro'));?>    
			<div class="row buttons">
				<?php echo CHtml::submitButton('Guardar Imagen',array('name'=>'BotonGuardar')); ?>
			</div>
		</div>
		<?php }?>
		
	

<?php $this->endWidget(); ?>
</div><!-- form -->
