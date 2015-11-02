var $=jQuery.noConflict();

/*------------------------------------*\
	#GENERAL FUNCTIONS
\*------------------------------------*/

function resizeToCover( min_w, vid_w_orig, vid_h_orig ) {

	// use largest scale factor of horizontal/vertical
	var scale_h = $('.hero').width() / vid_w_orig;
	var scale_v = $('.hero').height() / vid_h_orig;
	var scale = scale_h > scale_v ? scale_h : scale_v;

	// don't allow scaled width < minimum video width
	if (scale * vid_w_orig < min_w) { console.log('if'); scale = min_w / vid_w_orig;};

	// now scale the video
	$('.hero__video').width(scale * vid_w_orig);
	$('.hero__video').height(scale * vid_h_orig);

	// and center it by scrolling the video viewport
	$('.hero').scrollLeft(($('.hero__video').width() - $('.hero').width()) / 2);
	$('.hero').scrollTop(($('.hero__video').height() - $('.hero').height()) / 2);
};



/*------------------------------------*\
	#AJAX FUNCTIONS
\*------------------------------------*/

/*------------------------------------*\
	#GET / SET FUNCTIONS
\*------------------------------------*/

