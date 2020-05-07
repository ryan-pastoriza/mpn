$("#upload_form").submit(function(event){
  event.preventDefault();
    $.ajax({
    url:"{{ route('post.validate_image')}}",
    method:"POST",
    data:new FormData(this),
    dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success:function(data)
    {
      console.log(data);
      console.log(data.message);
      $('#message').css('display', 'block');
      $('#message').html(data.message);
      $('#message').addClass(data.class_name);
      $('#uploaded_image').html(data.uploaded_image);
    }})
});