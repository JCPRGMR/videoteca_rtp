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
    var tbody = document.getElementById("tbody")
    tbody.innerHTML = "";
    RequestVideo.open("POST", "../Php/SearchVideo.php", true);
    RequestVideo.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    RequestVideo.onreadystatechange = function() {
        if (RequestVideo.readyState == 4 && RequestVideo.status == 200) {
            var tabla = JSON.parse(RequestVideo.responseText)
            // console.log(tabla)
            tabla.forEach(element => {
                tbody.innerHTML += /*html*/`
                    <tr class="odd8">
                        <td class="center p10" title="${element.des_area}">${element.des_area}</td>
                        <td class="center p10" title="${element.des_kind}">${element.des_kind}</td>
                        <td class="center p10" title="${element.title}">${element.title}</td>
                        <td class="center p10" title="${element.details}">${element.details}</td>
                        <td class="center p10" title="${element.date_create}">${element.video_create.split(" ")[0]}</td>
                        <td class="center p10">
                            ${(element.path_play != null) ? `
                                <form action="Player.php" method="post">
                                    <button type="submit" name="ver_video" class="color2 negrita mayus" value="${element.id_video}">Ver</button>
                                </form>` : `
                                <form action="Player.php" method="post" class="relative overflow-hidden">
                                    <label for="link_video_${element.id_video}" class="pointer p10 color2 black negrita mayus" aria-valuetext="${element.id_video}">Enlazar</label>
                                    <input type="file" name="link_video" id="link_video_${element.id_video}" class="absolute v-hidden">
                                </form>`
                            }
                        </td>
                    </tr>
                `;
            });
        }
    }
    RequestVideo.send(VideoSearchParam)
})