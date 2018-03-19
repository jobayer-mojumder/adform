	
   var map;
    map = new GMaps({
        el: '#map',
        lat: 31.511533,
        lng: 74.287813,
        scrollwheel: false
    });

    map.addMarker({
        lat: 31.511533,
        lng: 74.287813,
        title: 'Marker with InfoWindow',
        infoWindow: {
            content: '<p>SPY Hosting Victoria Hall, Merrick Way, <br>FL 12345 Australia<a href="https://themeforest.net/user/99_design"  target="_blank">Themeforest</a></p>'
        }
    });    