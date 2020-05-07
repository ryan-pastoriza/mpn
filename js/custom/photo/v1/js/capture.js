// $(window).load(function(){
// 	Webcam.set({
// 	    width: 400,
// 	    height: 300,
// 	    image_format: 'jpeg',
// 	    jpeg_quality: 90
// 	});
// 	Webcam.attach('#video');
// });

// function take_snapshot() {
//     Webcam.snap( function(data_uri) {
//         // $("canvas").val(data_uri);
// 		document.getElementById('canvas').innerHTML = '<img src="'+data_uri+'"/>';
//         console.log($('#canvas'))
//     } );
// }

// $(document).ready(function() {
// 	$(document).on('click', '#capture', function(e){
// 		take_snapshot();
// 	});
// });


function take_snapshot() {
    Webcam.snap( function(data_uri) {
        // $("canvas").val(data_uri);
		document.getElementById('canvas').innerHTML = '<img src="'+data_uri+'"/>';
        console.log($('#canvas'))
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
});