$(document).ready(function() {

	// Remove js fallback
	$('.no-js').removeClass('no-js');

	//Remove Notification
	setTimeout(function() {
		$('.notification').animate({height: 0, margin: 0}, 1000, function() {
			$(this).remove();
		});
	}, 6000);
});