<?php if( $this->session->has_userdata('email') ) {
                ?>
                <p><?php 
                if(isset($_SESSION['username']) && (!empty($_SESSION['username']))) {
                    echo '<h3>Hola, @'.$_SESSION['username'].'.</h3>'; 
                    $this->load->view('templates/sidebarForLoguedUser');
                } else {
                    echo '<h3>Hola, '.$_SESSION['email'].'.</h3>';
                    $this->load->view('templates/sidebarForLoguedUser');
                }?>
                <?php
            } else {
                ?>
                
    <h1>Ingresá | Registrate</h1>
    <form action="<?php echo base_url(); ?>Login/user" method="post" id="login">
        <input type="text" placeholder="E-mail" name="email" required />
        <input type="password" placeholder="Contraseña" name="password" required />
            <div class="loginType">
                <p>Usuario independiente <input type="radio" value="Usuario" name="loginType" /></p>
                <p>Miembro de un grupo <input type="radio" value="Grupo" name="loginType" /></p>
            </div>
        
        <div class="help">
            ¿No tenés cuenta? <a href="<?php echo base_url();?>register#registerTitle">Unite</a>
        </div>
        <input type="submit" value="entrar" name="submit" />
    </form>

                <?php
            }
                ?>
