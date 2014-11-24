$.ajax({
			type: "GET",
			url: my_ajax.ajaxurl+'?action=mywiki_header',
			cache: false,
			dataType:"json",
			success: function(response) {
				if(response.header){
				$('.navbar').css({'background-image':'url('+response.header+')','background-size':'cover','background-repeat':'no-repeat'});}
			}
		});
function suggest(inputString){
	if(inputString.length == 0) {
		$('#suggestions').fadeOut();
	} else {
	$('#s').addClass('load');
		$.post(my_ajax.ajaxurl, {action:'mywiki_search',queryString: ""+inputString+""}, function(data){
			if(data.length >0) {
				var data1;
				$('#suggestions').fadeIn();
				if(data!='no')
				{
					$('#ascrail2000').fadeIn();
					$('#suggestionslist').html(data);
				}
				else
				{
					data1='<div style="color:#000; padding:8px 7px 0px 28px; font-family: Open Sans, sans-serif;text-align:center;">No Result Found</div>';
					$('#suggestionslist').html(data1);
				}
				$('#s').removeClass('load');
			}
		});
	}
}
function fill(thisValue) {
	$('#s').val(thisValue);
	setTimeout("$('#suggestions').fadeOut();", 600);
	setTimeout("$('#ascrail2000').fadeOut();", 600);
}
jQuery(document).ready(function($) {
$('#submit-comment-form').click(function() {
	var check = true;
	var comment_form_fields = new Array();
	$(".required").each( function () {
	  var comment_form_field = $(this).attr('id');
	  if($('#'+comment_form_field).val()=='')
	  {
		comment_form_fields['comment_form_field'] = $('#'+comment_form_field).val();
		$('#'+comment_form_field).css('border-color','red');
		check = false;
	  }
	 });
	 if(!check)
	 {
		 return false;
	 }
	 $.ajax({
			type: "POST",
			url: my_ajax.ajaxurl,
			data: { 
				action: '',
				comment_form_fields: comment_form_fields,
			},
			beforeSend: function(){
			},
			complete: function(){},
			cache: false,
			success: function(data){}
	})
});
});