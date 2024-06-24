// alert("Se creo el editar con el")
var FormularioEditar = document.getElementById("FormularioEditar")
btnEditar.addEventListener("click", function(){
    const [
        btnEditar,
        btnGroupFinal,
        FormularioEditar,
        
        descripcion,
        detalle,
        area,
        tipo,
        fecha_evento,
        mainconteiner,
    ] = [
        "btnEditar",
        "btnGroupFinal",
        "FormularioEditar",
        
        "descripcion",
        "detalle",
        "area",
        "tipo",
        "fecha_evento",
        "mainconteiner",
    ].map(id => document.getElementById(id) || null)

    btnEditar.style.visibility = "hidden"
    btnEditar.style.width = "0px"

    FormularioEditar.action = "../Php/VideoEdit.php"
    descripcion.readOnly = false
    detalle.readOnly = false
    area.readOnly = false
    tipo.readOnly = false
    
    fecha_evento.readOnly = false

    descripcion.classList = "negrita fz15 p10"
    detalle.classList = "p10"
    area.classList = "p10"
    tipo.classList = "p10"
    fecha_evento.classList = "p10"

    cargarScript('../JavaScripts/Select.js', function() {
        if (typeof funcionDesdeSelect === 'function') {
            funcionDesdeSelect();
        }
    })
    btnGroupFinal.innerHTML += /*html*/`
        <button type="submit" name="id_video" id="Editar" class="p10 color2 negrita mayus center br10 pointer" value="${btnEditar.getAttribute("aria-valuetext")}">
            Guardar cambios
        </button>`
})
function cargarScript(url, callback) {
    var script = document.createElement('script');
    script.src = url;
    script.onload = callback;
    document.head.appendChild(script);
}