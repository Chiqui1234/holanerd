
<div id="root">
    <h1><?php echo $post[0]['title']; ?></h1>
    <img src="<?php echo $post[0]['image']; ?>" alt="No se cargó una imágen para el post, ¡que autor cochino!" width="100%" />
    <h3>Fecha | <?php echo $post[0]['date']; ?></h3>
    <h3>Comentarios | <?php echo $post[0]['comments']; ?></h3>
    <?php echo $post[0]['content']; ?>
