// alert(1)
var EnlazarVideo = document.getElementById("EnlazarVideo")
var VideoContainer = document.getElementById("VideoContainer")
var subirenlace = document.getElementById("subirenlace")

subirenlace.onclick = function(){
    if(VideoContainer.value.length > 0){
        let archivo = VideoContainer.value.files[0]

        var PathSend = new URLSearchParams({
            area: document.getElementById("area").value,
            tipo: document.getElementById("tipo").value,
            fecha: document.getElementById("fecha_vencimiento").value,
            descripcion: document.getElementById("titulo").value,
            detalles: document.getElementById("detalles").value,
            departamento: "PROGRAMACION",
            file: VideoContainer.value,
            path_file: VideoContainer.value,

            nro_agreement: document.getElementById("nro_contrato").value,
            agreement: document.getElementById("proveedor").value,
            agreement_expiration: document.getElementById("fecha_vencimiento").value,
            video_update: archivo
        }).toString()
        var RequestPath = new XMLHttpRequest()
        RequestPath.open("POST", "../Php/UpgradeLink.php", true)
        RequestPath.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
        RequestPath.onreadystatechange = function() {
            if (RequestPath.readyState == 4 && RequestPath.status == 200) {
                var response = JSON.parse(RequestPath.responseText)
                window.history.back()
            }
        }
        RequestPath.send(PathSend)
    }
}