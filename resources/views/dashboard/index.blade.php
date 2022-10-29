 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../fonts/icomoon/style.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <!-- Style -->
        <link rel="stylesheet" href="../css/style.css">
        
        <title>Transposure</title>
    </head>
    <body>

        <!--The div element for the map -->
        <div id="map"></div>
        <h4 id="logoLabel">Transposure Map<h4>

        <style>

            #map{
                height: 100%;
                width: 100%;
            }

        </style>

        <script>
            //GET THE HEIGHT IF BROWSER TO FIT THE MAP
            var body = document.body, html = document.documentElement;
            var height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
            document.getElementById('map').style.height = height + 'px';
            function initMap(){

                var options = {
                    zoom    :13,
                    center  :{lat:17.1589496, lng: 120.6308387},
                    disableDefaultUI: true,
                    zoomControl: true,
                    streetViewControl: true,
                    gestureHandling: "greedy",

                    
                }
                
                //NEW MAP
                var map = new google.maps.Map(document.getElementById('map'), options);

                
                //GET CURRENT LOCATION USING A BUTTON
                const locationButton = document.createElement("button");
                locationButton.textContent = "Go to Current Location";
                locationButton.classList.add("custom-map-control-button");
                map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(locationButton);
                
                map.setTilt(45);
                //ADD TRAFFIC INFO IN MAP
                const trafficLayer = new google.maps.TrafficLayer();
                trafficLayer.setMap(map);
                
                // //ADD TRANSIT INFO IN MAP
                // const transitLayer = new google.maps.TransitLayer();
                // transitLayer.setMap(map);

                    
                //PUT TRANSPOSURE TEXT IN MAP
                const logoLabel = document.getElementById('logoLabel');
                map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(logoLabel);


                locationButton.addEventListener("click", () => {
                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };

                        map.setCenter(pos);
                        addMarker({content:'<h4>Hello!</h4>This is your current location!', coords:{lat:position.coords.latitude, lng: position.coords.longitude}});
                        
                        },
                        () => {
                        handleLocationError(true, infoWindow, map.getCenter());
                        }
                    );
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }
            });

                
                //LISTEN FOR CLICK IN MAP
                google.maps.event.addListener(map, 'click',
                function(event){
                    //ADD MARKER
                    //addMarker({coords:event.latLng})
                });

                //LIST OF MARKERS
                var markers = [
                    //{coords:{lat:15.1589496, lng: 120.6308387},content:'<h4>My Location</h4>Aldwin\'s House'},
                    //{coords:{lat:15.162260716453178, lng: 120.61043395609059}}
                ]
                //LOOP THROUGH MARKERS
                for(var i = 0; i < markers.length; i++){
                    addMarker(markers[i]);
                }
                

                function addMarker(props){
                    // The marker, positioned at SAPALIBUTAD
                    var marker = new google.maps.Marker({
                        position    : props.coords,
                        map         : map
                        //icon        : ''
                    });
                    
                    //CHECK FOR CUSTOM ICON
                    if(props.iconImage){
                        //SET ICON IMAGE
                        marker.setIcon(props.iconImage);
                    }


                    //CHECK CONTENT
                    if(props.content){
                        //SET CONTENT
                        //MAKE A INFO THAT WILL SHOW IN MARKER
                        var infoWindow = new google.maps.InfoWindow({
                            content:props.content
                        });
                        //THIS IS WHERE INFO SHOW WHEN A PIN CLICKED
                        marker.addListener('click', function(){
                            infoWindow.open(map, marker);
                        });
                    }

                    
                }
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkgdeYfgqc0CrCToppJtf5FP4LXSQcgRY&callback=initMap&v=weekly"defer></script>
    </body>
</html>