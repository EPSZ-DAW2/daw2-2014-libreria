<div>
    <div>
        <div>Finalizar Pedido</div>
        <div>
            <?php if(!(Yii::app()->user->isGuest)): ?>
                <?php if(Yii::app()->user->hasFlash('pedidoRealizadoCorrecto')):?>
                <ul>
                    <li>
                        <ul>
                            <li><span><?php echo Yii::app()->user->getFlash('pedidoRealizadoCorrecto'); ?></span></li>
                        </ul>
                    </li>
                </ul>
                <?php endif; ?>
                <?php if(Yii::app()->user->hasFlash('pedidoRealizadoError')):?>
                <ul>
                    <li>
                        <ul>
                            <li><span><?php echo Yii::app()->user->getFlash('pedidoRealizadoError'); ?></span></li>
                        </ul>
                    </li>
                </ul>
                <?php endif; ?>
                <?php if(Yii::app()->user->hasFlash('pedidoCarritoVacio')):?>
                <ul>
                    <li>
                        <ul>
                            <li><span><?php echo Yii::app()->user->getFlash('pedidoCarritoVacio'); ?></span></li>
                        </ul>
                    </li>
                </ul>
                <?php endif; ?>
            <?php else: ?>
            Debe iniciar sesión para realizar su pedido.
            <?php endif; ?>
        </div>
    </div>
</div>