<!-- The header contains the basic HTML code that you’ll want to display before 
loading the main view, together with a heading. It will also output the $title
variable, which we’ll define later in the controller. -->
<!DOCTYPE HTML>
<html lang="es">
        <head>
            <title><?php echo $title; ?> | Holanerd</title>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/main.css?version=1" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/home.css?version=1" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/header.css?version=1" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/nav.css?version=1" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/sidebar.css?version=1" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/homeForum.css?version=1" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/post.css?version=1" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/payment.css?version=1" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/profile.css?version=1" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/postCreator.css?version=1" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/footer.css?version=1" />
            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
            <!-- JQuery -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
        </head>
        <body>
<div id="openFashionHeader"><a href="#fashionHeader" onclick="openFH();"></a></div>
<div id="fashionHeader"> <!-- Un header muy fachero -->
    <?php
    if( isset($_SESSION['less']) && (!$_SESSION['less']) ) { // Si 'less' (menos) existe y es FALSO, entonces el usuario "quiere más" y habilitamos el JS
        $this->load->view('templates/particles');
    } ?>
    <div class="logo" title="<?php echo $title; ?>"></div>
    <div id="sidebarResponsive">
    <?php $this->load->view('templates/loginForm'); ?>
    </div>
    <nav>
        <ul>
            <li><a href="<?php echo base_url(); ?>">inicio</a></li> <!-- Un feed general de todo el sitio -->
            <li><a href="<?php echo base_url(); ?>Forum">foro</a></li>
            <li><a href="<?php echo base_url(); ?>Store">tienda</a></li>
            <?php if( $this->session->has_userdata('email') ) {
                ?>
                <li><a href="<?php echo base_url(); ?>Profile/#profile">perfil</a></li>
                <?php
            } else {
                ?>
                <li><a href="<?php echo base_url(); ?>About">holanerd!</a></li>
                <?php
            }
                ?>
            </ul>
    </nav>

</div> <!-- Termina el header fachero -->
<script>
function closeFH() {
    document.getElementById('openFashionHeader').innerHTML = '<a href="#fashionHeader" onclick="openFH();"></a>';
}
function openFH() {
    var OFH = document.getElementById('openFashionHeader');
    OFH.innerHTML = '<a href="#" onclick="closeFH();"></a>';
}
</script>
