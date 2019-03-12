<!-- VIEW -->
<style>
        .author {
            font-style: italic;
            font-weight: bold;
        }
    </style>
<div id="root">
    <form action="<?php echo base_url(); ?>PostCreator/create" method="post" id="postUploader">
        <input type="hidden" id="postCatcher" value="" name="post" required /> <!-- Mediante javascript, capturo el contenido del post -->
        <input type="hidden" id="titleCatcher" value="" name="title" required /> <!-- Mediante javascript, capturo el título del post -->
        <!-- VALORES DE PRUEBA -->
        <select name="forum" id="forum">
            <option value="computacion" onclick="changeSubforums()">Computación</option>
            <option value="programacion" onclick="changeSubforums()">Programación</option>
            <option value="disenografico" onclick="changeSubforums()">Diseño gráfico</option>
            <option value="audio" onclick="changeSubforums()">Audio</option>
            <option value="video" onclick="changeSubforums()">Video</option>
            <option value="emprenderismo" onclick="changeSubforums()">Emprenderismo</option>
            <option value="universidades" onclick="changeSubforums()">Universidades</option>
            <option value="retro" onclick="changeSubforums()">Retro</option>
            <option value="off-topic" onclick="changeSubforums()">Off-Topic</option>
        </select>

        <select name="subforum" id="subforum">
            <option value="aportes">Aportes</option>
            <option value="preguntas">Preguntas</option>
            <option value="" id="pivot">Aportes</option>
        </select>

        <input type="text" placeholder="Portada de tu post" id="image" name="image" required />

        <div id="submitPost"><button name="submit" onclick="submitPost()">Subir post</button></div>
    </form>

<div data-editable data-name="main-content">
    <h1 id="title" data-editable>Título del post acá</h1>
</div>

<div id="post" data-editable data-name="main-content">
    <p data-editable>Mirá el lápiz en la punta superior izquierda de tu pantalla <strong>y divertite</strong>.</p>
    <p data-editable>Hay muchas maneras de crear un post, pero sencillamente ésta es la mejor. Borrá este texto y comenzá a escribir tu brainstorm.</p>
    <blockquote title="Always code as if the guy who ends up maintaining your code will be a violent psychopath who knows where you live.">
        Siempre escribí tu código cómo si el programador que lo va a mantener es un psicópata violento que sabe dónde vivís
    </blockquote>
    <p>~ <i>John F. Woods</i></p>
</div>
    
    <script>
        // Este script toma el innerHTML de #post, lo almacena en input.hidden#postCatcher y luego hace un submit
        function submitPost() {
            var postValue = document.getElementById('post').innerHTML;
                document.getElementById('postCatcher').value = postValue;
                
            var titleValue = document.getElementById('title').innerText;
                document.getElementById('titleCatcher').value = titleValue;
            
            document.getElementById("postUploader").submit();
        }
    </script>
    <script src="<?php echo base_url(); ?>plug-ins/get-content-tools/content-tools.js"></script>
    <script src="<?php echo base_url(); ?>plug-ins/get-content-tools/sandbox.js"></script>
    <script src="<?php echo base_url(); ?>js/getSubForums.js"></script>
</div> <!-- Cierre div#root