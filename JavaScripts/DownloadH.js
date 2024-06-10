var d_video = document.getElementById("d_video")

d_video.addEventListener("click", function(){
    var PathSend = new URLSearchParams({cod_video: d_video.getAttribute('aria-valuetext'),}).toString();
    var RequestPath = new XMLHttpRequest()
    RequestPath.open("POST", "../Php/DownloadH.php", true)
    RequestPath.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    RequestPath.onreadystatechange = function() {
        if (RequestPath.readyState == 4 && RequestPath.status == 200) {
           console.log("Se ingreso al servidor")
        }
    }
    RequestPath.send(PathSend)
})