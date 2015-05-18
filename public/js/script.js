$(document).ready(function(){
	$(window).keyup(function(e){
		var code = e.keyCode;
		if(code == 39){
			//if right
			var phrase_id = $("body").attr('data-id');
			cleanAll();
			$.get('public/ajax/getrandom.php',{phrase_id:phrase_id,which:"next"},function(json){
				console.log(json);
				$("h1").html(json.phrase);
				$("#author").html(json.author);
				if(json.img_src)
					$("#img-author").css('background-image',"url('"+json.img_src+"')");
				$("body").attr('data-id',json.phrase_id);
				addAll();
			});
		}
		if(code == 37){
			//if left
			var phrase_id = $("body").attr('data-id');
			cleanAll();
			$.get('public/ajax/getrandom.php',{phrase_id:phrase_id,which:'prev'},function(json){
				$("h1").html(json.phrase);
				$("#author").html(json.author);
				if(json.img_src)
					$("#img-author").css('background-image',"url('"+json.img_src+"')");
				$("body").attr('data-id',json.phrase_id);
				addAll();
			});
		}
		if(code == 82){
			//if random
			cleanAll();
			$.get('public/ajax/getrandom.php',{},function(json){
				$("h1").html(json.phrase);
				$("#author").html(json.author);
				$("#img-author").css('background-image',"url('"+json.img_src+"')");
				$("body").attr('data-id',json.phrase_id);
				addAll();
			});
		}
	});
function cleanAll(){
	cleanAnimate($("h1"),"fadeIn");
	cleanAnimate($("#author"),"fadeIn");
	cleanAnimate($("#img-author"),"bounceIn");
}
function cleanAnimate($target,animation){
	$target.removeClass("animated "+animation);
}
function addAll(){
	addAnimate($("h1"),"fadeIn");
	addAnimate($("#author"),"fadeIn");
	addAnimate($("#img-author"),"bounceIn");
}
function addAnimate($target,animation){
	$target.addClass("animated "+animation);
}
});
