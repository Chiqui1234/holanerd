<div id="root" style="grid-column: 2 / 9;">
<div id="createForum">
    <p>¿Querés proponer la creación de un foro? Proponé y conseguí votos para hacerlo posible</p>
    <input type="button" class="Btn" onclick="alert('Esta función no está disponible aún');" value="Crear foro" />
</div>
<div id="forums">
<ul>
    <?php
    $forumNames = array( /* Tiene que estar en órden con la consulta hecha en el controlador Forum. Podría hacer un while para rellenar esto pero si tenemos muchos users, estamos al horno */
        'computacion', 'programacion', 'disenografico', 'emprenderismo', 'universidades', 'retro', 'video', 'audio', 'off_topic'
    );
    $forumCounter = 9;
    $i = 0;
    while($i < $forumCounter ) {
        echo '<li>
        <div class="bg" style="background-image:url(\''.base_url().'theme/holanerd/img/forums/'.$forumNames[$i].'.jpg\');animation-duration: '.($forumCounter*10/1.15).'s;"></div>
        <div class="minutes">'.$forums[$i]['minutes'].' m</div>
        <div class="quantity">'.$forums[$i]['topicCounter'].' Posts | <a href="">Ver último</a></div>
        <div class="forumName"><a href="'.base_url().'Forum/open/'.$forums[$i]['slug'].'">'.$forums[$i]['forumName'].'</a></div><!-- Nombre centrado -->
        <div class="subForums">
            <a href="Forum/open/'.$forumNames[$i].'/'.$forums[$i]['subForum1'].'">'.$forums[$i]['subForum1'].'</a> | 
            <a href="Forum/open/'.$forumNames[$i].'/'.$forums[$i]['subForum2'].'">'.$forums[$i]['subForum2'].'</a>';
            if( !empty($forums[$i]['subForum3']) ) { 
                echo ' | <a href="Forum/open/'.$forumNames[$i].'/'.$forums[$i]['subForum3'].'">'.$forums[$i]['subForum3'].'</a>';
            }
        echo '</div>
              </li>';
        $i++;
    }
    ?>
</ul>
</div></div>