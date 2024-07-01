// alert('Cambios XD')
var d_video = document.getElementById("d_video")
// var valor = d_video.getAttribute('aria-valuetext')
d_video.addEventListener("click", function(){
    // alert(valor)
    var paraDescargar = new URLSearchParams({cod_video: d_video.getAttribute('aria-valuetext')}).toString();
    var requestDOwnload = new XMLHttpRequest()
    requestDOwnload.open("POST", "../Php/DownloadH.php", true)
    requestDOwnload.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    requestDOwnload.onreadystatechange = function() {
        if (requestDOwnload.readyState == 4 && requestDOwnload.status == 200) {
            // var response = JSON.parse(requestDOwnload.responseText)
        //    console.log(response)
        }
    }
    requestDOwnload.send(paraDescargar)
})