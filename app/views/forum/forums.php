<div id="rootExtended">
<ul>
    <li><!-- Computación -->
        <div class="bg" style="background-image:url('<?php echo base_url(); ?>/theme/holanerd/img/forums/computacion.jpg');animation-duration: 35s;"></div>
        <div class="minutes"><?php echo $forums[0]['minutes']; ?> m</div>
        <div class="quantity"><?php echo $forums[0]['topicCounter']; ?> Posts | <a href="">Ver último</a></div>
        <div class="forumName"><a href="<?php echo $forums[0]['slug']; ?>"><?php echo $forums[0]['forumName']; ?></a></div><!-- Nombre centrado -->
        <div class="subForums">
            <a href="Forum/computacion/<?php echo $forums[0]['subForum1']; ?>"><?php echo $forums[0]['subForum1']; ?></a> |
            <a href="Forum/computacion/<?php echo $forums[0]['subForum2']; ?>"><?php echo $forums[0]['subForum2']; ?></a>
            <?php if( !empty($forums[0]['subForum3']) ) { echo '| <a href="Forum/computacion/'.$forums[0]['subForum3'].'">'.$forums[0]['subForum3'].'</a>'; } ?>
        </div>
    </li>
    
    <li><!-- Programación -->
        <div class="bg" style="background-image:url('<?php echo base_url(); ?>/theme/holanerd/img/forums/programacion.jpg');animation-duration: 40s;"></div>
        <div class="minutes"><?php echo $forums[1]['minutes']; ?> m</div>
        <div class="quantity"><?php echo $forums[1]['topicCounter']; ?> Posts | <a href="">Ver último</a></div>
        <div class="forumName"><a href="<?php echo $forums[1]['slug']; ?>"><?php echo $forums[1]['forumName']; ?></a></div><!-- Nombre centrado -->
        <div class="subForums">
            <a href="Forum/programacion/<?php echo $forums[1]['subForum1']; ?>"><?php echo $forums[1]['subForum1']; ?></a> |
            <a href="Forum/programacion/<?php echo $forums[1]['subForum2']; ?>"><?php echo $forums[1]['subForum2']; ?></a>
            <?php if( !empty($forums[1]['subForum3']) ) { echo '| <a href="Forum/programacion/'.$forums[1]['subForum3'].'">'.$forums[1]['subForum3'].'</a>'; } ?>
        </div>
    </li>

    <li><!-- Diseño Gráfico -->
        <div class="bg" style="background-image:url('<?php echo base_url(); ?>/theme/holanerd/img/forums/disenoGrafico.jpg');animation-duration: 30s;"></div>
        <div class="minutes"><?php echo $forums[2]['minutes']; ?> m</div>
        <div class="quantity"><?php echo $forums[2]['topicCounter']; ?> Posts | <a href="">Ver último</a></div>
        <div class="forumName"><a href="<?php echo $forums[2]['slug']; ?>"><?php echo $forums[2]['forumName']; ?></a></div><!-- Nombre centrado -->
        <div class="subForums">
            <a href="Forum/disenoGrafico/<?php echo $forums[2]['subForum1']; ?>"><?php echo $forums[2]['subForum1']; ?></a> |
            <a href="Forum/disenoGrafico/<?php echo $forums[2]['subForum2']; ?>"><?php echo $forums[2]['subForum2']; ?></a>
            <?php if( !empty($forums[2]['subForum3']) ) { echo '| <a href="Forum/disenoGrafico/'.$forums[2]['subForum3'].'">'.$forums[2]['subForum3'].'</a>'; } ?>
        </div>
    </li>

    <li><!-- Emprenderismo -->
        <div class="bg" style="background-image:url('<?php echo base_url(); ?>/theme/holanerd/img/forums/emprenderismo.jpg');animation-duration: 42s;"></div>
        <div class="minutes"><?php echo $forums[3]['minutes']; ?> m</div>
        <div class="quantity"><?php echo $forums[3]['topicCounter']; ?> Posts | <a href="">Ver último</a></div>
        <div class="forumName"><a href="<?php echo $forums[3]['slug']; ?>"><?php echo $forums[3]['forumName']; ?></a></div><!-- Nombre centrado -->
        <div class="subForums">
            <a href="Forum/emprenderismo/<?php echo $forums[3]['subForum1']; ?>"><?php echo $forums[3]['subForum1']; ?></a> |
            <a href="Forum/emprenderismo/<?php echo $forums[3]['subForum2']; ?>"><?php echo $forums[3]['subForum2']; ?></a>
            <?php if( !empty($forums[3]['subForum3']) ) { echo '| <a href="Forum/emprenderismo/'.$forums[3]['subForum3'].'">'.$forums[3]['subForum3'].'</a>'; } ?>
        </div>
    </li>

    <li><!-- Universidades -->
        <div class="bg" style="background-image:url('<?php echo base_url(); ?>/theme/holanerd/img/forums/universidades.jpg');animation-duration: 32s;"></div>
        <div class="minutes"><?php echo $forums[4]['minutes']; ?> m</div>
        <div class="quantity"><?php echo $forums[4]['topicCounter']; ?> Posts | <a href="">Ver último</a></div>
        <div class="forumName"><a href="<?php echo $forums[4]['slug']; ?>"><?php echo $forums[4]['forumName']; ?></a></div><!-- Nombre centrado -->
        <div class="subForums">
            <a href="Forum/universidades/<?php echo $forums[4]['subForum1']; ?>"><?php echo $forums[4]['subForum1']; ?></a> |
            <a href="Forum/universidades/<?php echo $forums[4]['subForum2']; ?>"><?php echo $forums[4]['subForum2']; ?></a>
            <?php if( !empty($forums[4]['subForum3']) ) { echo '| <a href="Forum/universidades/'.$forums[4]['subForum3'].'">'.$forums[4]['subForum3'].'</a>'; } ?>
        </div>
    </li>

    <li><!-- Retro/Vintage -->
        <div class="bg" style="background-image:url('<?php echo base_url(); ?>/theme/holanerd/img/forums/retro.jpg');animation-duration: 48s;"></div>
        <div class="minutes"><?php echo $forums[5]['minutes']; ?> m</div>
        <div class="quantity"><?php echo $forums[5]['topicCounter']; ?> Posts | <a href="">Ver último</a></div>
        <div class="forumName"><a href="<?php echo $forums[5]['slug']; ?>"><?php echo $forums[5]['forumName']; ?></a></div><!-- Nombre centrado -->
        <div class="subForums">
            <a href="Forum/retro/<?php echo $forums[5]['subForum1']; ?>"><?php echo $forums[5]['subForum1']; ?></a> |
            <a href="Forum/retro/<?php echo $forums[5]['subForum2']; ?>"><?php echo $forums[5]['subForum2']; ?></a>
            <?php if( !empty($forums[5]['subForum3']) ) { echo '| <a href="Forum/retro/'.$forums[5]['subForum3'].'">'.$forums[5]['subForum3'].'</a>'; } ?>
        </div>
    </li>

    <li><!-- Off-topic -->
        <div class="bg" style="background-image:url('<?php echo base_url(); ?>/theme/holanerd/img/forums/off-topic.jpg');animation-duration: 30s;"></div>
        <div class="minutes"><?php echo $forums[6]['minutes']; ?> m</div>
        <div class="quantity"><?php echo $forums[6]['topicCounter']; ?> Posts | <a href="">Ver último</a></div>
        <div class="forumName"><a href="<?php echo $forums[6]['slug']; ?>"><?php echo $forums[6]['forumName']; ?></a></div><!-- Nombre centrado -->
        <div class="subForums">
            <a href="Forum/off-topic/<?php echo $forums[6]['subForum1']; ?>"><?php echo $forums[6]['subForum1']; ?></a> |
            <a href="Forum/off-topic/<?php echo $forums[6]['subForum2']; ?>"><?php echo $forums[6]['subForum2']; ?></a>
            <?php if( !empty($forums[6]['subForum3']) ) { echo '| <a href="Forum/off-topic/'.$forums[6]['subForum3'].'">'.$forums[6]['subForum3'].'</a>'; } ?>
        </div>
    </li>
</ul>
</div>