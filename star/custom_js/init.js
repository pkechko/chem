/**
 * Created by pavelkechko on 2/18/17.
 */

function init() {

    camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 1, 1000 );
    scene = new THREE.Scene();


    var userPosition = {x: 0, y: 0, z: 0};
    controls = new THREE.PointerLockControls( camera );
    scene.add( controls.getObject() );
    var onKeyDown = function ( event ) {
        //console.log(event);
        switch ( event.keyCode ) {
            case 38: // up
            case 82: // r

                    //engineShaking();
                shipStart=true;

            break;
            case 87: // w

                var raycaster2 = new THREE.Raycaster(myPosition(),myDirection(), 0, 100);
                //raycaster2.setFromCamera( myDirection(), camera );

                var intersects = raycaster2.intersectObjects(scene.children, true);
                console.log(intersects);
                if (intersects.length>0){
                    //intersects[ 0 ].object.material.color.setHex( 0xffffff );
                    console.log(intersects[0].distance);
                    console.log(intersects);
                    if (intersects[0].distance > 5) {
                        moveForward = true;
                    } else {
                        moveForward = false;
                    }
                } else {
                    moveForward=true;
                }

                break;
            case 37: // left
            case 65: // a
                moveLeft = true;
            break;

            case 40: // down
            case 83: // s
                moveBackward = true;
                break;
            case 39: // right
            case 68: // d
                moveRight = true;
                break;
            case 32: // space
                if ( canJump === true ) velocity.y += 250;
                canJump = false;
                break;
        }
    };
    var onKeyUp = function ( event ) {
        switch( event.keyCode ) {
            case 38: // up
            case 87: // w
                moveForward = false;
                break;
            case 82: // r

                //engineShaking();
                shipStart=false;

                break;
            case 37: // left
            case 65: // a
                moveLeft = false;
                break;
            case 40: // down
            case 83: // s
                moveBackward = false;
                break;
            case 39: // right
            case 68: // d
                moveRight = false;
                break;
        }
    };

    document.addEventListener( 'keydown', onKeyDown, false );
    document.addEventListener( 'keyup', onKeyUp, false );
    raycaster = new THREE.Raycaster( new THREE.Vector3(), new THREE.Vector3( 0, - 1, 0 ), 0, 10 );
    renderer = new THREE.WebGLRenderer();
    //renderer.setClearColor( 0xffffff );
    renderer.setPixelRatio( window.devicePixelRatio );
    renderer.setSize( window.innerWidth, window.innerHeight );
    document.body.appendChild( renderer.domElement );
    //
    window.addEventListener( 'resize', onWindowResize, false );

}

function onWindowResize() {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize( window.innerWidth, window.innerHeight );
}


function rayCasterStart() {
    if ( controlsEnabled ) {
        raycaster.ray.origin.copy( controls.getObject().position );
        raycaster.ray.origin.y -= 10;
        var intersections = raycaster.intersectObjects( objects );
        //console.log(intersections);
        var isOnObject = intersections.length > 0;
        if (isOnObject) {
            console.log("test");
        }
        var time = performance.now();
        var delta = ( time - prevTime ) / 1000;
        velocity.x -= velocity.x * 10.0 * delta;
        velocity.z -= velocity.z * 10.0 * delta;
        velocity.y -= 9.8 * 100.0 * delta; // 100.0 = mass
        if ( moveForward ) velocity.z -= 400.0 * delta;
        if ( moveBackward ) velocity.z += 400.0 * delta;
        if ( moveLeft ) velocity.x -= 400.0 * delta;
        if ( moveRight ) velocity.x += 400.0 * delta;
        if ( isOnObject === true ) {
            velocity.y = Math.max( 0, velocity.y );
            canJump = true;
        }
        if ( shipStart ) shipVelocity.y += 40.0 * delta;
        controls.getObject().translateX( velocity.x * delta );
        controls.getObject().translateY( velocity.y * delta );
        controls.getObject().translateZ( velocity.z * delta );
        //ship.translateX( velocity.x * delta );
       // ship.translateY( shipVelocity.y * delta );
        //ship.translateZ( velocity.z * delta );
        //var shipVelocity = new THREE.Vector3();
        if ( controls.getObject().position.y < 10 ) {
            velocity.y = 0;
            controls.getObject().position.y = 10;
            canJump = true;
        }
        prevTime = time;
    }

}
