function reloadp(){
	$('#feed-wrapper').empty();
	$.ajax({
		url:'get.php',
		dataType:"html",
		success:function(response){
			$('#feed-wrapper').html(response);
		}
	});
}

function openEdit(element){
	
	var pid = $('#' + element).data('pid');
	
	tp = $('#' + element + ' > #title');
	tt = tp.text	();
	tp.replaceWith("<input type='text' value='" + tt + "' class='editt'>");
	
	cp = $('#' + element + ' > #content');
	ct = cp.text();
	cp.replaceWith("<textarea class='editc'>" + ct + "</textarea>");
	
	$('#' + element + ' > #control').append("<input id='save' type='button' value='Save' onclick='saveEdit(this.parentNode.parentNode.id)'>");
}

function saveEdit(element){	
	var pid = $('#' + element).data('pid');
	console.log(element);
	console.log(pid);
	
	var title = $('.editt').val();
	var content = $('.editc').val();
		
	var data = {
		ntitle:title,
		ncontent:content,
		pid:pid
	}
		$.ajax({
			url:'/nfd/feed/edit.php?modify',
			data:data,
			dataType:"text",
			type:"POST",
			success:function(response){
				console.log(response);
				if(response == 'modified'){
					reloadp();
				}else{
					alert("The server rejected you.");
				}
			}
		});

}

function del(element){
		var pid = $('#' + element).data('pid');
		console.log(pid);
		if(confirm("Continuing will delete this post")){
			$.ajax({
				url:'/nfd/feed/edit.php?delete',
				data:{pid:pid},
				type:"POST",
				dataType:"text",
				success:function(response){
					console.log(response);
					if(response == 'deleted'){
						reloadp();
					}else{
						alert("The server rejected you.");
					}
				}
			});
		}

}


$(document).ready(function() {
	reloadp();
	
	/**
	$('#save').click(function(){
		console.log('Save triggered.');
		
		var pid = $(this).parent().data('pid');
		
		var title = $('#title').val();
		var content = $('#content').val();
		
		var data = {
			title:title,
			content:content,
			pid:pid
		}
			$.ajax({
				url:'/nfd/scripts/feed/edit.php?modify',
				data:data,
				success:function(response){
					if(response == 'modified'){
						reloadp();
					}else{
						alert("The server rejected you.");
					}
				}
			});

	});
	*/
	
	$('#new-post').submit(function(){
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
	/**
	$('#nedit').click(function() {
		console.log('Edit triggered.');
		
		var pid = $(this).parent().data('pid');
		
		tp = $(post).find('#title');
		tt = tp.val();
		tp.replaceWith("<textarea class='editt'>" + tt + "</textarea>");
		
		cp = $(post).find('#content');
		ct = cp.val();
		cp.replaceWith("<textarea class='editc'>" + ct + "</textarea>");
		
		$(post).append("<input id='save' type='button' value='Save'>");
		
    });
	
	$('#ndelete').click(function() {
		console.log('Delete triggered.');
		
		var pid = $(this).parent().data('pid');
		
		if(confirm("Continuing will delete this post")){
			$.ajax({
				url:'/nfd/scripts/feed/edit.php?delete',
				data:pid,
				success:function(response){
					if(response == 'deleted'){
						reloadp();
					}else{
						alert("The server rejected you.");
					}
				}
			});
		}
    });
	*/
});

