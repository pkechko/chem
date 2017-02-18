
//console.log(saved.x);
function setCamera(saved) {
    camera.parent.position.x =saved.x;
    camera.parent.position.y =saved.y;
    camera.parent.position.z =saved.z;
    console.log(camera.parent.position);
}