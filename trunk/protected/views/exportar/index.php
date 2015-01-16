<?php if(Yii::app()->user->hasFlash('error')):?>
    <div class="info">
        <h4><?php echo Yii::app()->user->getFlash('error'); ?></h4>
    </div>
<?php endif; ?>

<div class="yiiForm">
	<?php echo CHtml::beginForm(); ?>

	<h5>Seleccione las tablas que van a ser exportadas:</h5>

	<!--Botones de check de las tablas-->

	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'authassignment'); ?>
	Authassignment<br/>
	</div>

	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'authitem'); ?>
	Authitem<br/>
	</div>

	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'authitemchild'); ?>
	Authitemchild<br/>
	</div>

	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'autor'); ?>
	Autor<br/>
	</div>

	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'categoria'); ?>
	Categoria<br/>
	</div>

	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'cliente'); ?>
	Cliente<br/>
	</div>

	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'configuracion'); ?>
	Configuración<br/>
	</div>

	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'editorial'); ?>
	Editorial<br/>
	</div>

	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'estado'); ?>
	Estado<br/>
	</div>

	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'forma_pago'); ?>
	Forma Pago<br/>
	</div>

	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'idioma'); ?>
	Idioma<br/>
	</div>

	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'libro'); ?>
	Libro<br/>
	</div>

	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'libro_autor'); ?>
	Libro Autor<br/>
	</div>

	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'libro_categoria'); ?>
	Libro Categoria<br/>
	</div>

	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'linea'); ?>
	Linea<br/>
	</div>

	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'nacionalidad'); ?>
	Nacionalidad<br/>
	</div>

	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'pedido'); ?>
	Pedido<br/>
	</div>

	<div class="simple">
	<?php echo CHtml::activeCheckBox($exportar,'usuario'); ?>
	Usuario<br/>
	</div>

	</br><h5>Elija el formato:</h5>

	<!--Botones de radio para el tipo de archivo-->
	<div class="simple">
			<?php echo  CHtml::activeRadioButton($exportar,'opcion',array('value'=>0)) . 'Exportar en XML';
				  echo '<br/>';
				  echo  CHtml::activeRadioButton($exportar,'opcion',array('value'=>1)) . 'Exportar en SQL'; ?>
	</div></br>

	<div class="action">
	<?php echo CHtml::submitButton('Exportar'); ?>
	</div>

	<?php echo CHtml::endForm(); ?>
</div>

<?php if(Yii::app()->user->hasFlash('informacion')):?>
    <div class="info">
        <?php echo Yii::app()->user->getFlash('informacion'); ?>
    </div></br>
<?php endif; ?>
