// alert(1)
var EnlazarVideo = document.getElementById("EnlazarVideo");
var VideoContainer = document.getElementById("VideoContainer");
var subirenlace = document.getElementById("subirenlace");
subirenlace.onclick = function() {
    let archivo = document.getElementById("PhotoContainer").files[0];
    if(VideoContainer.value.length > 0  && document.getElementById("area").value.length > 0 && document.getElementById("tipo").value.length > 0 && archivo){
        let formData = new FormData();
        formData.append("area", document.getElementById("area").value);
        formData.append("tipo", document.getElementById("tipo").value);
        formData.append("fecha", document.getElementById("fecha_vencimiento").value);
        formData.append("descripcion", document.getElementById("titulo").value);
        formData.append("detalles", document.getElementById("detalles").value);
        formData.append("departamento", "PROGRAMACION");
        formData.append("file", VideoContainer.value);
        formData.append("path_file", VideoContainer.value);
        formData.append("nro_agreement", document.getElementById("nro_contrato").value);
        formData.append("agreement", document.getElementById("proveedor").value);
        formData.append("agreement_expiration", document.getElementById("fecha_vencimiento").value);
        formData.append("img_update", archivo);
    
        var RequestPath = new XMLHttpRequest();
        RequestPath.open("POST", "../Php/UpgradeLink.php", true);
        RequestPath.onreadystatechange = function() {
            if (RequestPath.readyState == 4 && RequestPath.status == 200) {
                var response = JSON.parse(RequestPath.responseText);
                window.history.back();
            }
        };
        RequestPath.send(formData);
    }else{
        alert('llene los campos obligatorios')
    }
}
