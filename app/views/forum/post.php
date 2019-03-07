
<div id="root">
    <p><a href="<?php echo $forums; ?>">foros</a> > <a href="<?php echo $actualForum; ?>"><?php echo $forumSlug; ?></a> > <a href="<?php echo $actualPost; ?>"><?php echo $postSlug; ?></a></p>
    <h3><?php echo 'Escrito por <a href="Profile/search/'.$post[0]['author'].'">@'.$post[0]['author'].'</a>'; ?></h3>
    <div id="someData">
        <div id="date"><div id="clocksy" style="background-image: url('<?php echo base_url(); ?>theme/holanerd/img/post/clock.jpg');"></div><div class="text"><?php echo $post[0]['date']; ?></div></div>
        <div id="commentsCounter"><div id="chat" style="background-image: url('<?php echo base_url(); ?>theme/holanerd/img/post/chat.jpg');"></div><div class="text"><?php echo $post[0]['comments']; ?></div></div>
    </div>
    <h1><?php echo $post[0]['title']; ?></h1>
    <img src="<?php echo $post[0]['image']; ?>" alt="No se cargó una imágen para el post, ¡que autor cochino!" width="100%" id="postImage" />
    <?php echo $post[0]['content']; ?>
