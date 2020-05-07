// $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

var global_data_uri='';
function save_shot(data_file){
  try{
    $.ajax({
    type:"POST",
    url:"add/promissory",
    dataType:'json',
    data:{image_file:data_file},
    success: function(data)
    {
      console.log("From php Data: "+data['data']);
    }});
  }catch(e){console.log(e.message);}
}

function take_snapshot() {
    Webcam.snap( function(data_uri){
      global_data_uri = data_uri;
      $('img#tmp_img').fadeIn("fast").attr('src',data_uri);
    });
}

$(document).ready(function() {
  $(document).on('click', '#capture', function(e){
    take_snapshot();
  });
  $(document).on('click', '#popup-camera-button', function(e){
    console.log("Camera Started");
    Webcam.set({
        width: 400,
        height: 300,
        image_format: 'jpeg',
        jpeg_quality: 100
    });
    Webcam.attach('#video');
  });
  
  $(document).on('click', '#save', function(e){
    $('#image-file').fadeIn("fast").attr('src',global_data_uri);
    $('#mod-close').trigger('click');
  });
  
  $(document).on('click', '#mod-close', function(e){
    console.log("Stopped");
    Webcam.reset();
  });
});