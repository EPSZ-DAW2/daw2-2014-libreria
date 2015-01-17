<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<!-- <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div> -->
	</div><!-- header -->

	<!--Menu superior izquierdo(LOG-IN)-->
	<div id="mainmenu3">
	<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/iconos/varios/logout.png" />   Cerrar Sesión ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/iconos/varios/login.png" />   Accede ', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/iconos/varios/separador.png" />', 'url'=>array('')),
				array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/iconos/varios/registro.png" />   Regístrate', 'url'=>array('/site/registro'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/iconos/varios/ajustes.png" />   Configuración', 'url'=>array('/site/configuracion'), 'visible'=>Yii::app()->user->checkAccess( 'sysadmin')|| Yii::app()->user->checkAccess( 'admin')|| Yii::app()->user->checkAccess( 'gerente')|| Yii::app()->user->checkAccess( 'vendedor')|| Yii::app()->user->checkAccess( 'libreria')),
				array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/iconos/varios/ajustes.png" />   Mi cuenta', 'url'=>array('/cliente'), 'visible'=> Yii::app()->user->checkAccess( 'cliente')),
				array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/iconos/varios/separador.png" />', 'url'=>array(''), 'visible'=> Yii::app()->user->checkAccess( 'sysadmin') || Yii::app()->user->checkAccess( 'admin')),
				array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/iconos/varios/lock.png" />   Copia de Seguridad', 'url'=>array('site/page', 'view' => 'copia_seguridad'), 'visible'=> Yii::app()->user->checkAccess( 'sysadmin') || Yii::app()->user->checkAccess( 'admin')),

			),
		)); ?>
	</div>

	<!--Menu superior derecho-->
	<div id="mainmenu2">
	<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/iconos/varios/info.png" />   Ayuda', 'url'=>array('/site/page', 'view'=>'ayuda')),
				array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/iconos/varios/separador.png" />', 'url'=>array('')),
				array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/iconos/varios/carro.png" />   Mi Carrito', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/iconos/varios/carro.png" />   Mi Carrito (' . count($_SESSION['carrito']) . ')', 'url'=>array('carrito/listarProductosCarrito'), 'visible'=>Yii::app()->user->checkAccess( 'cliente')|| Yii::app()->user->checkAccess( 'admin')|| Yii::app()->user->checkAccess( 'gerente')|| Yii::app()->user->checkAccess( 'vendedor')|| Yii::app()->user->checkAccess( 'libreria')),
			),
		)); ?>
	</div>

	<div id="clear">
	</div>

	<div id="mainmenu" style="cursor: pointer;" onclick="document.location.href='index.php';">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				//array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/logo.png" />', 'url'=>array('/site/index')),
				array(
					'label'=>'Libros   <img src="'.Yii::app()->request->baseUrl.'/images/iconos/varios/drop.png" />',
					'url'=>array('/libro'),
					'linkoptions'=>array('id'=>'menuLibros'),
					'itemoptions'=>array('id'=>'itemLibros'),
					'items'=>array(
						array('label'=>'Insertar Libro', 'url'=>array('libro/create'), 'visible'=>Yii::app()->user->checkAccess( 'sysadmin')|| Yii::app()->user->checkAccess( 'admin')|| Yii::app()->user->checkAccess( 'libreria')|| Yii::app()->user->checkAccess( 'gerente')),
						array('label'=>'Administrar Libros', 'url'=>array('libro/admin'), 'visible'=>Yii::app()->user->checkAccess( 'sysadmin')|| Yii::app()->user->checkAccess( 'admin')|| Yii::app()->user->checkAccess( 'libreria')|| Yii::app()->user->checkAccess( 'gerente')),
						array('label'=>'', 'visible'=>Yii::app()->user->checkAccess( 'sysadmin')|| Yii::app()->user->checkAccess( 'admin')|| Yii::app()->user->checkAccess( 'libreria')|| Yii::app()->user->checkAccess( 'gerente')),
						array('label'=>'¡Descubre algo nuevo!', 'url'=>array('libro/view&id='.rand(1,9))),
						array('label'=>'El más vendido', 'url'=>array('libro/view&id=7')),
						array('label'=>'Nuestra recomendación', 'url'=>array('libro/view&id=1')),
						array('label'=>''),
						array('label'=>'Ir a Libros >', 'url'=>array('/libro')),
					),
				),
				array(
					'label'=>'Autores   <img src="'.Yii::app()->request->baseUrl.'/images/iconos/varios/drop.png" />',
					'url'=>array('/autor'),
					'linkoptions'=>array('id'=>'menuAutores'),
					'itemoptions'=>array('id'=>'itemAutores'),
					'items'=>array(
						array('label'=>'Registrar Autor', 'url'=>array('autor/create'), 'visible'=>Yii::app()->user->checkAccess( 'sysadmin')|| Yii::app()->user->checkAccess( 'admin')|| Yii::app()->user->checkAccess( 'gerente')|| Yii::app()->user->checkAccess( 'libreria')),
						array('label'=>'Listar Autores', 'url'=>array('autor/admin'), 'visible'=>Yii::app()->user->checkAccess( 'sysadmin')|| Yii::app()->user->checkAccess( 'admin')|| Yii::app()->user->checkAccess( 'gerente')|| Yii::app()->user->checkAccess( 'libreria')),
						array('label'=>'', 'visible'=>Yii::app()->user->checkAccess( 'sysadmin')|| Yii::app()->user->checkAccess( 'admin')|| Yii::app()->user->checkAccess( 'gerente')|| Yii::app()->user->checkAccess( 'libreria')),
						array('label'=>'¡Descubre algo nuevo!', 'url'=>array('autor/view&id='.rand(1,9))),
						array('label'=>'El autor best-seller', 'url'=>array('autor/view&id=1')),
						array('label'=>'Nuestra recomendación', 'url'=>array('autor/view&id=8')),
						array('label'=>''),
						array('label'=>'Consultar Autores >', 'url'=>array('/autor')),
					),
				),
				array(
					'label'=>'Editoriales   <img src="'.Yii::app()->request->baseUrl.'/images/iconos/varios/drop.png" />',
					'url'=>array('/editorial'),
					'linkoptions'=>array('id'=>'menuEditoriales'),
					'itemoptions'=>array('id'=>'itemEditoriales'),
					'visible'=>Yii::app()->user->checkAccess( 'sysadmin')|| Yii::app()->user->checkAccess( 'admin')|| Yii::app()->user->checkAccess( 'libreria')|| Yii::app()->user->checkAccess( 'gerente'),
					'items'=>array(
						array('label'=>'Registrar Editorial', 'url'=>array('editorial/create'), 'visible'=>Yii::app()->user->checkAccess( 'sysadmin')|| Yii::app()->user->checkAccess( 'admin')|| Yii::app()->user->checkAccess( 'libreria')|| Yii::app()->user->checkAccess( 'gerente')),
						array('label'=>'Listar Editoriales', 'url'=>array('editorial/admin'), 'visible'=>Yii::app()->user->checkAccess( 'sysadmin')|| Yii::app()->user->checkAccess( 'admin')|| Yii::app()->user->checkAccess( 'libreria')|| Yii::app()->user->checkAccess( 'gerente')),
						array('label'=>'Consultar Editoriales', 'url'=>array('/editorial'), 'visible'=>Yii::app()->user->checkAccess( 'sysadmin')|| Yii::app()->user->checkAccess( 'admin')|| Yii::app()->user->checkAccess( 'gerente')|| Yii::app()->user->checkAccess( 'libreria')),
					),
				),
				array(
					'label'=>'Clientes   <img src="'.Yii::app()->request->baseUrl.'/images/iconos/varios/drop.png" />',
					'url'=>array('/cliente'),
					'linkoptions'=>array('id'=>'menuCliente'),
					'itemoptions'=>array('id'=>'itemCliente'),
					'visible'=>Yii::app()->user->checkAccess( 'sysadmin')|| Yii::app()->user->checkAccess( 'admin')|| Yii::app()->user->checkAccess( 'vendedor')|| Yii::app()->user->checkAccess( 'gerente'),
					'items'=>array(
						array('label'=>'Registrar Cliente', 'url'=>array('cliente/create'), 'visible'=>Yii::app()->user->checkAccess( 'sysadmin')|| Yii::app()->user->checkAccess( 'admin')|| Yii::app()->user->checkAccess( 'vendedor')|| Yii::app()->user->checkAccess( 'gerente')),
						array('label'=>'Listar Clientes', 'url'=>array('cliente/admin'), 'visible'=>Yii::app()->user->checkAccess( 'sysadmin')|| Yii::app()->user->checkAccess( 'admin')|| Yii::app()->user->checkAccess( 'vendedor')|| Yii::app()->user->checkAccess( 'gerente')),
						array('label'=>'Consultar Clientes', 'url'=>array('cliente/index'), 'visible'=>Yii::app()->user->checkAccess( 'sysadmin')|| Yii::app()->user->checkAccess( 'admin')|| Yii::app()->user->checkAccess( 'gerente')|| Yii::app()->user->checkAccess( 'vendedor')),
					),
				),
				array(
					'label'=>'Pedidos   <img src="'.Yii::app()->request->baseUrl.'/images/iconos/varios/drop.png" />',
					'url'=>array('/pedido'),
					'linkoptions'=>array('id'=>'menuPedidos'),
					'itemoptions'=>array('id'=>'itemPedidos'),
					'visible'=>Yii::app()->user->checkAccess( 'sysadmin')|| Yii::app()->user->checkAccess( 'admin')|| Yii::app()->user->checkAccess( 'vendedor')|| Yii::app()->user->checkAccess( 'gerente')|| Yii::app()->user->checkAccess( 'libreria')|| Yii::app()->user->checkAccess( 'cliente'),
					'items'=>array(
						array('label'=>'Administrar Pedidos', 'url'=>array('/pedido'), 'visible'=>Yii::app()->user->checkAccess( 'sysadmin')|| Yii::app()->user->checkAccess( 'admin')|| Yii::app()->user->checkAccess( 'vendedor')|| Yii::app()->user->checkAccess( 'gerente')),
						array('label'=>'', 'visible'=>Yii::app()->user->checkAccess( 'sysadmin')|| Yii::app()->user->checkAccess( 'admin')|| Yii::app()->user->checkAccess( 'vendedor')|| Yii::app()->user->checkAccess( 'gerente')),
						array('label'=>'Ver mis Pedidos >', 'url'=>array('/pedido')),
					),
				),
				array(
					'label'=>'Categorias   <img src="'.Yii::app()->request->baseUrl.'/images/iconos/varios/drop.png" />',
					'url'=>array('/categorias'),
					'linkoptions'=>array('id'=>'menuCategorias'),
					'itemoptions'=>array('id'=>'itemCategorias'),
					'visible'=>Yii::app()->user->checkAccess( 'cliente'),
					'items'=>array(
						array('label'=>'Aventuras', 'url'=>array('/categorias/view&id=1')),
						array('label'=>'Cocina', 'url'=>array('/categorias/view&id=2')),
						array('label'=>'Deporte', 'url'=>array('/categorias/view&id=3')),
						array('label'=>'Humor', 'url'=>array('/categorias/view&id=4')),
						array('label'=>'Terror', 'url'=>array('/categorias/view&id=5')),
					),
				),
				array(
					'label'=>'Idiomas   <img src="'.Yii::app()->request->baseUrl.'/images/iconos/varios/drop.png" />',
					'url'=>array('/idiomas'),
					'linkoptions'=>array('id'=>'menuIdiomas'),
					'itemoptions'=>array('id'=>'itemIdiomas'),
					'visible'=>Yii::app()->user->checkAccess( 'cliente'),
					'items'=>array(
						array('label'=>'Inglés', 'url'=>array('libro/view&id=9')),
						array('label'=>'Español', 'url'=>array('libro/view&id=1')),
					),
				),
				array('label'=>'Visor de Gestión', 'url'=>array('/site/page', 'view'=>'indexadmin'), 'visible'=>Yii::app()->user->checkAccess( 'sysadmin')	|| Yii::app()->user->checkAccess( 'admin')|| Yii::app()->user->checkAccess( 'libreria')|| Yii::app()->user->checkAccess( 'vendedor')|| Yii::app()->user->checkAccess( 'gerente')),
			),
		)); ?>
	</div><!-- mainmenu -->

	<div id="busqueda_libros">
        <?php echo CHtml::form(Yii::app()->createUrl('libro/search'),'get') ?>
            <?php echo CHtml::textField('search_key'); ?>
            <?php echo CHtml::submitButton('Busqueda Por Título'); ?>
        <?php echo CHtml::endForm() ?>
    </div>

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>
	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo '2014/2015'; ?> - G.I.I.S.I.<br/>
		Todos los derechos reservados.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->
<?php
	//print_r( $_SESSION);
?>
</body>
</html>
