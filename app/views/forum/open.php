<div id="root"><div id="postsOfTheForums">
<ul>
    
<?php
$i = 0;
$flag = false;
while( isset($postsOfTheForum[$i]) ) {
    $flag = true;
    echo '<li>
    <div id="avatar"></div>
    <div id="data">
        <div id="importantBlock">
            <div class="title"><a href="'.base_url().'Post/index/'.$forumSlug.'/'.$postsOfTheForum[$i]['subForum'].'/'.$postsOfTheForum[$i]["slug"].'">'.$postsOfTheForum[$i]["title"].'</a></div>
            <!--<div class="content"><p>'.strip_tags($postsOfTheForum[$i]["content"], "<strong>").'</p></div>-->
        </div>
    </div>
</li>';
$i++;
}
if(!$flag) {
    echo '<p>Por ahora, no hay posteos por acá.</p>';
}
?>
</ul>
</div></div>