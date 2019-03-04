<div id="root">
    <div id="postData">
        <div class="author"><?php echo $post[0]['author']; ?></div>
        <div class="date"><?php echo $post[0]['date']; ?></div>
    </div>
<h1><?php echo $post[0]['title']; ?></h1>
<img src="<?php echo $post[0]['image']; ?>" title="portada" alt="imágen del post" width="100%" />
<?php echo $post[0]['content']; ?>
</div>