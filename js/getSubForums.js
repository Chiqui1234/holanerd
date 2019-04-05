function changeSubforums() {
    // Cambia los subforos en función del foro elegido.
    // Es de edición manual... pero más rápido que abrir consultas a la BD
    // Y muy útil porque no vamos a crear foros "todos los días", es contenido -prácticamente- estático
    console.log('Obtención de foros activada');
    var forumNameOption = document.getElementById('forum');
    var forumNameIndex = forumNameOption.selectedIndex;
    var selectedForum = forumNameOption.options[forumNameIndex].value;
    var subforumOption = document.getElementById('subforum');

    if ( selectedForum === 'computacion' ) {
        document.getElementById('C').style.display = 'none';
        document.getElementById('Python').style.display = 'none';
        document.getElementById('Web').style.display = 'none';
        document.getElementById('Otros').style.display = 'none';

        document.getElementById('2D').style.display = 'none';
        document.getElementById('3D').style.display = 'none';
        document.getElementById('Animacion').style.display = 'none';
        document.getElementById('Otros').style.display = 'none';

        document.getElementById('Ideas').style.display = 'none';
        document.getElementById('Trabajo').style.display = 'none';
        document.getElementById('Otros').style.display = 'none';

        document.getElementById('UTN').style.display = 'none';
        document.getElementById('UBA').style.display = 'none';
        document.getElementById('UADE').style.display = 'none';
        document.getElementById('Otras').style.display = 'none';

        document.getElementById('Staff').style.display = 'none';
        document.getElementById('Economia').style.display = 'none';
        document.getElementById('Proyectos').style.display = 'none';
        document.getElementById('Ayuda').style.display = 'none';
    }

    if( selectedForum === 'programacion' ) {
        
    }

    if( selectedForum === 'disenografico' ) {
        
    }

    if( selectedForum === 'emprenderismo' ) {
        
    }

    if( selectedForum === 'universidades' ) { 
        
    }

    if( selectedForum === 'off_topic' ) {
        
    }
}