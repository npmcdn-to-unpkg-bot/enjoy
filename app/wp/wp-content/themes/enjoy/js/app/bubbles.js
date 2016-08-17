(function() {
    'use strict';

	if($('body').hasClass('project-page')) {

		var camera, scene, renderer,
		    container, stats, particle,
		    winHalfX, winHalfY,
		    height, width, fieldOfView,
		    aspectRatio, nearPlane, farPlane,
		    wrapper, cameraZ, material,
		    i = 0,
		    count = 0,
		    Tau = Math.PI * 2,
		    mouseX = 0,
		    mouseY = 0,
		    amtX = 50,
		    amtY = 50,
		    sep = 100,
		    spriteOpts = {},
		    particles = [],
		    cssString = 'margin: 0; overflow: hidden;';

		function onDocumentReady() {
		    wrapper = document.querySelector('.guarantee')
		    // body.style.cssText = cssString;

		    container = document.createElement('div');
		    container.id = 'webgl-container';
		    wrapper.appendChild(container);

		    height = window.innerHeight;
		    winHalfY = height / 2;
		    width = window.innerWidth;
		    winHalfX = width / 2;
		    fieldOfView = 75;
		    aspectRatio = width / height;
		    nearPlane = 50;
		    farPlane = 2000;
		    cameraZ = 850;

		    rendererer(onRendererRenderered);
		}

		// renders the renderer 😎
		function rendererer(complete) {
		    //lights (no lights!) camera, action!
		    camera = new THREE.PerspectiveCamera(fieldOfView, aspectRatio, nearPlane, farPlane);
		    camera.position.z = cameraZ;
		    camera.position.y = 200;
		    camera.position.x = 100;

		    // aaaaaaaaand scene! (No wait, we're not done!)
		    // aaaaaaaaand ten more minutes.
		    scene = new THREE.Scene();

		    //material settings
		    spriteOpts = {
		        color: 0xCCCCCC,
		        program: function(ctx) {
		            ctx.beginPath();
		            ctx.arc(0, 0, 0.5, 0, Tau, true);
		            ctx.fill();
		        }
		    };

		    material = new THREE.SpriteCanvasMaterial(spriteOpts);

		    // Stop! particle time!
		    for (var ix = 0, lx = amtX; ix < lx; ix++) {

		        for (var iy = 0, ly = amtY; iy < ly; iy++) {
		            particle = particles[i++] = new THREE.Sprite(material);
		            particle.position.x = ix * sep - ((amtX * sep) / 2);
		            particle.position.z = iy * sep - ((amtY * sep) / 2);
		            scene.add(particle);
		        }
		    }

		    //render the scene
		    renderer = new THREE.CanvasRenderer();
		    renderer.setClearColor(0xffffff, 1);
		    renderer.setPixelRatio(window.devicePixelRatio);
		    renderer.setSize(width, height);

		    // append the rendered scene to the container
		    container.appendChild(renderer.domElement);
		    
		    // aaaaaaaaand Scene? (yes, scene!)
		    if (complete) {
		        complete();
		    }
		}

		function onRendererRenderered() {
		    // stats stats stats stats stats stats stats, eeeeerrryyybooodddaay! - Lil Jon, probably.
		    //stats = new Stats();
		    //stats.domElement.style.position = 'absolute';
		    //stats.domElement.style.top = stats.domElement.style.right = '0';
		    //container.appendChild(stats.domElement);

		    // bind events
		    window.addEventListener('resize', onWindowResize);

		}

		function onWindowResize() {
		    // update variables to new values
		    height = window.innerHeight;
		    winHalfY = height / 2;
		    width = window.innerWidth;
		    winHalfX = width / 2;

		    camera.aspect = width / height;
		    //camera.updateProjectionMatrix();
		    renderer.setSize(width, height);
		}

		function animate() {
		    requestAnimationFrame(animate);

		    update();
		    //stats.update();
		}

		function update() {
		    //camera.position.x += (mouseX - camera.position.x) * 0.05;
		    //camera.position.y += (mouseY - camera.position.y) * 0.05;
		    camera.lookAt(scene.position);
		    
		    i = 0;
		    for (var ix = 0, lx = amtX; ix < lx; ix++) {

		        for (var iy = 0, ly = amtY; iy < ly; iy++) {
		            particle = particles[i++];
		            particle.position.y = (Math.sin((ix + count) * 0.3) * 35) + (Math.sin((iy + count) * 0.5) * 35);
		            particle.scale.x = particle.scale.y = (Math.sin((ix + count) * 0.3) + 2 ) * 1.5 + (Math.sin((iy + count) * 0.5) + 2 ) * 1.5;
		            scene.add(particle);
		        }
		    }

		    renderer.render(scene, camera);
		    count += 0.05;
		}

		document.addEventListener('DOMContentLoaded', onDocumentReady);
		document.addEventListener('DOMContentLoaded', animate);

	}

})();