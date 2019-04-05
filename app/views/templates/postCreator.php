<!-- VIEW -->
    <style>
        .author {
            font-style: italic;
            font-weight: bold;
        }
    </style>
<div id="root">
        <!-- Basic buttons -->
        <div id="editBtn"><img src="<?php echo base_url(); ?>theme/img/post/pencil.svg" alt="Editar post" onclick="editMode();" /></div>
        <div id="okBtn"><img src="<?php echo base_url(); ?>theme/img/post/diskette.jpg" alt="Guardar post" onclick="savePost();" /></div>
        <div id="cancelBtn"><img src="<?php echo base_url(); ?>theme/img/post/delete.svg" alt="Cancelar cambios" onclick="viewMode();" /></div>
    
    <!-- Starts post container -->
    <div id="postContainer">
    <p><strong>W</strong>hat <strong>Y</strong>ou <strong>S</strong>ee <strong>I</strong>s <strong>W</strong>hat <strong>Y</strong>ou <strong>G</strong>et Nerd Editor.</p>
    <form action="<?php echo base_url(); ?>PostCreator/create" method="post" id="postUploader">
            <input type="text" id="title" name="title" placeholder="Título del post ❤" onclick="editAdvice()" />
            <img id="liveImage" src="https://adrianalonso.es/wp-content/uploads/2017/05/code.jpg" width="100%" /> <!-- When #image has a valid image URL, it loads inside this <img> -->
            <input type="text" id="image" placeholder="Portada del post" name="image" /> <!-- La URL de la portada del post -->
            <div id="post" contenteditable="false">
                <p>Bienvenido al creador de posts. Si deseás crear un post, hacé clic en el lápiz de la punta superior derecha.</p>
            </div>
        </div>
        <input type="hidden" id="postCatcher" value="" name="post" required /> <!-- Mediante javascript, capturo el contenido del post -->
        <input type="hidden" id="imageCatcher" value="https://adrianalonso.es/wp-content/uploads/2017/05/code.jpg" name="image" required />
        <input type="hidden" id="forumName" value="computacion" name="forumNameInput" required /> <!-- Mediante javascript, capturo el foro a dónde va el post -->
        <input type="hidden" id="subforumName" value="Aportes" name="subforumNameInput" required /> <!-- Mediante javascript, capturo el subforo a dónde va el post -->
        <div id="bottom">
        <div id="postTools">
            <div id="tools">
                <li onclick="createTitle();">Título</li>
                <li onclick="createParagraph();">Párrafo</li>
                <li onclick="createImage();">Imágen</li>
                <li onclick="createLink();">Link</li>
            </div>
        </div>

        <select id="forum" name="forum" onchange="changeSubforums();">
            <!-- Computación -->
            <option value="computacion:Aportes" id="Aportes">Computación : Aportes</option>
            <option value="computacion:Preguntas" id="Historia">Computación : Historia</option>
            <option value="computacion:Retro" id="Retro">Computación : Retro</option>
            <option value="computacion:Seguridad" id="Seguridad">Computación : Seguridad</option>
            <!-- Programación -->
            <option value="programacion:C" id="C">Programación :  C</option>
            <option value="programacion:Python" id="Python">Programación :  Python</option>
            <option value="programacion:Web" id="Web">Programación : Web</option>
            <option value="programacion:Otros" id="Otros">Programación : Otros</option>
            <!-- Diseño gráfico -->
            <option value="disenografico:2D" id="2D">Diseño Gráfico : 2D</option>
            <option value="disenografico:3D" id="3D">Diseño Gráfico : D</option>
            <option value="disenografico:Animacion" id="Animacion">Diseño Gráfico : Animación</option>
            <option value="disenografico:Otros" id="Otros">Diseño Gráfico : Otros</option>
            <!-- Emprenderismo --> 
            <option value="emprenderismo:Ideas" id="Ideas">Emprenderismo : Ideas</option>
            <option value="emprenderismo:Trabajo" id="Trabajo">Emprenderismo : Trabajo</option>
            <option value="emprenderismo:Otros" id="Otros">Emprenderismo : Otros</option>
            <!-- Universidades --> 
            <option value="universidades:UTN" id="UTN">Universidades : UTN</option>
            <option value="universidades:UBA" id="UBA">Universidades : UBA</option>
            <option value="universidades:UADE" id="UADE">Universidades : UADE</option>
            <option value="universidades:Otras" id="Otras">Universidades : Otras</option>
            <!-- Off-Topic --> 
            <option value="off_topic:Staff" id="Staff">Off-topic : Staff</option>
            <option value="off_topic:Economia" id="Economia">Off-topic : Economía</option>
            <option value="off_topic:Proyectos" id="Proyectos">Off-topic : Proyectos</option>
            <option value="off_topic:Ayuda" id="Ayuda">Off-topic : Ayuda</option>
        </select>

        <button name="submit" onclick="submitPost()">Subir post</button>
        <!--<input type="submit" onclick="submitPost();" value="Subir post" />-->
        </div> <!-- Cierre #bottom -->
    </form>    
        <script src="<?php echo base_url(); ?>js/editor.js?version=1"></script>
        <script>
        function submitPost() { // Este script toma el innerHTML de #post, lo almacena en input.hidden#postCatcher y luego hace un submit
            var postValue = document.getElementById('post').innerHTML;
            document.getElementById('postCatcher').value = postValue;
            document.getElementById("postUploader").submit();
        }
        function changeSubforums() { // Cambia el foro y subforo según decisión del usuario
            var forumName = document.getElementById('forum');
            var forumNameIndex = document.getElementById('forum').selectedIndex;
            var forumNameValue = forumName.options[forumNameIndex].value;
            var data = forumNameValue.split(":"); // [0] = forum | [1] = subforum
            
            document.getElementById('forumName').value = data[0];
            document.getElementById('subforumName').value = data[1];
            
            console.info(document.getElementById('forumName').value);
            console.info(document.getElementById('subforumName').value);
        }
        document.getElementById('image').addEventListener('input', liveImage); // Al notar un cambio en la URL de la portada, intenta actualizar la imágen del post
        </script>
        
</div> <!-- Cierre div#root -->