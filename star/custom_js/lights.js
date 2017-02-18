/**
 * Created by pavelkechko on 2/18/17.
 */
function modelLights(){
    // LIGHTS 1-right; 2-back; 3-left, 4-front

    var lights = [0,1,2,3];
    lights[0] = new Array(0,0,-5);
    lights[1] = new Array(10,0,0);
    lights[2] = new Array(0,0,5);
    lights[3] = new Array(-10,0,0);

    for (i = 0; i < lights.length; i++) {
        var light = new THREE.PointLight(0xffffff, 1);
        light.position.set(lights[i]);
        light.position.multiplyScalar(30);
        scene.add(light);

        var sphereSize = 1;
        var pointLightHelper = new THREE.PointLightHelper( light, sphereSize );
        scene.add( pointLightHelper );
    }

    scene.add( new THREE.AmbientLight( 0x050505 ) );
    // var light = new THREE.HemisphereLight( 0xeeeeff, 0x777788, 0.75 );
    // light.position.set( 0.5, 1, 0.75 );
    // scene.add( light );

}