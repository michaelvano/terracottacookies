$(document).ready(function(){

	$('.submitForm').submit(function(e){
		e.preventDefault();
		var form = $(this);
		var post_url = form.attr('action');
		var post_data = form.serialize();
		$('#loader', form).html('<img src="/a/i/loader.gif" />');
		$.ajax({
			type: 'POST',
			url: post_url, 
			data: post_data,
			success: function(msg) {
				$(form).fadeOut(500, function(){
					form.html(msg).fadeIn();
				});
			}		
		});
	});
	
	
	
	
	
	
	
	$('#registerUser').submit(function(e){
		e.preventDefault();
		var form = $(this);
		var post_url = form.attr('action');
		var post_data = form.serialize();
		$('#loader', form).html('<img src="/a/i/loader.gif" />');
		$.ajax({
			type: 'POST',
			url: post_url, 
			data: post_data,
			success: function(msg) {
				$(form).fadeOut(500, function(){
					form.html(msg).fadeIn();
				});
			}		
		});
	});
	
	
	
	
	
	
	
	
	
	
   
	$(".pdfUpdate").click(function(event) {
		var pdfForm = $(this).parent("form");
		pdfForm.submit(function(e){
			e.preventDefault();
			var form = $(this);
			var post_url = form.attr('action');
			var post_data = form.serialize() + '&action=update';
			$.ajax({
				type: 'POST',
				url: post_url, 
				data: post_data,
				success: function(msg) {
					$(form).fadeOut(500, function(){
						form.html(msg).fadeIn();
					});
				}		
			});
		});
	});
	
	
	
	
	
	
	
	
	
	$(".pdfDelete").click(function(event) {
		var pdfForm = $(this).parent("form");
		pdfForm.submit(function(e){
			e.preventDefault();
			var form = $(this);
			var post_url = form.attr('action');
			var post_data = form.serialize() + '&action=delete';
			$.ajax({
				type: 'POST',
				url: post_url, 
				data: post_data,
				success: function(msg) {
					$(form).fadeOut(500, function(){
						form.html(msg).fadeIn();
					});
				}		
			});
		});
	});
	
});