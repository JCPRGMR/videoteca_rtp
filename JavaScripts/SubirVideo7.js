window.onload = function() {
    let btnSubirVideo = document.getElementById("subirVideo");
    btnSubirVideo.onclick = function() {
        alert("Espere para que el video Termine de subirse")
        let Video = document.getElementById("VideoContainer")
        let f = Video.files[0];

        var SendParams = new URLSearchParams({
            area: document.getElementById("area").value,
            tipo: document.getElementById("tipo").value,
            fecha: document.getElementById("fecha").value,
            descripcion: document.getElementById("descripcion").value,
            detalles: document.getElementById("detalles").value,
            departamento: "PRENSA"
        }).toString();
        
        var xhr = new XMLHttpRequest();
        xhr.open("POST", '../Php/PressUpload.php', false);
        xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                servicioFile({
                    url: "../Php/GuardarVideo.php",
                    type: "post",
                    responseType: "text",
                    mbEnvio: 3,
                    file: f,
                    name: response.cod_video
                }).then(function(d) {
                    if (d === "OK") {  
                        alert("Video Subido Correctamente")
                    } else {
                        console.log('Error al subir el archivo')
                    }
                });
            }
        };
        xhr.send(SendParams);        

    }
}
var servicioFile = function(obj) {
    var inicio = 0,
        archivo = obj.file,
        size = 1024 * 1024 * (obj.mbEnvio === undefined ? 20 : obj.mbEnvio),
        longitud = archivo.size,
        fin = size,
        blob = new Blob([archivo]),
        bloque = blob.slice(inicio, fin),
        archivoGrabar = (obj.ruta === undefined ? obj.name + '.' + archivo.name.split('.').pop() : obj.ruta),
        estado = "";

    var upload = function(obj) {
        return new Promise(function(resolve, reject) {
            var req = new XMLHttpRequest();
            var ur = "";
            obj.type = (obj.type ? obj.type : "Post");
            obj.responseType = (obj.responseType ? obj.responseType.toLowerCase() : "text");
            req.open(obj.type, ur + obj.url, true);
            req.setRequestHeader("archivo", archivoGrabar);
            req.setRequestHeader("contador", inicio);
            req.onload = function() {
                if (req.status == 200) {
                    switch (obj.responseType) {
                        case "":
                        case "document":
                        case "text":
                            resolve(req.response);
                            break;
                        case "blob":
                            resolve(req.response);
                            break;
                        case "arraybuffer":
                            resolve(req.response);
                            break;
                        case "json":
                            resolve(JSON.parse(req.response));
                            break;
                    }
                } else {
                    reject(req.statusText);
                }
            };
            req.onerror = function() {
                console.error("Network Error");
            };
            req.send((bloque ? bloque : null));
        });
    }

    function resultado(d) {
        if (d !== "") {
            inicio = fin;
            fin = inicio + size;
            if (inicio < longitud) {
                bloque = blob.slice(inicio, fin);
                upload(obj).then(resultado);
            } else {
                var PathSend = new URLSearchParams({
                    path: obj.name.toUpperCase() + '.' + archivo.name.split('.').pop(),
                    cod_video: obj.name,
                    name: archivo.name
                }).toString();
                var RequestPath = new XMLHttpRequest()
                RequestPath.open("POST", "../Php/UpdatePath.php", true)
                RequestPath.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
                RequestPath.onreadystatechange = function() {
                    if (RequestPath.readyState == 4 && RequestPath.status == 200) {
                        console.log("Fila actualizada")
                    }
                }
                RequestPath.send(PathSend)
                estado = "OK";
            }
        } else {
            estado = "Error";
        }
    }

    return new Promise(function(resolve, reject) {
        upload(obj).then(resultado);

        var hilo = setInterval(function() {
            if (estado === "OK") {
                clearInterval(hilo);
                resolve(estado);
            }
            if (estado === "Error") {
                clearInterval(hilo);
                reject(estado);
            }
        }, 100);
    });
}