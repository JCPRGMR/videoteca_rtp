function filtrarTextbox(inputId, contenedorId) {
    var input = document.getElementById(inputId);
    var contenedor = document.getElementById(contenedorId);
    var labels = contenedor.querySelectorAll('label');
    var ocultarContenedor;

    input.addEventListener('focus', function(){
        contenedor.style.visibility = "visible";
    });
    input.addEventListener('input', function(){
        contenedor.style.visibility = "visible";
    });

    input.addEventListener('focusout', function(){
        ocultarContenedor = setTimeout(function() {
            contenedor.style.visibility = "hidden";
        }, 100); // Se establece un tiempo de espera de 100 milisegundos (ajustable según necesidades)
    });

    input.addEventListener('input', function() {
        var filtro = input.value.trim().toLowerCase();

        labels.forEach(function(label) {
            var texto = label.textContent.trim().toLowerCase();
            if (texto.includes(filtro)) {
                label.style.display = 'block';
            } else {
                label.style.display = 'none';
            }
        });
    });

    labels.forEach(function(label) {
        label.addEventListener('click', function() {
            input.value = label.textContent.trim();
            contenedor.style.visibility = 'hidden';
        });
    });

    input.addEventListener('keydown', function(event) {
        if (event.key === 'Tab' || event.key === 'Enter') {
            event.preventDefault(); // Evita el comportamiento predeterminado de Tab o Enter
            var primerLabelVisible = Array.from(labels).find(label => label.style.display === 'block');
            if (primerLabelVisible) {
                input.value = primerLabelVisible.textContent.trim();
                contenedor.style.visibility = 'hidden';
            }
        }
    });
}
filtrarTextbox("area", "g_area");
filtrarTextbox("tipo","g_tipo");


function LabelToInput(input, labelId){
    document.getElementById(input).value = labelId.textContent
}