var $=jQuery.noConflict();

/*------------------------------------*\
	#GENERAL FUNCTIONS
\*------------------------------------*/

/**
 * This is an example description
 * @param type name
 * @return type name
**/
function exampleFunction( ){
	
}// exampleFunction



/*------------------------------------*\
    #MAP FUNCTIONS
\*------------------------------------*/

function createEmptyMap( isAerial ){

    var map = new google.maps.Map(document.getElementById('mapa'), {
        zoom: 18,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: false,
        streetViewControl: false,
        panControl: false,
        scrollwheel: false,
        zoomControlOptions: {
            position: google.maps.ControlPosition.RIGHT_BOTTOM
        }
    });

    if( isAerial ) {
        map.setMapTypeId(google.maps.MapTypeId.SATELLITE);
        return map;
    }

    var styles = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#dcdcdc"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#dcdcdc"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}];
    var styledMap = new google.maps.StyledMapType( styles, { name: "Styled Map" } );
    map.mapTypes.set('map_style', styledMap);
    map.setMapTypeId('map_style');
    
    return map;

}// createEmptyMap

function createMarker( mapa, lat, lng, decada ){

    var marker = new google.maps.Marker({
        position: new google.maps.LatLng( lat, lng ),
        map: mapa, 
        category: decada
    });

    return marker;

}// createMarker

function addAllMarkers(){
    
    var mapa = createEmptyMap( false );
    var markers = [];
    // allPhotosInfo viene de WP con wp_localize_script
    var photosInfo = $.parseJSON( allPhotosInfo );
    $.each( photosInfo, function( photoSlug, info ){

        // Saltar foto si no tiene ubicación
        if( info.lat === '' ) return true;

        var marker = createMarker( mapa, info.lat, info.lng, info.decada );
        createInfoWindow( mapa, marker, info.permalink, info.img_url );
        markers.push( marker );
    });

    addDecadaFilter( mapa, markers );
    autoCenter( mapa, markers );

}// addAllMarkers

function showSingleMap( lat, lng, heading, isAerial ){

    var mapa = createEmptyMap( isAerial );
    var markers = [ createMarker( mapa, lat, lng ) ];
    autoCenter( mapa, markers );

    if ( 1 != isAerial ) displayStreetViewImage( '.street-view-img', lat, lng, 600, 300, heading );

}// showSingleMap

function addDecadaFilter( mapa, markers ){

    $('.filtro-decada a').click(function(){
        var decada = $(this).data('decada');
        filterMarkersDecada( mapa, markers, decada );
    }); 

}// addDecadaFilter

function filterMarkersDecada( mapa, markers, decada ){

    if( decada == 'todas' ){
        showAllMarkers( mapa, markers );
        return;
    }
    var filteredResult = markers.filter(function(obj) {
        return ( obj.category == decada );
    });
    $.each( markers, function ( index, marker ) {
        marker.setVisible(false);
    });
    var visible_markers = [];
    $.each(filteredResult, function ( index, marker ) {
        marker.setVisible(true);
        visible_markers.push(marker);
    });
    autoCenter( mapa, visible_markers );

}// filterMarkersDecada

function showAllMarkers( mapa, markers ){

    $.each(markers, function (index, marker) {
        marker.setVisible(true);
    });
    autoCenter( mapa, markers );

}// showAllMarkers

function autoCenter( map, markers ) {

    var bounds = new google.maps.LatLngBounds();
    $.each(markers, function (index, marker) { bounds.extend(marker.position); });
    map.fitBounds(bounds);

    var listener = google.maps.event.addListener(map, "idle", function() {
        if (map.getZoom() > 16) map.setZoom(16);
        google.maps.event.removeListener(listener);
    });

} // autoCenter

function createInfoWindow( mapa, marker, permalink, imgUrl ){

    var infoWindows = new google.maps.InfoWindow({ maxWidth: 120 });
    infoWindows.setContent( '<a class="[ text-center ]" href="' + permalink + '"><img class="[ info-window__img ]" src="' + imgUrl + '">Ver foto<a/>' );

    google.maps.event.addListener( marker, 'click', function() {
        infoWindows.open( mapa, this );
    });
    // google.maps.event.addListener(marker, 'mouseout', function() {
    //     infoWindows.close();       
    // });

}// createInfoWindow

function displayStreetViewImage( el, lat, lng, w, h, heading ){

    var streeViewImg = '<img class="[ img-responsive center-block ]"" src="https://maps.googleapis.com/maps/api/streetview?size=' + w + 'x' + h + '&location=' + lat + ',' + lng + '&heading=' + heading + '&fov=120&pitch=-0.76&key=AIzaSyAJU0RHKbqFVKa02obBkEMlaMnCu1gndDo">';
    $( el ).html( streeViewImg );

}// displayStreetViewImage



/*------------------------------------*\
	#AJAX FUNCTIONS
\*------------------------------------*/

/*------------------------------------*\
	#GET / SET FUNCTIONS
\*------------------------------------*/

