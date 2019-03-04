<div id="profile">
        <div class="portrait" style="background-image:url('<?php echo $this->Profile_model->printBg(); ?>');"> <!-- Gran portada, que ocupa toda la pantalla -->

            <div class="background">
                <!-- En el fondo de la portada habrá 'tiles' que contendrán posteos del usuario, notas destacadas, etc -->
                <ul>
                    <?php
                        // ACA IMPRIMO LOS POSTS DEL USUARIO
                    ?>
                </ul>
            </div>
        
            
            
            <div id="basic">
                <div class="bg blur" style="background-image:url('<?php echo $this->Profile_model->printBg(); ?>');"></div>
                <div class="avatar"><img src="<?php echo $this->Profile_model->printAvatar(); ?>" width="100%" /></div>
                <div class="email"><?php echo purify($_SESSION['email']); ?></div>

                <div class="stats">
                <!-- Estadísticas del usuario, aunque el contenido cambiará cuándo se presionen los siguientes links:
                        - Posts
                        - Tienda
                        - Preferencias
                -->
                    <?php
                        // IMPRIMO LAS ESTADISTICAS DEL USUARIO
                    ?>
                </div>

                <!-- Menú rápido para el usuario -->
                <nav>
                    <ul>
                        <li><a href="#">tienda</a></li>
                        <li><a href="#">preferencias</a></li>
                        <li><a href="profile/logout">cerrar</a></li>
                    </ul>
                </nav>
            </div>
        </div> <!-- Cierre .portrait -->
</div>