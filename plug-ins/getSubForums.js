function changeSubforums() {
    // Cambia los subforos en función del foro elegido.
    // Es de edición manual... pero más rápido que abrir consultas a la BD
    // Y muy útil porque no vamos a crear foros "todos los días", es contenido -prácticamente- estático
    console.log('Obtención de foros activada');
    var forumNameOption = document.getElementById('forum');
    var forumNameIndex = forumNameOption.selectedIndex;
    var selectedForum = forumNameOption.options[forumNameIndex].value;
    var subforumOption = document.getElementById('subforum');
    var pivot = document.getElementById('pivot'); // Para la tercer opción, que no deberá aparecer siempre

    if ( selectedForum === 'computacion' ) {
        subforumOption.options[0].text = 'Aportes';
        subforumOption.options[1].text = 'Historia';
        subforumOption.options[2].text = 'Retro';
        subforumOption.options[3].text = 'Seguridad';
        subforumOption.options[0].value = 'Aportes'; //
        subforumOption.options[1].value = 'Historia';
        subforumOption.options[2].value = 'Retro';
        subforumOption.options[3].value = 'Seguridad';
        subforumOption.options[3].style.display = 'block';
    }

    if( selectedForum === 'programacion' ) {
        subforumOption.options[0].text = 'C';
        subforumOption.options[1].text = 'Python';
        subforumOption.options[2].text = 'Web';
        subforumOption.options[3].text = 'Otros';
        subforumOption.options[0].value = 'C'; //
        subforumOption.options[1].value = 'Python';
        subforumOption.options[2].value = 'Web';
        subforumOption.options[3].value = 'Otros';
        subforumOption.options[3].style.display = 'block';
    }

    if( selectedForum === 'disenografico' ) {
        subforumOption.options[0].text = '2D';
        subforumOption.options[1].text = '3D';
        subforumOption.options[2].text = 'Animación';
        subforumOption.options[3].text = 'Otros';
        subforumOption.options[0].value = '2D'; //
        subforumOption.options[1].value = '3D';
        subforumOption.options[2].value = 'Animacion';
        subforumOption.options[3].value = 'Otros';
        subforumOption.options[3].style.display = 'block';
    }

    if( selectedForum === 'emprenderismo' ) {
        subforumOption.options[0].text = 'Ideas';
        subforumOption.options[1].text = 'Trabajo';
        subforumOption.options[2].text = 'Otros';
        subforumOption.options[3].text = 'Otros';
        subforumOption.options[0].value = 'Ideas'; //
        subforumOption.options[1].value = 'Trabajo';
        subforumOption.options[2].value = 'Otros';
        subforumOption.options[3].value = 'Otros';
        subforumOption.options[3].style.display = 'none';
    }

    if( selectedForum === 'universidades' ) { 
        subforumOption.options[0].text = 'UTN';
        subforumOption.options[1].text = 'UBA';
        subforumOption.options[2].text = 'UADE';
        subforumOption.options[3].text = 'Otras';
        subforumOption.options[0].value = 'UTN'; //
        subforumOption.options[1].value = 'UBA';
        subforumOption.options[2].value = 'UADE';
        subforumOption.options[3].value = 'Otras';
        subforumOption.options[3].style.display = 'block';
    }

    if( selectedForum === 'off_topic' ) {
        subforumOption.options[0].text = 'Staff';
        subforumOption.options[1].text = 'Economía';
        subforumOption.options[2].text = 'Proyectos';
        subforumOption.options[3].text = 'Ayuda';
        subforumOption.options[0].value = 'Staff'; //
        subforumOption.options[1].value = 'Economia';
        subforumOption.options[2].value = 'Proyectos';
        subforumOption.options[3].value = 'Ayuda';
        subforumOption.options[3].style.display = 'block';
    }
}