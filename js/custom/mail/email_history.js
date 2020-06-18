$(window).load(function(){
	var html ='';
	var loading = document.getElementById("loading");
	loading.removeAttribute('hidden','');
	$.ajax({
		type:"GET",
		url:"get_email_history",
		dataType:'JSON',
		success: function(data)
		{
			// console.log(data);
			for (var i = 0; i < data.length; i++) {
				html +='<li class="list-group-item" title="Ricky Canonigo" data-toggle="modal" data-target="#messageModal'+i+'" data-whatever="@mdo">'
	            +'	<i class="small material-icons">message</i> '+data[i].rep_fullname+''
	            +'</li>'
	            +'<div class="modal fade" id="messageModal'+i+'" tabindex="-1" role="dialog" aria-labelledby="modalLabel'+i+'" aria-hidden="true">'
	            +'    <div class="modal-dialog" role="document">'
	            +'        <div class="modal-content">'
	            +'            <div class="modal-header">'
	            +'                <h5 class="modal-title" id="modalLabel'+i+'">Message</h5>'
	            +'                <button type="button" class="close" data-dismiss="modal" aria-label="Close">'
	            +'                  <span aria-hidden="true">&times;</span>'
	            +'                </button>'
	            +'            </div>'
	            +'            <div class="modal-body">'
	            +'                <form>'
	            +'                  <div class="form-group">'
	            +'                    <label for="recipient-name" class="col-form-label" id="recipient-name-label">Recipient:</label>'
	            +'                   <input type="text" class="form-control" id="recipient-name-input" readonly value='+data[i].rep_email_address+'>'
	            +'                  </div>'
	            +'                  <div class="form-group">'
	            +'                    <label for="message-text" class="col-form-label">Message:</label>'
	            +'                    <textarea class="form-control" id="message-text" readonly>'+data[i].message+'</textarea>'
	            +'                  </div>'
	            +'                </form>'
	            +'            </div>'
	            +'           <div class="modal-footer">'
	            +'                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'
	            +'            </div>'
	            +'        </div>'
	            +'    </div>'
	            +'</div>';
	        }
			loading.setAttribute('hidden','');
	        $('#list-container').append(html);
		},
		error:function(err){
			console.log("error: "+err);
		}
	});
});