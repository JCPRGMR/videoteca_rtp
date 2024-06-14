// alert(1)
var EnlazarVideo = document.getElementById("EnlazarVideo")
var VideoContainer = document.getElementById("VideoContainer")
var subirenlace = document.getElementById("subirenlace")

subirenlace.onclick = function(){
    if(VideoContainer.value.length > 0){
        var PathSend = new URLSearchParams({
            area: document.getElementById("area").value,
            tipo: document.getElementById("tipo").value,
            fecha: document.getElementById("fecha").value,
            descripcion: document.getElementById("descripcion").value,
            detalles: document.getElementById("detalles").value,
            departamento: "PRENSA",
            file: VideoContainer.value,
            path_file: VideoContainer.value
        }).toString()
        var RequestPath = new XMLHttpRequest()
        RequestPath.open("POST", "../Php/UpgradeLink.php", true)
        RequestPath.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
        RequestPath.onreadystatechange = function() {
            if (RequestPath.readyState == 4 && RequestPath.status == 200) {
                var response = JSON.parse(RequestPath.responseText)
                window.history.back()
                // console.log(response)
            }
        }
        RequestPath.send(PathSend)
    }
}