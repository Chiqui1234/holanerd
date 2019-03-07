<div id="sidebar"> <!-- Empieza sidebar -->
    <div id="miniProfile">
        <div class="avatar" style="background-image: url(<?php echo $authorData[0]['avatar']; ?>);"></div>
        <div class="username"><a href="<?php echo base_url(); ?>Profile/Search/<?php echo $authorData[0]['username']; ?>" title="<?php echo $rank; ?>">@<?php echo $authorData[0]['username']; ?></a></div>
        <div class="points"><?php echo $authorData[0]['points']; ?> puntos</div>
        <div class="createdAt"><?php echo $authorData[0]['created_at']; ?></div>

            <div id="profiles">
                <a href="<?php echo $authorData[0]['git']; ?>"></a>
                <a href="<?php echo $authorData[0]['linkedin']; ?>"></a>
                <a href="<?php echo $authorData[0]['web']; ?>"></a>
            </div>
    </div>
</div> <!-- Termina sidebar -->
