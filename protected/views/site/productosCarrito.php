<div>
    <?php if (count($_SESSION['carrito']) > 0): ?>
    <div>Tienes <strong><?php echo (count($_SESSION['carrito']) == 1) ? count($_SESSION['carrito']) . ' producto' : count($_SESSION['carrito']) . ' productos'; ?> </strong> en tu carrito.</div>
    
    <div>TOTAL: <span><?php echo number_format($_SESSION['total_carrito'], 0, ',', '.').'€'; ?></span>.-.</div>
    
    <?php else: ?>
        No tienes productos en tu carro.
    <?php endif; ?>
</div>
