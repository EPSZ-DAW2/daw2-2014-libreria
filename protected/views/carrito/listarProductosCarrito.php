<div>
    <h1>Productos en el Carrito</h1>
    <div>
        <div style="width: 80%;">
            <?php if (count($_SESSION['carrito']) > 0): ?>
                <?php if(Yii::app()->user->hasFlash('productoAgregadoCarrito')):?>
                <ul>
                    <li>
                        <ul>
                            <li><span><?php echo Yii::app()->user->getFlash('productoAgregadoCarrito'); ?></span></li>
                        </ul>
                    </li>
                </ul>
                <?php endif; ?>
                <?php if(Yii::app()->user->hasFlash('productosCarritoActualizados')):?>
                <ul>
                    <li>
                        <ul>
                            <li><span><?php echo Yii::app()->user->getFlash('productosCarritoActualizados'); ?></span></li>
                        </ul>
                    </li>
                </ul>
                <?php endif; ?>
                <?php if(Yii::app()->user->hasFlash('productoCarritoEliminado')):?>
                <ul>
                    <li>
                        <ul>
                            <li><span><?php echo Yii::app()->user->getFlash('productoCarritoEliminado'); ?></span></li>
                        </ul>
                    </li>
                </ul>
                <?php endif; ?>
                <?php if(Yii::app()->user->hasFlash('productoCarritoNoExiste')):?>
                <ul>
                    <li>
                        <ul>
                            <li><span><?php echo Yii::app()->user->getFlash('productoCarritoNoExiste'); ?></span></li>
                        </ul>
                    </li>
                </ul>
                <?php endif; ?>
                <div>
                <form id="form_actualizar_carrito" method="post" action="<?php echo Yii::app()->baseUrl ?>/carrito/actualizarProductosCarrito">
                    <table>
                        <tr>
                            <th>Titulo</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Importe</th>
                            <th>&nbsp;</th>
                        </tr>
                        <?php foreach ($_SESSION['carrito'] as $key => $producto): ?>
                            <tr>
                                <td><?php $libroC= Libro::model()->findByPk($producto['IdLibro']);
									echo $libroC->Titulo;?></td>
                                <td><?php echo number_format($producto['Precio'],0,',','.').'€';?></td>
								<td>
                                    <input type="hidden" name="Carro[<?php echo $producto['IdLibro']; ?>][idproducto]" value="<?php echo $producto['IdLibro']; ?>" />
                                    <input type="text" name="Carro[<?php echo $producto['IdLibro']; ?>][cantidad]" value="<?php echo $producto['Cantidad']; ?>" />
								</td>
                                <td><?php echo number_format(($producto['Precio'] * 
									$producto['Cantidad']), 0, ',', '.').'€'; ?>
                                </td>
                                <td>
                                    <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/images/trash_16x16_2.gif', 'Eliminar Producto'), array('eliminarProductoCarrito', 'id' => $producto['IdLibro'])) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="6" style="background-color: #F1F1F1;">
                                <div style="float: left; width: 50%; text-align: left;">
                                    <?php echo CHtml::link('Continuar Comprando', array('site/index'), array('class' => 'button')); ?>
                                </div>

                                <div style="float: left; width: 50%; text-align: right;">
                                    <?php echo CHtml::link('Vaciar Carrito', array('carrito/vaciarCarrito'), array('class' => 'button', 'confirm' => '¿Estás seguro que quieres eliminar los producto de tu carrito?.')); ?>
									<?php echo CHtml::link('Actualizar Carrito', array('carrito/ActualizarProductosCarrito'), array('class' => 'button')); ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
				</div>

                <div>
                    <p>-> TOTAL COMPRA = 
                        <?php echo number_format($_SESSION['total_carrito'], 0, ',', '.').'€'; ?></p>
				</div>

                <div></div>
                
                <div style="height: 20px;"></div>
                <?php //if(isset($_SESSION['Cliente'])): 
				$cliente= Cliente::model()->findByPk(Yii::app()->user->id);
				if(!(Yii::app()->user->isGuest)):?>
                    <div style="width: 870px; margin: 0 auto;">
                        <form name="frm-pedido" id="frm-pedido" action="<?php echo Yii::app()->baseUrl ?>/carrito/finalizarPedido" method="post">
                        <table style="width: 100%; margin: 0 auto;">
                            <tr>
                                <td>Dirección de Envío</td>
                                <td><?php echo $cliente->DomicilioFacturacion.','.
								$cliente->PoblacionFacturacion.','.$cliente->ProvinciaFacturacion.','.
								$cliente->CPFacturacion;?>
                                </td>
                            </tr>
                            <tr>
                                <td>Forma de Pago</td>
                                <td>
                                    <select name="Pedido[formaPago]">
                                        <?php foreach ($formasPago as $formaPago): ?>
                                            <option value="<?php echo $formaPago->IdPago; ?>"><?php echo $formaPago->Nombre; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <?php //echo CHtml::link('Finalizar Pedido', 'javascript:finalizarPedido();', array('class' => 'button', 'confirm' => '¿Estás seguro que quieres realizar el pedido?')); 
									echo CHtml::link('Finalizar Pedido', array('carrito/finalizarPedido'), array('class' => 'button', 'confirm' => '¿Estás seguro que quieres realizar el pedido?')); ?>
                                </td>
                            </tr>
                        </table>
                        </form>
                    </div>
                <?php else: ?>
					<h2>Debes iniciar sesión para realizar un pedido.</h2>
                <?php endif; ?>
            <?php else: ?>
					<h2>No tienes productos en tu carrito.</h2>
            <?php endif; ?>
        </div>

        <div></div>
    </div>
</div>