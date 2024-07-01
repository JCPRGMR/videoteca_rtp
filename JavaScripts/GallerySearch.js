// alert("consulta arreglada")
var search = document.getElementById("search")
search.addEventListener('input', function(){
    // console.log(search.value)
    var Departamento = search.getAttribute("aria-valuetext")
    var RequestVideo = new XMLHttpRequest()
    var VideoSearchParam = new URLSearchParams({
        Departament: Departamento,
        buscar: search.value
    })
    var tbody = document.getElementById("box_imgs")
    tbody.innerHTML = "";
    RequestVideo.open("POST", "../Php/SearchVideo.php", true);
    RequestVideo.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    RequestVideo.onreadystatechange = function() {
        if (RequestVideo.readyState == 4 && RequestVideo.status == 200) {
            var tabla = JSON.parse(RequestVideo.responseText)
            // console.log(tabla)
            tabla.forEach(element => {
                tbody.innerHTML += /*html*/`
                <div class="relative h250px">
                    <div class="capa txtwhite negrita center p10 border-box">
                        ${element.title}
                    </div>
                    <img src="/videoteca_rtp_programacion_2_img/${element.portrait}" alt="miniatura" width="200" height="250">
                    <form action="Player.php" method="post">
                        <button type="submit" name="ver_video" class="color2 negrita mayus pointer w100p" value="${element.id_video}">Ver</button>
                    </form>
                </div>
                `
                ;
            });
        }
    }
    RequestVideo.send(VideoSearchParam)
})