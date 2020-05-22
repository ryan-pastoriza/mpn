class Search{
	searchPromissory(ssi_id,sy){
		$.ajax({
		type:"GET",
		url:"search/promissory_record",
		dataType:'json',
		data:{
		ssi_id:ssi_id,
		sy:sy
		},
		success: function(data)
		{
			console.log(data);
			if (data['PromissoryNote'].length !=0){
				var html="";
				for (var i = 0; i < data['PromissoryNote'].length; i++) {
					var date_filed =new Date(data['PromissoryNote'][i].created_at);
					html+='<tr>'+
	                        '<th scope="row">'+(i+1)+'</th>'+
	                        '<td>'+data['PromissoryNote'][i].pn_tracking_num+'</td>'+
							'<td>'+data['PromissoryNote'][i].pn_ssi_id+'</td>'+
							'<td>'+data['PromissoryNote'][i].pn_amount_promised+'</td>'+
							'<td>'+date_filed.getFullYear()+"-"+date_filed.getMonth()+"-"+date_filed.getDate()+'</td>'+
							'<td>'+data['PromissoryNote'][i].pn_date_promised+'</td>'+
							'<td>'+data['PromissoryNote'][i].pn_remarks+'</td>'+
							'<td>'+data['PromissoryNote'][i].pn_semester+'</td>'+
							'<td>'+data['PromissoryNote'][i].pn_term+'</td>'+
							'<td>'+data['PromissoryNote'][i].pn_school_yr+'</td>'+
						'</tr>\n';
				}
				$('#promissory_table').html(html);
				$('#message').html("");
			}else{
				$('#promissory_table').html("");
				$('#message').html("No Data");
			}
		}});
	}
}

class loadSchoolYears{
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

		var end = new Date().getFullYear();
		var start = 2000;
		for (end; end >= start; end--) {
			$('#sy').append('<option data-id="'+end+"-"+(end+1)+'" value="'+end+"-"+(end+1)+'" class="form-control"></option>');
		};
	}
}

$(window).load(function(){
	let ls = new loadSchoolYears;
	ls.extractAll();
});

$(document).ready(function() {
	//Search Student Function
	let search = new Search;
	var ssi_id=  $('#name option[value="'+$('#student_name').val()+'"]').data('id');
	var sy=  $('#sy option[value="'+$('#school_year').val()+'"]').data('id');
	$(document).on('change', 'input[name=school_year]', function() {
		sy=  $('#sy option[value="'+$('#school_year').val()+'"]').data('id');console.log(sy);
		search.searchPromissory(ssi_id,sy);
	});
	$(document).on('change', 'input[name=student_name]', function() {
		ssi_id=  $('#name option[value="'+$('#student_name').val()+'"]').data('id'); console.log(ssi_id);
		search.searchPromissory(ssi_id,sy);
	});
});