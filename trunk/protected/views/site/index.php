<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Bienvenido a la <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<div id="portada">
	<div id="principal">
		<img src="images/portada.png">
	</div>
	<div id="menu-left">
		<a href="index.php?r=libro/view&id=4"><img src="images/portadas/4.png" width="140px"></a><br/><br/>
		<a href="index.php?r=libro/view&id=9"><img src="images/portadas/9.png" width="140px"></a>
	</div>
</div>