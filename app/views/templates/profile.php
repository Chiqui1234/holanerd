<input type="hidden" value="<?php echo base_url(); ?>" id="base_url" />
<input type="hidden" value="visual" id="r1" />
<input type="hidden" value="redes" id="r2" />
<input type="hidden" value="privacidad" id="r3" />
<div id="root"><div id="profile">
        <div id="main" class="backdrop-blur">
                <div class="avatar" style="background-image:url('<?php echo $_SESSION['avatar']; ?>');">
                        <div class="rank">Administrador</div>
                </div> <!-- A la izquierda -->
                <div class="userData">
                        <h3>@<?php echo $_SESSION['username']; ?></h3>
                        <p><?php echo $_SESSION['created_at']; ?></p>
                        <p><?php echo $profile[0]['points']; ?> puntos</p>
                </div>
                <div class="social">
                        <h3>Redes</h3>
                        <p><a href="<?php echo $_SESSION['git']; ?>">Mi perfil Git</a></p>
                        <p><a href="<?php echo $_SESSION['linkedin']; ?>">Mi perfil LinkedIn</a></p>
                        <p><a href="<?php echo $_SESSION['web']; ?>">Mi sitio web</a></p>
                </div>
                <div class="config">
                        <h3>Configuración</h3>
                        <p><a href="#visual">Editar visual</a></p>
                        <p><a href="#redes">Editar redes</a></p>
                        <p><a href="#privacidad">Privacidad</a></p>
                </div>
        </div> <!-- Cierre de #main -->
        <div id="visual"> <!-- Dónde se edita la estética del perfil -->
                <h3>Editar visual</h3>
                <div class="left">
                                <p>Imágen de perfil | <input type="text" id="a1" placeholder="Imágen de perfil" name="avatar" value="<?php echo $_SESSION['avatar']; ?>" /></p>
                                <p>Color #1 | <input type="text" id="b1" placeholder="Color #1" name="color1" value="<?php echo $_SESSION['color1']; ?>"/></p>
                                <p>Color #2 | <input type="text" id="c1" placeholder="Color #2" name="color2" value="<?php echo $_SESSION['color2']; ?>"/></p>
                </div>
                <div class="right">
                <input type="button" href="javascript:;" onclick="update( $('#base_url').val(), $('#r1').val(), $('#a1').val(), $('#b1').val(), $('#c1').val() );" value="Actualizar perfil" />
                        <a href="#profile"><input type="button" value="Cerrar ventana" /></a>
                </div>
        </div> <!-- Cierre #visual -->
        <div id="redes"> <!-- Dónde se edita la estética del perfil -->
                <h3>Editar redes</h3>
                <div class="left">
                                <p>Git | <input type="text" id="a2" placeholder="Git" name="git" value="<?php echo $_SESSION['git']; ?>" /></p>
                                <p>Linkedin | <input type="text" id="b2" placeholder="LinkedIn" name="linkedin" value="<?php echo $_SESSION['linkedin']; ?>" /></p>
                                <p>Web | <input type="text" id="c2" placeholder="Web" name="web" value="<?php echo $_SESSION['web']; ?>" /></p>
                </div>
                <div class="right">
                <input type="button" href="javascript:;" onclick="update( $('#base_url').val(), $('#r2').val(), $('#a2').val(), $('#b2').val(), $('#c2').val() );" value="Actualizar perfil" />
                        <a href="#profile"><input type="button" value="Cerrar ventana" /></a>
                </div>
        </div> <!-- Cierre #visual -->
        <div id="privacidad"> <!-- Dónde se edita la estética del perfil -->
                <h3>Privacidad y Rendimiento</h3>
                <div class="left">
                                <p>Perfil público (<?php echo $_SESSION['is_public']; ?>) |     <select id="public">
                                                                <option value="1" <?php if($_SESSION['is_public'] == 1){echo 'selected';} ?>>Si</option>
                                                                <option value="0" <?php if($_SESSION['is_public'] == 0){echo 'selected';} ?>>No</option>
                                                        </select>
                                </p>
                                <p>"Less" (<?php echo $_SESSION['less']; ?>) |   <select id="less">
                                                                <option value="0" <?php if($_SESSION['less'] == 0){echo 'selected';} ?>>Si</option>
                                                                <option value="1" <?php if($_SESSION['less'] == 1){echo 'selected';} ?>>No</option>
                                                        </select>
                                </p>
                </div>
                <div class="right">
                        <input type="button" href="javascript:;" onclick="update( $('#base_url').val(), $('#r3').val(), $('#public').val(), $('#less').val() );" value="Actualizar perfil" />
                        <a href="#profile"><input type="button" value="Cerrar ventana" /></a>
                </div>
        </div> <!-- Cierre #visual -->
        <div id="daily">
                <h3>Los dailys están en desarrollo</h3>
                <p>Otra razón más por la cuál las personas te van a seguir está acá: tu Daily. <a href="https://programacionymas.com/blog/daily-scrum-meeting">¿Qué es un daily?</a></p>
                <p>Por el momento, no hay una fecha prevista para el comienzo y fin para programar esta función.</p>
        </div> <!-- Cierre #daily -->
        <div id="posts"><h3>Posts escritos</h3><ul>
        <?php   $i = 0;
                while( isset($computacion[$i]) ) {
                        echo '<li><a href="'.base_url().'Post/index/computacion/'.$computacion[$i]['subForum'].'/'.$computacion[$i]['slug'].'">'.$computacion[$i]['title'].'</a></li>';
                        $i++;
                }
                $i = 0;
                while( isset($programacion[$i]) ) {
                        echo '<li><a href="'.base_url().'Post/index/programacion/'.$programacion[$i]['subForum'].'/'.$programacion[$i]['slug'].'">'.$programacion[$i]['title'].'</a></li>';
                        $i++;
                }
                $i = 0;
                while( isset($disenografico[$i]) ) {
                        echo '<li><a href="'.base_url().'Post/index/disenoGrafico/'.$disenografico[$i]['subForum'].'/'.$disenografico[$i]['slug'].'">'.$disenografico[$i]['title'].'</a></li>';
                        $i++;
                }
                $i = 0;
                while( isset($audio[$i]) ) {
                        echo '<li><a href="'.base_url().'Post/index/audio/'.$audio[$i]['subForum'].'/'.$audio[$i]['slug'].'">'.$audio[$i]['title'].'</a></li>';
                        $i++;
                }
                $i = 0;
                while( isset($video[$i]) ) {
                        echo '<li><a href="'.base_url().'Post/index/videovideo/'.$video[$i]['subForum'].'/'.$video[$i]['slug'].'">'.$video[$i]['title'].'</a></li>';
                        $i++;
                }
                $i = 0;
                while( isset($emprenderismo[$i]) ) {
                        echo '<li><a href="'.base_url().'Post/index/emprenderismo/'.$emprenderismo[$i]['subForum'].'/'.$emprenderismo[$i]['slug'].'">'.$emprenderismo[$i]['title'].'</a></li>';
                        $i++;
                }
                $i = 0;
                while( isset($universidades[$i]) ) {
                        echo '<li><a href="'.base_url().'Post/index/universidades/'.$universidades[$i]['subForum'].'/'.$universidades[$i]['slug'].'">'.$universidades[$i]['title'].'</a></li>';
                        $i++;
                }
                $i = 0;
                while( isset($retro[$i]) ) {
                        echo '<li><a href="'.base_url().'Post/index/retro/'.$retro[$i]['subForum'].'/'.$retro[$i]['slug'].'">'.$retro[$i]['title'].'</a></li>';
                        $i++;
                }
                $i = 0;
                while( isset($off_topic[$i]) ) {
                        echo '<li><a href="'.base_url().'Post/index/off_topic/'.$off_topic[$i]['subForum'].'/'.$off_topic[$i]['slug'].'">'.$off_topic[$i]['title'].'</a></li>';
                        $i++;
                }
                $i = 0;
        ?>
        </ul></div> <!-- Cierre de #posts -->
</div></div>
<script>
    function update(base_url, redirect, a, b, c=null) {
        var info = {
            // base_url sirve para ubicar al script
            'a' :  a,
            'b' :  b,
            'c' :  c
        };
        $.ajax({
            data    :   info,
            url     :   base_url + 'Profile/' + redirect,
            type    :   'post',
            beforeSend: function() {
                $('#left').html('Actualizando...');
                console.log('Comunicándose con: '+base_url+'Profile/'+redirect);
            },
            success: function(response) {
                var result = response;
                $('#left').html(response);
                console.log('¡Tu perfil se actualizó!');
            },
            error: function(xhr, status, error) {
                var err = xhr;
                console.warn('ERROR: ' + err.Message);
                $('#left').html('No pudimos actualizar tu perfil');
            }
        });
    } // Cierre de función
</script>
<!-- Termina JQuery -->