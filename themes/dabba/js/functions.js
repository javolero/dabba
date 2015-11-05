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

function imgToSvg(){
	$('img.svg').each(function(){
		var $img = $(this);
		var imgID = $img.attr('id');
		var imgClass = $img.attr('class');
		var imgURL = $img.attr('src');

		$.get(imgURL, function(data) {
			// Get the SVG tag, ignore the rest
			var $svg = $(data).find('svg');

			// Add replaced image's ID to the new SVG
			if(typeof imgID !== 'undefined') {
				$svg = $svg.attr('id', imgID);
			}
			// Add replaced image's classes to the new SVG
			if(typeof imgClass !== 'undefined') {
				$svg = $svg.attr('class', imgClass+' replaced-svg');
			}

			// Remove any invalid XML tags as per http://validator.w3.org
			$svg = $svg.removeAttr('xmlns:a');

			// Replace image with new SVG
			$img.replaceWith($svg);

		}, 'xml');

	});
} //imgToSvg


function toggleElement(element){
    $(element).toggleClass('hidden');
}


/*------------------------------------*\
    #MAPS FUNCTIONS
\*------------------------------------*/

function initMap( mapId ) {

    var map = new google.maps.Map(document.getElementById( mapId ), {
        zoom:           14,
        center:         {lat: 19.435342, lng: -99.205695},
        mapTypeId:      google.maps.MapTypeId.TERRAIN,
        draggable:      true,
        mapTypeControl: true,
        scrollwheel:    true,
    });
    addPolanco( map );
    addAmpGranada( map );
    addLomas( map );

}// initMap

function addPolanco( map ){

    var polancoCoords = [
        {lat: 19.438358, lng: -99.205858},
        {lat: 19.437933, lng: -99.195451},
        {lat: 19.431519, lng: -99.195751},
        {lat: 19.429869, lng: -99.196889},
        {lat: 19.426885, lng: -99.197490},
        {lat: 19.432540, lng: -99.208417},

        {lat: 19.438358, lng: -99.205858},
    ];

    var areaPolanco = new google.maps.Polygon({
        paths: polancoCoords,
        strokeColor: '#F65275',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#F65275',
        fillOpacity: 0.35
    });
    areaPolanco.setMap(map);

}// addPolanco

function addAmpGranada( map ){

    var ampGranadaCoords = [
        {lat: 19.446606, lng: -99.204913},
        {lat: 19.440324, lng: -99.205084},
        {lat: 19.438487, lng: -99.205907},
        {lat: 19.440059, lng: -99.204435},
        {lat: 19.441205, lng: -99.202130},
        {lat: 19.442214, lng: -99.192239},
        {lat: 19.443019, lng: -99.195852},
        {lat: 19.446606, lng: -99.204913},
    ];
    var areaAmpGranada = new google.maps.Polygon({
        paths: ampGranadaCoords,
        strokeColor: '#F65275',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#F65275',
        fillOpacity: 0.35
    });
    areaAmpGranada.setMap(map);

}// addAmpGranada

function addLomas( map ){

    var lomasCoords = [
        {lat: 19.428523, lng: -99.216959},
        {lat: 19.429919, lng: -99.217603},
        {lat: 19.431022, lng: -99.215715},
        {lat: 19.432873, lng: -99.213516},
        {lat: 19.433328, lng: -99.210136},
        {lat: 19.429453, lng: -99.202637},
        {lat: 19.427774, lng: -99.203109},
        {lat: 19.426762, lng: -99.205769},
        {lat: 19.427865, lng: -99.207647},
        {lat: 19.428158, lng: -99.209192},
        {lat: 19.427602, lng: -99.212089},
        {lat: 19.427561, lng: -99.214202},
        {lat: 19.427814, lng: -99.215361},
        {lat: 19.427875, lng: -99.216530},

        {lat: 19.428523, lng: -99.216959},
    ];
    var areaLomas = new google.maps.Polygon({
        paths: lomasCoords,
        strokeColor: '#F65275',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#F65275',
        fillOpacity: 0.35
    });
    areaLomas.setMap(map);

}// addLomas


/*------------------------------------*\
	#AJAX FUNCTIONS
\*------------------------------------*/

function agregarUsuarioProspecto( email, zona ){

    $.post(
        ajax_url,
        {
            email:  email,
            zona:   zona,
            action: 'agregar_usuario_prospecto' 
        },
        function( response ){
            console.log( response );
        }
    );

}// agregarUsuarioProspecto

/*------------------------------------*\
	#GET / SET FUNCTIONS
\*------------------------------------*/

