$( "#form").submit(function( event ) {
	event.preventDefault();

	$.ajax({
		method: "POST",
		url: "process.php",
		cashe: false,
		data: $( "#form").serializeArray()
	})
	.done(function( json ) {
		$("<div class='item'>Тест</div>").hide().appendTo($(".list")).append(json).slideToggle("slow");
	});
});
