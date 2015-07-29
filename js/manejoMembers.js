$(document).ready(function() {
	$("a.activaVisionTotal").click(function () {
		//console.log("Se ha hecho click");
		$.each($('div.noinicial'), function() {
			//console.log($(this));
			$(this).removeClass('noinicial');
		});
	});
});