<div id="root"><div id="profile">
        <div id="main" class="backdrop-blur">
                <div class="avatar" style="background-image:url('<?php echo $profile[0]['avatar']; ?>');">
                        <div class="rank">Administrador</div>
                </div> <!-- A la izquierda -->
                <div class="userData">
                        <h1>@<?php echo $profile[0]['username']; ?></h1>
                        <h3><?php echo $profile[0]['created_at']; ?></h3>
                        <h3><?php echo $profile[0]['points']; ?> puntos</h3>
                </div>
                <div class="social">
                        <h1>Redes</h1>
                        <p><a href="<?php echo $profile[0]['linkedin']; ?>">Mi perfil LinkedIn</a></p>
                        <p><a href="<?php echo $profile[0]['git']; ?>">Mi perfil Git</a></p>
                        <p><a href="<?php echo $profile[0]['web']; ?>">Mi sitio web</a></p>
                </div>
        </div> <!-- Cierre de #main -->
        <div id="posts"><ul>
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