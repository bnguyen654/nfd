var editPid = 0;
var editSucc = false;


function reloadp(){
	$('#feed-wrapper').empty();
	$.ajax({
		url:'/nfd/resources/php/ajax_posts.php?get',
		dataType:"html",
		success:function(response){
			$('#feed-wrapper').html(response);
			initDynamicElements();
		}
	});
}

function initDynamicElements(){
	recursiveUnbind(document);
	//$(document).on('submit','#new-post',function(){
	$('.edit-button').click(function() {
		$(this).ajaxSubmit({
			success:function(response){
				if(response == 'success'){
					$('#new-post').trigger('reset');
					reloadp();
				}
			}
		});
		return false;
	});
	
	//$(document).on('click','.delete-button',function(){
	$('.delete-button').click(function() {
		console.log('Delete triggered.');
		var pid = $(this).parent().parent().data('pid');
		if(confirm("Continuing will delete this post.")){
			$.ajax({
				url:'/nfd/resources/php/ajax_posts.php?delete',
				data:{pid:pid},
				type:"POST",
				dataType:"text",
				success:function(response){
					if(response == 'deleted'){
						reloadp();
					}else{
						alert('There was a problem processing your request.');
					}
				}
			});
		}
	});
	
	 var dialog = $( "#dialog-form" ).dialog({
		autoOpen: false,
		height: 400,
		width: 450,
		position:{
			at:'center',
			my:'center',
			of:window
		},
		modal: true,
		buttons: [
			{
				text: 'Save',
				click: function(){
					$("#edit-form").ajaxSubmit({
						success:function(response){
							if(response == 'modified'){
								reloadp();
								editPid = 0;
								editSucc = true;
								dialog.dialog("close");
							}else{
								alert("There was an error processing your request.");
							}
						},
						data:{pid:editPid}
					});
				}
			},
			{
				text:'Cancel',
				click: function(e){
					$(this).dialog("close");
				}
			}
			],
			beforeClose:function(e){
				if(!editSucc){
					if(confirm('Continuing will discard changes.')){
							$(this).find("#title-edit-box").val("");
							$(this).find("#content-edit-box").val("");
					}else{
						return false;
					}
				}
				editSucc = false;
				editPid = 0;
			}
		});	
	//$(document).on('click','.edit-button',function(){
	$('.edit-button').click(function() {
		editPid = $(this).parent().parent().data('pid');
		dialog.dialog("open");
		
		var id = "post" + editPid;
				
		var t = $('#' + id + ' > .post-header > #title').text();
		var c = $('#' + id + ' > #content').text();
		
		$('#title-edit-box').val(t);
		$('#content-edit-box').val(c);
	});
	$('time.post-time').timeago();
}

function recursiveUnbind(jElement) {
	$(jElement).unbind();
	$(jElement).removeAttr('onclick');
	$(jElement).children().each(function(){
		recursiveUnbind(this);
	});
}

$(function() {
	reloadp();
});

