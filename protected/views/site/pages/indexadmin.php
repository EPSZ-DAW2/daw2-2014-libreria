<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
}
</style>

<?php
	echo '<b>Prueba de Impresion pdf </b>'.CHtml::link('Test',array('/site/page', 'view'=>'ipdf', 'id'=>'2'));
	echo '<br>';
?>
<table>
	<?php
		if (Yii::app()->user->checkAccess( 'sysadmin') || Yii::app()->user->checkAccess( 'admin') || Yii::app()->user->checkAccess( 'libreria') || Yii::app()->user->checkAccess( 'gerente')){
			echo '
			<tr>
			<td rowspan="3" style="text-align:center">
				'.CHtml::link('<img src="'.Yii::app()->request->baseUrl.'/images/iconos/libros.png" />',array('')).'				
				<br><b>Gestión de Libros</b>
			</td>
			<td>'.CHtml::link('Crear Nuevo Libro', array('libro/create')).'</td>
			</tr>
			<tr>
				<td>'.CHtml::link('Modificar Libros', array('libro/admin')).'</td>
			</tr>
			<tr>
				<td>'.CHtml::link('Listar Libros', array('/libro')).'</td>
			</tr>
			';
		}
		
		if (Yii::app()->user->checkAccess( 'sysadmin') || Yii::app()->user->checkAccess( 'admin') || Yii::app()->user->checkAccess( 'libreria') || Yii::app()->user->checkAccess( 'gerente')){
			echo '
				<tr>
					<td rowspan="3" style="text-align:center">
					'.CHtml::link('<img src="'.Yii::app()->request->baseUrl.'/images/iconos/autores.png" />',array('')).'
					<br><b>Gestión de Autores</b>
					</td>
					<td>'.CHtml::link('Registrar Nuevo Autor', array('autor/create')).'</td>
				</tr>
				<tr>
					<td>'.CHtml::link('Modificar Autores', array('autor/admin')).'</td>
				</tr>
				<tr>
					<td>'.CHtml::link('Listar Autores', array('/autor')).'</td>
				</tr>
			';
		}
		
		if (Yii::app()->user->checkAccess( 'sysadmin') || Yii::app()->user->checkAccess( 'admin') || Yii::app()->user->checkAccess( 'libreria') || Yii::app()->user->checkAccess( 'gerente')){
			echo '
				<tr>
					<td rowspan="3" style="text-align:center">
					'.CHtml::link('<img src="'.Yii::app()->request->baseUrl.'/images/iconos/editoriales.png" />',array('')).'
					<br><b>Gestión de Editoriales</b>
					</td>
					<td>'.CHtml::link('Registrar Nueva Editorial', array('editorial/create')).'</td>
				</tr>
				<tr>
					<td>'.CHtml::link('Modificar Editoriales', array('editorial/admin')).'</td>
				</tr>
				<tr>
					<td>'.CHtml::link('Listar Editoriales', array('/editorial')).'</td>
				</tr>
			';
		}
		
		if (Yii::app()->user->checkAccess( 'sysadmin') || Yii::app()->user->checkAccess( 'admin') || Yii::app()->user->checkAccess( 'vendedor') || Yii::app()->user->checkAccess( 'gerente')){
			echo '
				<tr>
					<td rowspan="3" style="text-align:center">
					'.CHtml::link('<img src="'.Yii::app()->request->baseUrl.'/images/iconos/clientes.png" />',array('')).'
					<br><b>Gestión de Clientes</b>
					</td>
					<td>'.CHtml::link('Registrar Nuevo Cliente', array('cliente/create')).'</td>
				</tr>
				<tr>
					<td>'.CHtml::link('Modificar Clientes', array('cliente/admin')).'</td>
				</tr>
				<tr>
					<td>'.CHtml::link('Listar Clientes', array('cliente/')).'</td>
				</tr>
			';
		}
		
		if (Yii::app()->user->checkAccess( 'sysadmin') || Yii::app()->user->checkAccess( 'admin') || Yii::app()->user->checkAccess( 'vendedor') || Yii::app()->user->checkAccess( 'gerente')){
			echo '
				<tr>
					<td rowspan="3" style="text-align:center">
					'.CHtml::link('<img src="'.Yii::app()->request->baseUrl.'/images/iconos/pedidos.png" />',array('')).'
					<br><b>Gestión de Pedidos</b>
					</td>
					<td>'.CHtml::link('Registrar Nuevo Pedido', array('pedido/create')).'</td>
				</tr>
				<tr>
					<td>'.CHtml::link('Modificar Pedidos', array('pedido/admin')).'</td>
				</tr>
				<tr>
					<td>'.CHtml::link('Listar Pedidos', array('pedido/')).'</td>
				</tr>
			';
		}
		
	?>
</table>
