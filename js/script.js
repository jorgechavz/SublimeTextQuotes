$(document).ready(function(){
	$(window).keyup(function(e){
		var code = e.keyCode;
		if(code == 39){
			//if right
			var phrase_id = $("body").attr('data-id');			
			$.get('ajax/getrandom.php',{phrase_id:phrase_id,which:"next"},function(json){				
				$("h1").html(json.phrase);
				$("#author").html(json.author);
				if(json.img_src)
					$("#img-author").css('background-image',"url('"+json.img_src+"')");				
				$("body").attr('data-id',json.phrase_id);
			});
		}
		if(code == 37){
			//if left
			var phrase_id = $("body").attr('data-id');			
			$.get('ajax/getrandom.php',{phrase_id:phrase_id,which:'prev'},function(json){				
				$("h1").html(json.phrase);
				$("#author").html(json.author);
				if(json.img_src)
					$("#img-author").css('background-image',"url('"+json.img_src+"')");				
				$("body").attr('data-id',json.phrase_id);
			});
		}
		if(code == 82){
			$.get('ajax/getrandom.php',{},function(json){
				$("h1").html(json.phrase);
				$("#author").html(json.author);
				$("#img-author").css('background-image',"url('"+json.img_src+"')");				
				$("body").attr('data-id',json.phrase_id);
			});
		}		
	});
});