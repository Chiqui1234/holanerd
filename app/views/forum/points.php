
<div id="points">
<p>El post tiene <a href="#helper" onclick="minutes();" id="minutes"><?php echo $post[0]['points']; ?> <?php if($post[0]['points'] !== 1) { echo 'minutos'; } else{ echo 'minuto'; } ?></a>. Si te gustó, ¡puntualo!</p>
<ul>
    <input type="hidden" value="<?php echo base_url(); ?>" id="base_url" />
    <input type="hidden" value="<?php echo $postSlug; ?>" id="post" />
    <input type="hidden" value="<?php echo $forumSlug; ?>" id="forum" />
    <input type="hidden" value="<?php echo $_SESSION['username']; ?>" id="username" />
    <input type="hidden" value="<?php echo $post[0]['author']; ?>" id="author" />
    <input type="hidden" value="1" id="one" />
    <input type="hidden" value="2" id="two" />
    <input type="hidden" value="3" id="three" />
    <input type="hidden" value="4" id="four" />
    <input type="hidden" value="5" id="five" />

    <li><input type="button" onclick="donatePoints( $('#base_url').val(), $('#post').val(), $('#forum').val(), $('#username').val(), $('#author').val(), $('#one').val() );" /><p>1m</p></li>
    <li><input type="button" onclick="donatePoints( $('#base_url').val(), $('#post').val(), $('#forum').val(), $('#username').val(), $('#author').val(), $('#two').val() );" /><p>2m</p></li>
    <li><input type="button" onclick="donatePoints( $('#base_url').val(), $('#post').val(), $('#forum').val(), $('#username').val(), $('#author').val(), $('#three').val() );" /><p>3m</p></li>
    <li><input type="button" onclick="donatePoints( $('#base_url').val(), $('#post').val(), $('#forum').val(), $('#username').val(), $('#author').val(), $('#four').val() );" /><p>4m</p></li>
    <li><input type="button" onclick="donatePoints( $('#base_url').val(), $('#post').val(), $('#forum').val(), $('#username').val(), $('#author').val(), $('#five').val() );" /><p>5m</p></li>
</ul>
</div>

<script>
    function donatePoints(base_url, post, forum, username, author, points) {
        var info = {
            // base_url sirve para ubicar al script
            'post': post,                   // El slug del post
            'forum': forum,                 // El foro en el que se ubica el post
            'username': username,           // El usuario que deja puntos
            'author': author,               // El autor del post
            'points': points                // La cantidad de puntos que deja
        };
        console.log(info);
        $.ajax({
            data    :   info,
            url     :   base_url + 'Post/transferPoints',
            type    :   'post',
            beforeSend: function() {
                $('#points').html('<p>Dando minutos...</p>');
                console.log('Comunicándose con: '+base_url+'Post/transferPoints');
            },
            success: function(response) {
                var result = response;
                $('#points').html('<p>¡Bien! Ya le diste minutos al autor.</p>');
                console.log('<p>¡Bien! Ya le diste minutos al autor</p>');
            },
            error: function(xhr, status, error) {
                var err = xhr;
                console.warn('ERROR: ' + err.Message);
                $('#points').html('<p>No pudimos darle minutos al autor, ¡probá en un rato!</p>');
            }
        }); // Cierre de ajax
    } // Cierre de función
</script>