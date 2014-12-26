<?php
$this->layout = 'pdf';
require('html2pdf.php');

class PDF extends FPDF
{
	// Cabecera de página
	function Header(){
		// Logo
		$this->Image('http://localhost/daw2M/images/basicos/logo.png',10,8,33);
		// Arial bold 15
		$this->SetFont('Arial','B',15);
		// Movernos a la derecha
		$this->Cell(80);
		// Título
		$this->Cell(30,10,'Title',1,0,'C');
		// Salto de línea
		$this->Ln(20);
	}

	// Pie de página
	function Footer(){
		// Posición: a 1,5 cm del final
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Número de página
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}
if (!$enlace = mysql_connect('localhost', 'root', '')) {
    echo 'No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('libreria', $enlace)) {
    echo 'No pudo seleccionar la base de datos';
    exit;
}
if (!$enlace = mysql_connect('localhost', 'root', '')) {
    echo 'No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('libreria', $enlace)) {
    echo 'No pudo seleccionar la base de datos';
    exit;
}

$id=1;

$sql = 'SELECT IdLibro, Cantidad, Precio, Importe FROM linea WHERE IdPedido ='.$id;
$resultado = mysql_query($sql, $enlace);
$fila = mysql_fetch_array($resultado);

if (!$resultado) {
    echo "Error de BD, no se pudo consultar la base de datos\n";
    echo "Error MySQL: " . mysql_error();
    exit;
}

$sqlpedido = 'SELECT * FROM pedido WHERE IdPedido ='.$id;
$resultadopedido = mysql_query($sqlpedido, $enlace);
$filapedido = mysql_fetch_array($resultadopedido);

if (!$resultadopedido) {
    echo "Error de BD, no se pudo consultar la base de datos\n";
    echo "Error MySQL: " . mysql_error();
    exit;
}

$sqlcliente = 'SELECT * FROM cliente WHERE IdCliente ='.$filapedido["IdCliente"];
$resultadocliente = mysql_query($sqlcliente, $enlace);
$filacliente = mysql_fetch_array($resultadocliente);

if (!$resultadocliente) {
    echo "Error de BD, no se pudo consultar la base de datos\n";
    echo "Error MySQL: " . mysql_error();
    exit;
}

$sqlusuario = 'SELECT * FROM usuario WHERE IdUsuario = 3';//.$filacliente["IdCliente"];
$resultadousuario = mysql_query($sqlusuario, $enlace);
$filausuario = mysql_fetch_array($resultadousuario);

if (!$resultadousuario) {
    echo "Error de BD, no se pudo consultar la base de datos\n";
    echo "Error MySQL: " . mysql_error();
    exit;
}
$html = '';
$html .='
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<style>
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
	}
	</style>
</head>

<body>
	<center><h1>Factura nº:'.$id.'</h1></center>
	<br><br><br>
	<p>Datos de Facturación:<br>
	&nbsp;&nbsp;&nbsp;&nbsp;NIF: '.$filausuario["NIF"].'<br>
	&nbsp;&nbsp;&nbsp;&nbsp;Nombre: '.$filausuario["Nombre"].'<br>
	&nbsp;&nbsp;&nbsp;&nbsp;Apellidos: '.$filausuario["Apellidos"].'<br>
	&nbsp;&nbsp;&nbsp;&nbsp;Domicilio: '.$filapedido["DomicilioEnvio"].'<br>
	&nbsp;&nbsp;&nbsp;&nbsp;Población: '.$filapedido["PoblacionEnvio"].'<br>
	&nbsp;&nbsp;&nbsp;&nbsp;Provincia: '.$filapedido["ProvinciaEnvio"].'<br>
	&nbsp;&nbsp;&nbsp;&nbsp;Código Postal: '.$filapedido["CPEnvio"].'</p>
	<center>
	<table class="tftable" border="1">
	<tr><th>Producto</th><th>Cantidad</th><th>Precio/unidad</th><th>Precio Final</th></tr>';

while ($fila = mysql_fetch_array($resultado)) {

	$sql2 = 'SELECT Titulo FROM libro WHERE IdLibro ='.$fila["IdLibro"];
	$resultado2 = mysql_query($sql2, $enlace);
	
	while ($fila2 = mysql_fetch_array($resultado2)) {
		$html .="<tr><td>".htmlspecialchars($fila2["Titulo"])."</td><td>".htmlspecialchars($fila["Cantidad"])."</td><td>".htmlspecialchars($fila["Precio"])."</td><td>".htmlspecialchars($fila["Importe"])."</td></tr>";
	}
}

$html .='
	<tr><th colspan="3">Precio Final</th><td>'.htmlspecialchars($fila[""]).'</td></tr>
	</table></center>
</body>';

// Creación del objeto de la clase heredada
$pdf=new PDF_HTML();
$pdf->SetFont('Arial','',12);
$pdf->AddPage();
if(ini_get('magic_quotes_gpc')=='1')
	$text=stripslashes($text);
$pdf->WriteHTML($html);
$pdf->Output();
?>