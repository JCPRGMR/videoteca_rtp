// alert(1)
var EnlazarVideo = document.getElementById("EnlazarVideo")
var VideoContainer = document.getElementById("VideoContainer")
var filecontainer = document.getElementById("filecontainer")
var subirenlace = document.getElementById("subirenlace")

EnlazarVideo.onclick = function(){
    EnlazarVideo.disabled = true
    filecontainer.innerHTML = /*html*/`
    <label for="" class="negrita mayus">Enlazar video</label>
    <input type="search" name="" id="file" placeholder="Escriba o copie la ruta de archivo" class="p10 br5">`
    subirenlace.disabled = false
}

subirenlace.onclick = function(){
    var file = document.getElementById("file")
    alert(file.value)
    if(file.value.length > 0){
        var PathSend = new URLSearchParams({
            area: document.getElementById("area").value,
            tipo: document.getElementById("tipo").value,
            fecha: document.getElementById("fecha").value,
            descripcion: document.getElementById("descripcion").value,
            detalles: document.getElementById("detalles").value,
            departamento: "PRENSA",
            file: file.value
        }).toString()
        var RequestPath = new XMLHttpRequest()
        RequestPath.open("POST", "../Php/UpgradeLink.php", true)
        RequestPath.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
        RequestPath.onreadystatechange = function() {
            if (RequestPath.readyState == 4 && RequestPath.status == 200) {
                var response = JSON.parse(RequestPath.responseText)
                console.log(response)
            }
        }
        RequestPath.send(PathSend)
    }
}