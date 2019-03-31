<?php $stats = DB_GET_SIMPLE('stats'); ?>

<div class="stats"><h1>Estadísticas</h1>
        <ul>
                <li><?php echo $stats[0]['cantUsers']; ?> usuarios registrados</li>
                <li><?php echo $stats[0]['cantPosts']; ?> aportes</li>
                <li><?php echo $stats[0]['cantComments']; ?> comentarios</li>
                <li><?php echo $stats[0]['cantMinutes']; ?> horas acumuladas</li>
        </ul>    
</div>