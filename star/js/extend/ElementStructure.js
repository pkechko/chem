/**
 * Created by pavelkechko on 2/17/17.
 */
var addgeom =  function (list) {
    var geometryLine = new THREE.Geometry();
    for (i = 0; i < list.length; i++) {

        //build spheres
        var geometry = new THREE.SphereBufferGeometry( 5, 32, 32 );
        var material = new THREE.MeshBasicMaterial( {color: 0xff0000} );
        var sphere = new THREE.Mesh( geometry, material );
        sphere.position.x = list[i].x;
        sphere.position.y = list[i].y;
        sphere.position.z = list[i].z;
        scene.add( sphere );

        //build line vertices
        geometryLine.vertices.push(new THREE.Vector3(sphere.position.x, sphere.position.y, sphere.position.z));

    }

    var materialLine = new THREE.LineBasicMaterial( {color: 0x0000ff, linewidth: 200} );
    var line = new THREE.Line(geometryLine, materialLine);
    scene.add(line);

}
