<!-- Esta vista proporciona una plataforma de errores -->
<div id="root">
    <h1>Ufff...</h1>
    <p>Algo se rompió.  Mandá un <a href='mailto:<?php echo $GLOBALS['adm_email']; ?>'>email a la administración</a> para notificar del error.</p>
    <p><?php echo $errorText; ?></p> 
</div>