<div id="root">
    <?php
    if($error) {
        ?>
        <h1>Ufff...</h1>
        <p>Algo se rompió. <!--Mandá un <a href="mailto:<?php echo $admEmail;?>">email a la administración</a>.--></p>
        <?php
            echo $text;
        ?>
        <p>En #holanerd / <strong><?php echo $title; ?></strong>.</p>
        <?php
    } else {
        ?>
        <h1>¡Felicidades!</h1>
        <p>Todo listo para usar.</p>
        <?php
            echo $text;
    }
    ?>
</div>