<div id="root">
<?php if( $typeOfProduct ) { ?>
<h1>Terminaste tu compra</h1>
<p>Podés descargarla desde acá: <a href="<?php echo $download; ?>"><?php echo $download; ?></a>.</p>
<p><strong>Mensaje de tu vendedor</strong>: ¡Gracias por tu compra! Con tus minutos voy a poder reinvertir en mi trabajo y 
así, lanzar cada vez mejores aportes que te ayuden a crecer a vos también.</p>
<?php } else { ?>
<h1>¡Ya casi estás!</h1>
<p>Coordiná con el vendedor.</p>
<?php } ?>
</div>