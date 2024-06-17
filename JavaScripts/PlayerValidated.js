window.onload = function() {
    const videoElement = document.getElementById('playVideo');
    const videoContainer = document.getElementById('videoContainer');
    if (videoElement.readyState === 4) {
    } else {
        videoContainer.classList = "text3 center w100p negrita"
        videoContainer.innerHTML = "* EL VIDEO TIENE UN FORMATO INCOMPATIBLE CON NAVEGADORES, NO SE PUEDE REPRODUCIR, DESCARGUELO"
    }
};