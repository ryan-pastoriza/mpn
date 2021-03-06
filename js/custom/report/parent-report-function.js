function require(script) {
    $.ajax({
        url: script,
        dataType: "script",
        async: false,           // <-- This is the key
        success: function () {},
        error: function () {
            throw new Error("Could not load script " + script);
        }
    });
}
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
// require("js/custom/home/amount-to-words.js");

class ElementBuilder{
	addElement(parentId="", elementTag="", elementType="",
			   elementId="", elementClass="", value="",
			   dataToggle, dataTarget="", html="") {
	    try{
			// Add html element to the page
		    var p = document.getElementById(parentId);
		    var newElement = document.createElement(elementTag);
		    newElement.setAttribute('type', elementType);
		    newElement.setAttribute('id', elementId);
		    newElement.setAttribute('class', elementClass);
		    newElement.setAttribute('value', value);
		    newElement.setAttribute('data-toggle', dataToggle);
		    newElement.setAttribute('data-target', dataTarget);
		    newElement.innerHTML = html;
		    p.appendChild(newElement);
		}catch(e){}
	}
	appendElement(parentId="",html=""){
	 	try{
			// Append html element to the page
		    var p = document.getElementById(parentId);
		    p.innerHTML = html;
		}catch(e){alert(e.message);}
	}
	removeElement(elementId) {
		try{
		    // Remove an element to the page
		    var element = document.getElementById(elementId);
		    element.parentNode.removeChild(element);
		}catch(e){}
	}
	clearChildElements(elementId){
		try{
		    // Remove an element to the page
		    var element = document.getElementById(elementId);
		    element.innerHTML ="";
		}catch(e){}
	}
}

class Search{
	searchStudent(ssi_id){
		$.ajax({
		type:"GET",
		url:"search/parent_guardian",
		dataType:'json',
		data:{
		ssi_id:ssi_id
		},
		success: function(data)
		{
			if (data['Representative'].length !=0){
				var html="";
				for (var i = 0; i < data['Representative'].length; i++) {
					var date =new Date(data['Representative'][i].created_at);
					html+='<tr>'+
	                        '<th scope="row">'+(i+1)+'</th>'+
							'<td><img src="'+data['Representative'][i].rep_id_presented+'" width="50" height="50"></td>'+
							'<td>'+data['Representative'][i].rep_fullname+'</td>'+
							'<td>'+data['Representative'][i].rep_address+'</td>'+
							'<td>'+data['Representative'][i].rep_relation+'</td>'+
							'<td>'+data['Representative'][i].rep_email_address+'</td>'+
							'<td>'+data['Representative'][i].rep_contact_num+'</td>'+
							'<td>'+date.getFullYear()+'</td>'+
						'</tr>\n';
				}
				$('#guardian_table').html(html);
				$('#message').html("");
			}else{
				$('#guardian_table').html("");
				$('#message').html("No Data");
			}
		}});
	}
}

class loadStudents{
	extractAll(){
		$.ajax({
		type:"GET",
		url:"load/student",
		dataType:'json',
		success: function(data)
		{	var $suffix ="";
			for (var i = 0; i < data.length; i++) {
				if(data[i].suffix !=null){$suffix = data[i].suffix}
				$('#name').append('<option data-id="'+data[i].ssi_id+'" value="'+data[i].lname+', '+data[i].fname+' '+$suffix+'" class="form-control"></option>');
				$suffix ="";
			};
		}});
	}
}

$(window).load(function(){
	let ls = new loadStudents;
	ls.extractAll();
});

$(document).ready(function() {
	//Search Student Function
	let search = new Search;
	var ssi_id=  $('#name option[value="'+$('#student_name').val()+'"]').data('id');
	$(document).on('change', 'input[name=student_name]', function() {
		ssi_id=  $('#name option[value="'+$('#student_name').val()+'"]').data('id'); console.log(ssi_id);
		search.searchStudent(ssi_id);
	});
});