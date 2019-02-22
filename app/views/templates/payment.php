<div id="root">
<h1>¡Hola <?php echo $buyerUsername; ?>!</h1>
<p>Estás a punto de pagarle <strong><?php echo $points; ?></strong> puntos a <strong><?php echo $sellerUsername; ?></strong>, por un
"<?php echo $product; ?>".</p>
<h3>¿Todo bien?</h3>
<form action="Payment/process" method="post" id="payment">
    <input type="submit" value="Aceptar" name="si" />
    <input type="submit" value="Rechazar" name="no" />
</form>
</div>