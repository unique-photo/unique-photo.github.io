$("#lim_on").click(function limOn(){
	$('body').append('<div class="lim"><script>$("#map").click(function(event){if(clicks >= 20){clicks = 19;alert("Попыток больше нет!");}});</script></div>');$("<h3>из 20</h3>").insertAfter("div.block h3:eq(5)");});
$("#lim_off").click(function limOff(){
	$('div.lim').remove();
	location.reload();
	});