function take_snapshot() {
    Webcam.snap( function(data_uri) {
		document.getElementById('video').innerHTML = '<img src="'+data_uri+'"/>';
        console.log($('#video'))
    } );
}

$(document).ready(function() {
	$(document).on('click', '#capture', function(e){
		take_snapshot();
	});
	$(document).on('click', '#start_camera', function(e){
		console.log("Hello");
		Webcam.set({
		    width: 400,
		    height: 300,
		    image_format: 'jpeg',
		    jpeg_quality: 90
		});
		Webcam.attach('#video');
	});
	$(document).on('click', '#stop_camera', function(e){
		console.log("Stop");
		Webcam.reset();
	});
});