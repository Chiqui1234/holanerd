/*                                          DEV: SANTIAGO GIMENEZ                                         */
/*  This script is only for editor features -->  You won't find any AJAX Query or other kind of interaction.
    That's in queries.js 😁
    Features:
    - Add items
    - Remove items
    - Control over that items
*/
console.log('Editor started');

var editModeVar = false; // Flag. Controls and activate the edit mode of the script
var draftSaved = false;
function getSelectedText() { // Get selected test
    var text = "";
    if (window.getSelection) {
        text = window.getSelected().toString();
    } else if (document.selection && document.selection.type != "Control") { // For IE 8 and earlier
        text = document.selection.createRange().text;
    }
    return text;
}
function liveImage() { // Loads #image URL into #liveImage
    var image = document.getElementById('image').value;
    document.getElementById('liveImage').src = image;
    console.info('liveImage()');
}
function createTitle() { // Create code for titles
    let title = prompt('Nuevo título');
    let newTitle = '<h2>'+title+'</h2>';
    document.getElementById('post').innerHTML += newTitle;
}
function createParagraph() {
    let newParagraph = '<p>Nuevo párrafo.</p>';
    document.getElementById('post').innerHTML += newParagraph;
}
function createImage() {
    let url = prompt('Link a la imágen');
    let newImage = '<img src="'+url+'" width="100%" alt="No se cargó la imágen" />';
    document.getElementById('post').innerHTML += newImage;
}
function createLink() { // Create a link
    let url = prompt('Agregá un link');
    let urlName = prompt('Agregá el nombre del link (omití si querés que se muestre la dirección)');
    let newLink = '<a href="'+url+'" title="'+urlName+'">'+urlName+'</a>';
    document.getElementById('post').innerHTML += newLink;
}
function editMode() { // Activates edit mode
    console.log('User enters to editMode');
    editModeVar = true;
    document.getElementById('post').contentEditable = true;
    document.getElementById('image').style.display = 'block';
    document.getElementById('editBtn').style.display = 'none';
    document.getElementById('bottom').style.display = 'block';
    document.getElementById('postTools').style.display = 'block';
    document.getElementById('okBtn').style.display = 'block';
    document.getElementById('cancelBtn').style.display = 'block';
}
function viewMode() { // Activates view mode
    editModeVar = false;
    document.getElementById('post').contentEditable = false;
    document.getElementById('image').style.display = 'none';
    document.getElementById('editBtn').style.display = 'block';
    document.getElementById('bottom').style.display = 'none';
    document.getElementById('postTools').style.display = 'none';
    document.getElementById('okBtn').style.display = 'none';
    document.getElementById('cancelBtn').style.display = 'none';
}
function editAdvice() { // If the user start with a title but isn't in edit mode...
    console.log('editAdvice();');
    if(!editModeVar) {
        alert('Para comenzar a crear el post, hacé clic en el lápiz de la punta superior derecha');
    }
}
function savePost(mode) { // mode = 'auto' or 'byUser'?
    alert('En algún momento, podrías guardar borradores. Esto evita pérdida de datos frente a cortes de luz o similar. ¡Actualmente estamos trabajando en ello! Para subir el post, andá al botón "Subir post" de más abajo ;)');
    if(mode === 'auto') { // Automatic saving

    }
    if(mode === 'byUser') { // Saved by user

    }
}
viewMode(); // Default (main) mode. You can call editMode() when the user need edit content of the post