<!-- VIEW -->
    <style>
        .author {
            font-style: italic;
            font-weight: bold;
        }
    </style>
<div id="root">
        <!-- Basic buttons -->
        <div id="editBtn"><img src="<?php echo base_url(); ?>theme/holanerd/img/post/pencil.svg" alt="Editar post" onclick="editMode();" /></div>
        <div id="okBtn"><img src="<?php echo base_url(); ?>theme/holanerd/img/post/diskette.jpg" alt="Guardar post" onclick="savePost();" /></div>
        <div id="cancelBtn"><img src="<?php echo base_url(); ?>theme/holanerd/img/post/delete.svg" alt="Cancelar cambios" onclick="viewMode();" /></div>
    
    <form action="<?php echo base_url(); ?>PostCreator/create" method="post" id="postUploader">
    <!-- Starts post container -->
    <div id="postContainer">
            <p><strong>W</strong>hat <strong>Y</strong>ou <strong>S</strong>ee <strong>I</strong>s <strong>W</strong>hat <strong>Y</strong>ou <strong>G</strong>et Nerd Editor.</p>
            <input type="text" id="title" name="title" placeholder="Título del post ❤" onclick="editAdvice()" />
            <img id="liveImage" src="https://adrianalonso.es/wp-content/uploads/2017/05/code.jpg" width="100%" /> <!-- When #image has a valid image URL, it loads inside this <img> -->
            <div id="post" contenteditable="false">
                Bienvenido al creador de posts. Si deseás crear un post, hacé clic en el lápiz de la punta superior derecha.
            </div>
        </div>
        <input type="hidden" id="postCatcher" value="" name="post" required /> <!-- Mediante javascript, capturo el contenido del post -->
        <input type="hidden" id="imageCatcher" value="https://adrianalonso.es/wp-content/uploads/2017/05/code.jpg" name="image" required />
        <div id="bottom">
        <div id="postTools">
            <div id="tools">
                <li onclick="createTitle();">Título</li>
                <li onclick="createParagraph();">Párrafo</li>
                <li onclick="createImage();">Imágen</li>
                <li onclick="createLink();">Link</li>
            </div>
            <input type="text" id="image" placeholder="Portada del post" name="image" /> <!-- La URL de la portada del post -->
        </div>
        <select name="forum" id="forum">
            <option value="computacion" onclick="changeSubforums()">Computación</option>
            <option value="programacion" onclick="changeSubforums()">Programación</option>
            <option value="disenografico" onclick="changeSubforums()">Diseño gráfico</option>
            <option value="audio" onclick="changeSubforums()">Audio</option>
            <option value="video" onclick="changeSubforums()">Video</option>
            <option value="emprenderismo" onclick="changeSubforums()">Emprenderismo</option>
            <option value="universidades" onclick="changeSubforums()">Universidades</option>
            <option value="retro" onclick="changeSubforums()">Retro</option>
            <option value="off_topic" onclick="changeSubforums()">Off-Topic</option>
        </select>

        <select name="subforum" id="subforum">
            <option value="aportes">Aportes</option>
            <option value="preguntas">Preguntas</option>
            <option value="" id="pivot">Aportes</option>
        </select>

        <button name="submit" onclick="submitPost()">Subir post</button>
        </div> <!-- Cierre #bottom -->
    </form>    
        <script>
        // Este script toma el innerHTML de #post, lo almacena en input.hidden#postCatcher y luego hace un submit
        function submitPost() {
            var postValue = document.getElementById('post').innerHTML;
                document.getElementById('postCatcher').value = postValue;
                
            //var titleValue = document.getElementById('title').innerText;
                //document.getElementById('titleCatcher').value = titleValue;
            
            document.getElementById("postUploader").submit();
        }
        </script>  
        <script src="<?php echo base_url(); ?>plug-ins/editor.js"></script>
        <script>document.getElementById("image").addEventListener("input", liveImage); // Al notar un cambio en la URL de la portada, intenta actualizar la imágen del post
        </script>
        <script src="<?php echo base_url(); ?>plug-ins/getSubForums.js"></script>
</div> <!-- Cierre div#root -->