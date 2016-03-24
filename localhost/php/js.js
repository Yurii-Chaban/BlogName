$( "#form").submit(function( event ) {
	event.preventDefault();

	$.ajax({
		url: "process.php",
		cashe: false
	})
	.done(function( json ) {
			$( "#result" ).append(json);
	});
});
