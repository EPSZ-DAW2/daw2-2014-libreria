<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<table style="width:100%">
  <tr style="text-align: center;">
    <td style="text-align: center;"><b>Contacta con nosotros</b></td>
    <td style="text-align: center;"><b>Aprende más acerca de DAW2</b></td> 
  </tr>
  <tr style="text-align: center;">
    <td style="text-align: center;">
		<?php echo CHtml::link('<img src="'.Yii::app()->request->baseUrl.'/images/iconos/contacta.png" />',array('/site/contact')); ?>
	</td>
    <td style="text-align: center;">
		<?php echo CHtml::link('<img src="'.Yii::app()->request->baseUrl.'/images/iconos/info.png" />',array('/site/page', 'view'=>'about')); ?>
	</td> 
  </tr>
</table>
