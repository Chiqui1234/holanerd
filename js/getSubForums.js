function changeSubforums() {
    // Cambia los subforos en función del foro elegido.
    // Es de edición manual... pero más rápido que abrir consultas a la BD
    // Y muy útil porque no vamos a crear foros "todos los días", es contenido -prácticamente- estático

    var forumNameOption = document.getElementById('forum');
    var forumNameIndex = forumNameOption.selectedIndex;
    var selectedForum = forumNameOption.options[forumNameIndex].value;

    var subforumOption = document.getElementById('subforum');

    var pivot = document.getElementById('pivot'); // Para la tercer opción, que no deberá aparecer siempre

    if( selectedForum === 'programacion' || selectedForum === 'computacion'
    || selectedForum === 'diseno-grafico' || selectedForum === 'audio'
    || selectedForum === 'video' ) {
        // Los subforos son: "Aportes" y "Preguntas"
        subforumOption.options[0].text = 'Aportes';
        subforumOption.options[1].text = 'Preguntas';
        subforumOption.options[0].value = 'aportes';
        subforumOption.options[1].value = 'preguntas';
        
        pivot.style.display = "none"; // El pivot desaparece porque no hay tercer opción
    }

    if( selectedForum === 'emprenderismo' ) {
        // Los subforos son: "Ideas", "Preguntas" y "Otras"
        subforumOption.options[0].text = 'Ideas';
        subforumOption.options[1].text = 'Preguntas';
        subforumOption.options[0].value = 'ideas';
        subforumOption.options[1].value = 'preguntas';
        
        pivot.style.display = "block"; // Ahora aparece, porque este foro tiene tercer opción
        pivot.value = 'otras';
        pivot.text = 'Otras';
    }

    if( selectedForum === 'universidades' ) { 
        // Los subforos son: "UBA", "UTN", "Otras"
        subforumOption.options[0].text = 'UBA';
        subforumOption.options[1].text = 'UTN';
        subforumOption.options[0].value = 'uba';
        subforumOption.options[1].value = 'preguntas';

        pivot.style.display = "block"; // Ahora aparece, porque este foro tiene tercer opción
        pivot.value = 'otras';
        pivot.text = 'Otras';
    }
    
    if( selectedForum === 'off-topic' ) {
        // Los subforos son: "Economía/Política" y "Videojuegos"
        subforumOption.options[0].text = 'Economía/Política';
        subforumOption.options[1].text = 'Videojuegos';
        subforumOption.options[0].value = 'economia-politica';
        subforumOption.options[1].value = 'videojuegos';

        pivot.style.display = "none"; // El pivot desaparece porque no hay tercer opción
    }
}