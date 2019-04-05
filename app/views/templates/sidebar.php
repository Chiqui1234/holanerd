<div id="sidebar"> <!-- Empieza sidebar -->
    <?php
        $this -> load -> view('templates/sidebarLat');
        if(!isset($_SESSION['username'])){echo '<h1>Ingresá | Registrate</h1>';}
        $this -> load -> view('templates/loginForm');
    ?>    
</div> <!-- Termina sidebar -->