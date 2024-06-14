var PhotoContainer = document.getElementById("PhotoContainer");
var ImgPortrait = document.getElementById("ImgPortrait");

PhotoContainer.onchange = function() {
    var file = PhotoContainer.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            ImgPortrait.src = e.target.result;
            ImgPortrait.style.display = 'block';  // Mostrar la imagen
        };
        reader.readAsDataURL(file);
    }
};