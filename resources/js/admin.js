$(function() {
	$( "#tabs" ).tabs({
		beforeLoad: function(event, ui) {
			ui.jqXHR.error(function() {
			ui.panel.html(
				"Couldn't load content. Try again. Sorry.");
			});
		}
	});
	
	$(document).on('click','.user-modify',function(){
		var uid = $(this).parent().parent().data('uid');
		dialog = 
	});
});