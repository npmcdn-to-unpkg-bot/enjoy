(function() {

	// var -------------------------------------------------------------------------------------------- //
	var _body = $('body');



	// start! ----------------------------------------------------------------------------------------- //
	window.addEventListener && window.addEventListener('DOMContentLoaded', function(){
		document.body.className += ' dom-loaded';
	});

	// show site -------------------------------------------------------------------------------------- //
	window.addEventListener && window.addEventListener('load', function(){
		document.body.className += ' loaded';
	});

})();