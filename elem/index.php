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
<script src="../js/controls/OrbitControls.js"></script>
<script src="../js/extend/ElementStructure.js"></script>
<script src="../js/extend/ElementPosition.js"></script>
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

    var list = [{x : -40, y:0, z:0},{x : -20, y:0, z:0},{x : 0, y:0, z:0},{x : 20, y:0, z:0},{x : 40, y:-28, z:0}]


    addgeom(list);
    var formula = 'h2o';
    var breakdown = calculatePositions(formula);
    console.log(breakdown);


    /*or (i = 0; i < list.length; i++) {

        var geometry = new THREE.SphereBufferGeometry( 5, 32, 32 );
        var material = new THREE.MeshBasicMaterial( {color: 0xffff00} );
        var sphere = new THREE.Mesh( geometry, material );
        sphere.position = list[i];
        scene.add( sphere );

    }
*/
    var run1=true;


    var render = function () {

            requestAnimationFrame( render );



        renderer.render(scene, camera);
    };




    render();

</script>
</body>
</html>
