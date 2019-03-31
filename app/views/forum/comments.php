<!-- Para generar un comentario :: JQuery -->


<div id="comments">
<div id="yourCommentBox">
        <input type="hidden" value="<?php echo base_url(); ?>" id="base_url" />
        <input type="hidden" value="<?php echo $_SESSION['username']; ?>" id="username" />
        <textarea id="comment" placeholder="¡Escribí lo que sientas!"></textarea>
        <input type="hidden" value="<?php echo $forumSlug; ?>" id="forum" />
        <input type="hidden" value="<?php echo $postSlug; ?>" id="post" />
        <input type="button" href="javascript:;" onclick="postComment( $('#base_url').val(), $('#username').val(), $('#comment').val(), $('#forum').val(), $('#post').val() );" value="Comentar" />
</div>

    <div id="commentsBox"><?php 
        $i = 0;
        while( isset($comments[$i]) ) {
            echo '<h3>Escribe @'.$comments[$i]['username'].'</h3>';
            echo '<p>'.$comments[$i]['comment'].'</p>';
            $i++;
        }
    ?></div>
</div><!-- Cierre comments -->
</div> <!-- Cierre root -->

<script>
    function postComment(base_url, username, comment, forum, post) {
        var info = {
            // base_url sirve para ubicar al script
            'username'  : username, // El usuario que comenta
            'comment'   : comment,  // Su comentario
            'forum'     : forum,     // El slug del foro
            'post'      : post      // El slug del post
        };
        $.ajax({
            data    :   info,
            url     :   base_url + 'Post/postComment',
            type    :   'post',
            beforeSend: function() {
                $('#yourCommentBox').html('<p>Subiendo tu comentario...</p>');
                console.log('Comunicándose con: '+base_url+'Post/donatePoints');
            },
            success: function(response) {
                var result = response;
                $('#yourCommentBox').html('<h3>Escribe @'+username+'</h3><p>'+comment+'</p>');
                console.log('El comentario se subió correctamente');
            },
            error: function(xhr, status, error) {
                var err = xhr;
                console.warn('ERROR: ' + err.Message);
                $('#yourCommentBox').html('<p>No pudimos subir tu comentario</p>');
            }
        });
    } // Cierre de función
</script>
<!-- Termina JQuery -->