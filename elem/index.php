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
<script src="../js/three.js"></script>
<script src="..js/controls/OrbitControls.js"></script>
<script>
    var renderer = new THREE.WebGLRenderer();
    renderer.setSize(window.innerWidth, window.innerHeight);
    document.body.appendChild(renderer.domElement);

    var camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 1, 500);
    camera.position.set(0, 0, 100);
    camera.lookAt(new THREE.Vector3(0, 0, 0));
    var orbit = new THREE.OrbitControls( camera, renderer.domElement );
    orbit.enableZoom = false;
    var scene = new THREE.Scene();

    //create a blue LineBasicMaterial
    var geometry = new THREE.SphereBufferGeometry( 5, 32, 32 );
    var material = new THREE.MeshBasicMaterial( {color: 0xffff00} );
    var sphere = new THREE.Mesh( geometry, material );
    scene.add( sphere );
    var geometry = new THREE.Geometry();
    geometry.vertices.push(new THREE.Vector3(-10, 0, 0));
    geometry.vertices.push(new THREE.Vector3(0, 10, 0));
    geometry.vertices.push(new THREE.Vector3(0, -10, 0));
    geometry.vertices.push(new THREE.Vector3(10, 0, 0));
    geometry.vertices.push(new THREE.Vector3(10, 0, 0));

    console.log(geometry);
    var line = new THREE.Line(geometry, material);

    scene.add(line);

    var run1=true;


    var apple = {
        object: "0",
        what: 0,
        where: 0,
        speed: 0,
        move: function () {
            line.geometry.vertices[this.what].x+=this.speed;
        }
    };
    apple.object=line;
    apple.what=0;
    apple.where=40;
    apple.speed=1;

    var render1 = function () {
        if(run1==true){
            requestAnimationFrame( render1 );
        }
        animateVertices(geometry);
        sphere.rotation.x += 0.005;
        sphere.rotation.y += 0.005;

        renderer.render(scene, camera);
    };
    console.log(line);
    var animateVertices = function (geometry) {
        // console.log(line);
        /*
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
         run1 = false;
         setTimeout(function(){
         line.geometry.vertices[0].x=0;
         line.geometry.vertices[0].y=0;
         }, 1000);
         }, 1000);



         }
         var day=123;
         var arr = line.geometry.vertices[0];
         switch (arr.join(' ')) {
         case {x: -20, y: 0, z: 0}:
         day = "Sunday";
         console.log(day);
         break;
         case 1:
         day = "Monday";
         break;
         case 2:
         day = "Tuesday";
         break;
         case 3:
         day = "Wednesday";
         break;
         case 4:
         day = "Thursday";
         break;
         case 5:
         day = "Friday";
         break;
         case 6:
         day = "Saturday";
         }*/


        //apple.move();
        line.geometry.verticesNeedUpdate=true;

    }

    render1();

</script>
</body>
</html>
