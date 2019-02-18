<div id="profile">
    <?php if( $this->session->has_userdata('email') ) {
    ?>
        <div class="portrait"> <!-- Gran portada, que ocupa toda la pantalla -->
        
            <!--<div id="back"><a href="Forum/view"><img src="http://cdn.onlinewebfonts.com/svg/img_299545.png" alt="foro" width="100%" /></a></div>-->

            <div class="background">
                <!-- En el fondo de la portada habrá 'tiles' que contendrán posteos del usuario, notas destacadas, etc -->
                <ul>
                    <?php
                        $posts = $this->Profile_model->getUserPosts();
                        $i = 0;
                        while( isset($posts[$i]) ) {
                            echo '<li>
                                    <h1>'.$posts[$i]['title'].'</h1>
                                    <p>'.$posts[$i]['post'].'</p>
                                  </li>';
                            $i++;
                        }
                    ?>
                    
                </ul>
            </div>
        
            
            
            <div id="basic">
                <div class="bg blur"></div>
                <div class="avatar"><img src="https://cdn4.iconfinder.com/data/icons/avatars-21/512/avatar-circle-human-male-3-512.png" width="100%"" /></div>
                <div class="email"><?php echo $_SESSION['email']; ?></div>

                <!-- Menú rápido para el usuario -->
                <nav>
                    <ul>
                        <li><a href="#">posts</a></li>
                        <li><a href="#">tienda</a></li>
                        <li><a href="#">preferencias</a></li>
                    </ul>
                </nav>
            </div>
        </div> <!-- Cierre .portrait -->
    <?php
    } else {
        $data['error'] = true;
        $data['text'] = "No iniciaste sesión.";
        $this -> load -> view('pages/status', $data);
    }
    ?>
    
</div>