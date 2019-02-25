<!-- The header contains the basic HTML code that you’ll want to display before 
loading the main view, together with a heading. It will also output the $title
variable, which we’ll define later in the controller. -->
<html>
        <head>
            <title><?php echo $title; ?> | holanerd.com.ar</title>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/holanerd/main.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/holanerd/home.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/holanerd/header.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/holanerd/nav.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/holanerd/sidebar.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/holanerd/homeForum.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/holanerd/payment.css" />
                <?php if( isset($_SESSION['email']) && $_SESSION !== NULL ) { ?>
                <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/holanerd/profile.css" />
                <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/holanerd/postCreator.css" />
                <?php } ?>
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/holanerd/footer.css" />
            <?php if( isset($headerExtraCode) && (!empty($headerExtraCode)) ) {
                    echo $headerExtraCode;
                    }
                    /* Permite la adición de más código CSS, por ejemplo, sin necesidad de llamar a <head> en las
                    vistas */ 
            ?>
            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
        </head>
        <body>
<div id="fashionHeader"> <!-- Un header muy fachero -->
    <!-- particles.js container -->
    <div id="particles-js"></div>

    <!-- scripts -->
    <script src="<?php echo base_url(); ?>theme/holanerd/js/particlesJs/particles.js"></script>
    <script src="<?php echo base_url(); ?>theme/holanerd/js/particlesJs/app.js"></script>

    <!-- stats.js -->
    <script>
        var count_particles,
            stats,
            update;
        stats = new Stats;
        stats.setMode(0);
        stats.domElement.style.position = 'absolute';
        stats.domElement.style.left = '0px';
        stats.domElement.style.top = '0px';
        document
            .body
            .appendChild(stats.domElement);
        count_particles = document.querySelector('.js-count-particles');
        update = function () {
            stats.begin();
            stats.end();
            if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
                count_particles.innerText = window
                    .pJSDom[0]
                    .pJS
                    .particles
                    .array
                    .length;
            }
            requestAnimationFrame(update);
        };
        requestAnimationFrame(update);
    </script>
    <div class="logo" title="<?php echo $title; ?>"></div>
    <nav>
        <ul>
            <li><a href="<?php echo base_url(); ?>">inicio</a></li> <!-- Un feed general de todo el sitio -->
            <li><a href="<?php echo base_url(); ?>forum">foro</a></li>
            <li><a href="<?php echo base_url(); ?>store">tienda</a></li>
            <?php if( $this->session->has_userdata('email') ) {
                ?>
                <li><a href="<?php echo base_url(); ?>profile#profile">perfil</a></li>
                <?php
            } else {
                ?>
                <li><a href="<?php echo base_url(); ?>about">holanerd!</a></li>
                <?php
            }
                ?>
            
            <!--<li><a href="login">entrar</a></li>-->
        </ul>
    </nav>

</div> <!-- Termina el header fachero -->