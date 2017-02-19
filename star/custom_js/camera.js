
//console.log(saved.x);
function setCamera(saved) {
    controls.getObject().position.x =saved.x;
    controls.getObject().position.y =saved.y;
    controls.getObject().position.z =saved.z;
    console.log(controls.getObject().position);
}