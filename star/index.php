<?php

$mode = fly;

//echo $mode;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8>
    <title>Fly</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <style>
        html, body {
            width: 100%;
            height: 100%;
        }
        body {
            background-color: #ffffff;
            margin: 0;
            overflow: hidden;
            font-family: arial;
        }
        #blocker {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        #instructions {
            width: 100%;
            height: 100%;
            display: -webkit-box;
            display: -moz-box;
            display: box;
            -webkit-box-orient: horizontal;
            -moz-box-orient: horizontal;
            box-orient: horizontal;
            -webkit-box-pack: center;
            -moz-box-pack: center;
            box-pack: center;
            -webkit-box-align: center;
            -moz-box-align: center;
            box-align: center;
            color: #ffffff;
            text-align: center;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div id="blocker">

    <div id="instructions">
        <span style="font-size:40px">Click to play</span>
        <br />
        (W, A, S, D = Move, SPACE = Jump, MOUSE = Look around)
    </div>

</div>
<script src="js/three.js"></script>
<script src="custom_js/lights.js"></script>
<script src="custom_js/camera.js"></script>
<script src="custom_js/init.js"></script>
<script src="custom_js/instructions.js"></script>
<script src="custom_js/saving.js"></script>
<script src="custom_js/PointerLockControls_rewrite.js"></script>
<script>
//    var renderer = new THREE.WebGLRenderer();
//    renderer.setSize(window.innerWidth, window.innerHeight);
//    document.body.appendChild(renderer.domElement);

//    var camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 1, 500);
//    camera.position.set(-5, 1, 0);
//    camera.lookAt(new THREE.Vector3(0, 0, -200));
//    camera.position.x = -15;
//    camera.position.y = 7;
//    camera.position.z = 11;


//    var orbit = new THREE.OrbitControls( camera, renderer.domElement );
//    orbit.enableZoom = true;


//    var scene = new THREE.Scene();
var objects = [];
var controlsEnabled = false;
var moveForward = false;
var moveBackward = false;
var moveLeft = false;
var moveRight = false;
var canJump = false;
var prevTime = performance.now();
var velocity = new THREE.Vector3();

instructions();
init();
this.saved = new saved(0,0,0);
setCamera(this.saved);
    // instantiate a loader
    var loader = new THREE.JSONLoader();
    modelLights();
    // load a resource

    loader.load(
        // resource URL
        'models/test6.json',
        // Function when resource is loaded
        function ( geometry, materials ) {
            var material = new THREE.MultiMaterial( materials );
            //var material = new THREE.MeshPhysicalMaterial( {color: 0x0000ff} );
            var object = new THREE.Mesh( geometry, material );
            object.position.y=5;
            object.position.z=-10;
            var scaling = 5;
            object.scale.x = scaling;
            object.scale.y = scaling;
            object.scale.z = scaling;
            console.log(object.position.y);
            scene.add( object );
            objects.push( object );
        }
    );






///////////////

    // objects
//    geometry = new THREE.BoxGeometry( 20, 20, 20 );
//    for ( var i = 0, l = geometry.faces.length; i < l; i ++ ) {
//        var face = geometry.faces[ i ];
//        face.vertexColors[ 0 ] = new THREE.Color().setHSL( Math.random() * 0.3 + 0.5, 0.75, Math.random() * 0.25 + 0.75 );
//        face.vertexColors[ 1 ] = new THREE.Color().setHSL( Math.random() * 0.3 + 0.5, 0.75, Math.random() * 0.25 + 0.75 );
//        face.vertexColors[ 2 ] = new THREE.Color().setHSL( Math.random() * 0.3 + 0.5, 0.75, Math.random() * 0.25 + 0.75 );
//    }
//    for ( var i = 0; i < 500; i ++ ) {
//        material = new THREE.MeshPhongMaterial( { specular: 0xffffff, shading: THREE.FlatShading, vertexColors: THREE.VertexColors } );
//        var mesh = new THREE.Mesh( geometry, material );
//        mesh.position.x = Math.floor( Math.random() * 20 - 10 ) * 20;
//        mesh.position.y = Math.floor( Math.random() * 20 ) * 20 + 10;
//        mesh.position.z = Math.floor( Math.random() * 20 - 10 ) * 20;
//        scene.add( mesh );
//        material.color.setHSL( Math.random() * 0.2 + 0.5, 0.75, Math.random() * 0.25 + 0.75 );
//        objects.push( mesh );
//    }


///////////////////



    var render = function () {

        requestAnimationFrame( render );
        rayCasterStart();


        renderer.render(scene, camera);
    };


    render();

</script>



</body>
</html>
