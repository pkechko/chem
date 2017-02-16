<?php
/**
 * Created by PhpStorm.
 * User: pavelkechko
 * Date: 2/16/17
 * Time: 8:14 PM
 */

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8>
    <title>My first three.js app</title>
    <style>
        body { margin: 0; }
        canvas { width: 100%; height: 100% }
    </style>
</head>
<body>
<script src="js/three.js"></script>
<script>
    var renderer = new THREE.WebGLRenderer();
    renderer.setSize(window.innerWidth, window.innerHeight);
    document.body.appendChild(renderer.domElement);

    var camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 1, 500);
    camera.position.set(0, 0, 100);
    camera.lookAt(new THREE.Vector3(0, 0, 0));

    var scene = new THREE.Scene();

    //create a blue LineBasicMaterial
    var material = new THREE.LineBasicMaterial({ color: 0x0000ff });

    var geometry = new THREE.Geometry();
    geometry.vertices.push(new THREE.Vector3(-10, 0, 0));
    geometry.vertices.push(new THREE.Vector3(0, 10, 0));
    geometry.vertices.push(new THREE.Vector3(0, -10, 0));
    geometry.vertices.push(new THREE.Vector3(10, 0, 0));
    geometry.vertices.push(new THREE.Vector3(10, 0, 0));

    console.log(geometry);
    var line = new THREE.Line(geometry, material);

    scene.add(line);

    var render = function () {
        requestAnimationFrame( render );
        animateVertices(geometry);


        renderer.render(scene, camera);
    };
    console.log(line);
    var animateVertices = function (geometry) {
       // console.log(line);

        ///// 1
        if (line.geometry.vertices[0].x<0){
        line.geometry.vertices[0].x+=0.1;
        }

        if (line.geometry.vertices[0].y<10) {
            line.geometry.vertices[0].y += 0.1;
        }
        ///// 2
        if (line.geometry.vertices[4].x>-10){
            line.geometry.vertices[4].x-=0.2;
        }



        if (line.geometry.vertices[4].x<=-10) {
            setTimeout(function(){
                line.geometry.vertices[0].x=-10;
                line.geometry.vertices[0].y=0;
            }, 2000);


        }


        line.geometry.verticesNeedUpdate=true;

    }


    render();





</script>
</body>
</html>
