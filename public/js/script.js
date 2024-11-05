$(document).ready(function(){
	$('#map_addresses').gMap({
		zoom: 18,
		arrowStyle: 2,
		maptype: 'SATELLITE',
		controls: {
       		panControl: true,
        	zoomControl: true,
        	mapTypeControl: true,
        	scaleControl: false,
        	streetViewControl: true,
        	overviewMapControl: false
    	},
		markers:[
			{
				latitude: -34.757596,
				longitude: -58.400389,
				popup: false
			}
		]
	});
});