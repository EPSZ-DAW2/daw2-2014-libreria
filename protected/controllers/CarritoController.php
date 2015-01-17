<?php

class CarritoController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionListarProductosCarrito() {
        $this->layout = 'main';

        $formasPago = FormaPago::model()->findAll();
        //$direcciones = Direccion::model()->with('comuna')->findAll();
        //$tiposDocumento = TipoDocumento::model()->findAll();
        $this->getTotalCarrito();

        $this->render(
                'listarProductosCarrito',
                array(
                    'formasPago' => $formasPago,
                    //'direcciones' => $direcciones,
                    )//'tiposDocumento' => $tiposDocumento)
        );
    }

    public function actionAgregarProductoCarrito($id) {
        $vProducto = Libro::model()->findByPk($id);
        
        if(isset($vProducto)){
            if (isset($id, $_SESSION['carrito'][$id])) {
                $_SESSION['carrito'][$id]['Cantidad'] = ($_SESSION['carrito'][$id]['Cantidad'] + 1);
            } else {
                $producto = Libro::model()->findByPk($id);

                $_SESSION['carrito'][$id]['IdLibro'] = $producto->IdLibro;
                //$_SESSION['carrito'][$id]['producto_nombre'] = $producto->Titulo;
                //$_SESSION['carrito'][$id]['ISBN'] = $producto->ISBN;
				//$_SESSION['carrito'][$id]['Edicion'] = $producto->Edicion;
                $_SESSION['carrito'][$id]['Precio'] = $producto->Precio;
                $_SESSION['carrito'][$id]['Cantidad'] = 1;
            }
            
            Yii::app()->user->setFlash('productoAgregadoCarrito', "El producto se ha agregado correctamente.");
        } else {
            Yii::app()->user->setFlash('productoCarritoNoExiste', "El producto seleccionado no existe.");
        }

        $_SESSION['total_carrito'] = $this->getTotalCarrito();

        $this->redirect(array('listarProductosCarrito'));
    }

    public function actionActualizarProductosCarrito() {
        //foreach ($_POST['Carrito'] as $carrito) {
		foreach ($_SESSION['carrito'] as $carrito) {
            $_SESSION['carrito'][$carrito['IdLibro']]['Cantidad'] = $carrito['Cantidad'];
        }

        $_SESSION['total_carrito'] = $this->getTotalCarrito();
        
        Yii::app()->user->setFlash('productosCarritoActualizados', "Tu carrito de compra se ha actualizado correctamente.");

        $this->redirect(array('listarProductosCarrito'));
    }
	
    public function actionEliminarProductoCarrito($id) {
        unset($_SESSION['carrito'][$id]);

        $_SESSION['total_carrito'] = $this->getTotalCarrito();
        
        Yii::app()->user->setFlash('productoCarritoEliminado', "El producto se ha quitado de tu carrito correctamente.");

        $this->redirect(array('listarProductosCarrito'));
    }

    public function actionVaciarCarrito() {
        unset($_SESSION['carrito']);

        $this->redirect(array('/'));
    }

    public function actionFinalizarPedido() {
        $this->layout = 'main';
        if(!(Yii::app()->user->isGuest)){
        //if(isset($_SESSION['Cliente'])) {
            if(count($_SESSION['carrito']) > 0) {
                $pedido                                     = new Pedido;
				$cliente                                    = Cliente::model()->findByPk(Yii::app()->user->id);
                //$formaPago                                  = FormaPago::model()->findByPk($_POST['Pedido']['formaPago']);
                //$tipoDocumento                              = TipoDocumento::model()->findByPk($_POST['Pedido']['tiposDocumento']);
				
				$pedido->Serie								= 2015;
				$pedido->Numero								= rand(10000000,99999999);
                $pedido->Fecha			                    = new CDbExpression('NOW()');
                $pedido->IdCliente                          = $cliente->IdCliente;
                $pedido->DomicilioEnvio			            = $cliente->DomicilioFacturacion;
                $pedido->CPEnvio                            = $cliente->CPFacturacion;
                $pedido->PoblacionEnvio			            = $cliente->PoblacionFacturacion;
                $pedido->ProvinciaEnvio      				= $cliente->ProvinciaFacturacion;
                $pedido->TelefonoEnvio      				= 980980980;	
				$pedido->IVA								= 21;
				$pedido->GastosEnvio						= 3.50;
				$pedido->Pagado								= 0;
				$pedido->IdEstado							= 1;
                $pedido->IdPago                             = 1;//$formaPago->IdPago;

                if($pedido->save()) {
                    Yii::app()->user->setFlash('pedidoRealizadoCorrecto', "¡Gracias por comprar!<br/>Tu pedido es el número: #" . str_pad($pedido->IdPedido, 10, "0", STR_PAD_LEFT) . "<br />Recibirás un e-mail con los detalles de tu pedido.");

                    foreach ($_SESSION['carrito'] as $key => $producto) {
                        $pedidoLinea = new Linea;

                        $pedidoLinea->IdLibro = $producto['IdLibro'];
                        $pedidoLinea->Precio = $producto['Precio'];
                        $pedidoLinea->Cantidad = $producto['Cantidad'];
                        $pedidoLinea->Importe = ($producto['Precio'] * $producto['Cantidad']);
                        $pedidoLinea->IdPedido = $pedido->IdPedido;

                        $pedidoLinea->save();
                    }

                    unset($_SESSION['carrito']);
                    $_SESSION['carrito'] = array();
                } else {
                    //echo "<pre>"; print_r($pedido->getErrors()); echo "</pre>";
                    Yii::app()->user->setFlash('pedidoRealizadoError', "No es posible realizar tu pedido en este momento.");
                }
            } else {
                Yii::app()->user->setFlash('pedidoCarritoVacio', "No es posible realizar tu pedido en este momento, agrega productos a tu carrito.");
            }
        }

        $this->render(
                'finalizarPedido'
        );
    }

    public function getTotalCarrito() {
        $total = 0;
        //echo "<pre>"; print_r($_SESSION['carrito']); echo "</pre>"; exit();
        foreach ($_SESSION['carrito'] as $carrito) {
            //echo "<pre>"; print_r($carro); echo "</pre>"; exit();
            $total = $total + ($carrito['Precio'] * $carrito['Cantidad']);
        }

        return $total;
    }

}
