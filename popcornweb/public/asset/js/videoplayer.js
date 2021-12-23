
var vid = document.getElementById("player");
function playFullVid(){

    if (vid.requestFullscreen) {
        vid.requestFullscreen();
    }
    else if (vid.msRequestFullscreen) {
        vid.msRequestFullscreen();
    } else if (vid.mozRequestFullScreen) {
        vid.mozRequestFullScreen();
    } else if (vid.webkitRequestFullscreen) {
        vid.webkitRequestFullscreen();
    }
    vid.play();
}
