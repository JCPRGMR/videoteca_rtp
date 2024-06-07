var search = document.getElementById("search")
// alert(6)
search.addEventListener('input', function(){
    // console.log(search.value)
    var RequestVideo = new XMLHttpRequest()
    var VideoSearchParam = new URLSearchParams({
        Departament: "PRENSA",
        buscar: search.value
    })
    RequestVideo.open("POST", "../Php/SearchVideo.php", true);
    RequestVideo.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    RequestVideo.onreadystatechange = function() {
        if (RequestVideo.readyState == 4 && RequestVideo.status == 200) {
            var tabla = JSON.parse(RequestVideo.responseText)
            console.log(search.value)
        }
    }
    RequestVideo.send(VideoSearchParam)
})