var EliminarVideo = document.getElementById("EliminarVideo");
var deleteForm = document.getElementById("deleteForm");

EliminarVideo.onclick = function(event) {
    var resultado = confirm("¿Estás seguro de eliminar los datos del video permanentemente?");
    if (resultado) {
        deleteForm.submit();
    } else {
        event.preventDefault();
    }
};
