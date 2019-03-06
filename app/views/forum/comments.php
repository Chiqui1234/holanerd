<!-- Para generar un comentario :: JQuery -->


<div id="yourCommentBox">
        <input type="hidden" value="<?php echo base_url(); ?>" id="base_url" />
        <input type="hidden" value="<?php echo $_SESSION['username']; ?>" id="username" />
        <textarea id="comment" placeholder="¡Escribí lo que sientas!"></textarea>
        <input type="hidden" value="<?php echo $forumSlug; ?>" id="forum" />
        <input type="hidden" value="<?php echo $postSlug; ?>" id="post" />
        <input type="button" href="javascript:;" onclick="postComment( $('#base_url').val(), $('#username').val(), $('#comment').val(), $('#forum').val(), $('#post').val() );" value="Comentar" />
</div>

    <div id="commentsBox"></div>

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
            url     :   base_url + 'Post/commentPost',
            type    :   'post',
            beforeSend: function() {
                $('#yourCommentBox').html('Subiendo tu comentario');
                console.log('Comunicándose con: '+base_url+'Post/donatePoints');
            },
            success: function(response) {
                var result = /*$.parseJSON(response);*/response;
                $('#yourCommentBox').html(response);
                console.log('Success');
            },
            error: function(xhr, status, error) {
                var err = xhr;
                console.warn('ERROR: ' + err.Message);
                $('#yourCommentBox').html('No pudimos subir tu comentario');
            }
        });
    } // Cierre de función
</script>
<!-- Termina JQuery -->