
<input type="text" class="form-control" id="client_name" name="client_name" value= "<?php echo(empty($_SESSION['fullname'])?"":$_SESSION['fullname']);?>" hidden>
  
<script>
    //var trynatin = 'di nagiba';

    function redirectMe(id) {
        location.href = ('http://127.0.0.1:8000/reviews/' + id);
    }
    function console_log(){
        var p1 = "adTrigged";
        console.log("Triggered");
    }
    function showGetDirectionForm(){
        var getDirectionFrom = document.getElementById("from");
        var getDirectionTo = document.getElementById("to");
        var DirectionBtn = document.getElementById("directionBtn");
        var sideNav = document.getElementById("sidenav");
        if(getDirectionFrom.style.display =="none"){
            getDirectionFrom.style.display = "block";
            getDirectionTo.style.display = "block";
            DirectionBtn.style.display = "block";
            sideNav.style.display = "none";
        }else{
            getDirectionFrom.style.display = "none";
            getDirectionTo.style.display = "none";
            DirectionBtn.style.display = "none";
            sideNav.style.display = "none";
        }
    }
    function myFunction() {
        var x = document.getElementById("sidenav");
        var y = document.getElementById("toggleNavbar");

        if (x.style.display == "none") {
        x.style.display = "block";
        x.style.textAlign ="center";


        } else {
        x.style.display = "none";
        }
    }

      function findNearestMarker(coords) {
        var minDist = 1000,
        nearest_text = '*None*',
        markerDist,
        // get all objects added to the map
        objects = map.getObjects(),
        len = map.getObjects().length,
        i;

      // iterate over objects and calculate distance between them
      for (i = 0; i < len; i += 1) {
        markerDist = objects[i].getGeometry().distance(coords);
        if (markerDist < minDist) {
          minDist = markerDist;
          nearest_text = objects[i].getData();
        }
      }

      logEvent('The nearest marker is: ' + nearest_text);
    }


    function detectOreientation(){
        //GET THE HEIGHT OF BROWSER TO FIT THE MAP
        var body = document.body, html = document.documentElement;
        var height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
        document.getElementById('googleMap').style.height = height + 'px';
    }
    detectOreientation();
    
    let portrait = window.matchMedia("(orientation: portrait)");

    portrait.addEventListener("change", function(e) {
        if(e.matches) {
            detectOreientation();
        } else {
            detectOreientation();
        }
    })
    

    function initMap(){

        var options = {
            zoom    :13,
            center  :{lat:15.142713864469993, lng: 120.62007881852675},
            disableDefaultUI: true,
            zoomControl: true,
            streetViewControl: true,
            gestureHandling: "greedy",
            styles: [
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#8ec3b9"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1a3646"
      }
    ]
  },
  {
    "featureType": "administrative.country",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#4b6878"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#64779e"
      }
    ]
  },
  {
    "featureType": "administrative.province",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#4b6878"
      }
    ]
  },
  {
    "featureType": "landscape.man_made",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#334e87"
      }
    ]
  },
  {
    "featureType": "landscape.natural",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#023e58"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#283d6a"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#6f9ba5"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#023e58"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#3C7680"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#304a7d"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#98a5be"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#2c6675"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#255763"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#b0d5ce"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#023e58"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#98a5be"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#283d6a"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#3a4762"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#0e1626"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#4e6d70"
      }
    ]
  }
]

            
        }
        
        
        //NEW MAP
        var map = new google.maps.Map(document.getElementById('googleMap'), options);
        
        

        map.setTilt(0);
        //ADD TRAFFIC INFO IN MAP
        const trafficLayer = new google.maps.TrafficLayer();
        trafficLayer.setMap(map);
        
        // //ADD TRANSIT INFO IN MAP
        // const transitLayer = new google.maps.TransitLayer();
        // transitLayer.setMap(map);
        
        //ADD SIDE NAVBAR
        const sideBar = document.getElementById('sidenav');
        map.controls[google.maps.ControlPosition.LEFT_TOP].push(sideBar);

        //ADD LOCATE SELF BUTTON
        const logoLabel = document.getElementById('getDirection');
        map.controls[google.maps.ControlPosition.TOP].push(logoLabel);

        const myModal= document.getElementById('myModal');
        map.controls[google.maps.ControlPosition.TOP].push(myModal);

        //GET CURRENT LOCATION USING A BUTTON
        const locationButton = document.getElementById('getLocation');
        map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(locationButton);

        const outputt = document.getElementById('output');
        map.controls[google.maps.ControlPosition.BOTTOM].push(outputt);

        /*  ------------------------------
            |  SHOW MARKERS OF TRICYCLE  |
            ------------------------------
        */
        const tricycle = document.getElementById('tricycle');
        tricycle.addEventListener("click", () => {
            
            //addMarker({content:'<h4>Hello!</h4>This is your <strong>Aldwin\'s</strong> current location!', coords:{lat:position.coords.latitude,  lng: position.coords.longitude}});
            
            //DITO MAPUPUNTA YUNG LAMAN NUNG VARIABLE GALING SA PHP 
            var laman = '<?php echo json_encode($tricycle_data); ?>';
            //var parsed_data =  JSON.parse(laman);
            
            const lamanArray = laman.split(",");
            const skipper = lamanArray.length;
            console.log("ratings", lamanArray[4]);

            for(let a = 0; a < lamanArray.length; a++){
                    //THIS IS WHERE QUOTATION REMOVED TO BE ABLE TO BE CONVERTED IN DOUBLE
                    // console.log("latitude: ", parseFloat(lamanArray[0].slice(1, -1)));
                    // console.log("longitude: ", parseFloat(lamanArray[1].slice(1, -1)));
                    a++;
                    var markerName = lamanArray[a].slice(1, -1);
                    a++;
                    var markerInfo = lamanArray[a].slice(1, -1);
                    a++;
                    const transitLat = parseFloat(lamanArray[a].slice(1, -1));
                    a++;
                    const transitLang = parseFloat(lamanArray[a].slice(1, -1));
                    a++;
                    var ratings = lamanArray[a].slice(1, -1);
                    a++;
                    var destination_lat = lamanArray[a].slice(1, -1);
                    a++;
                    var destination_long = lamanArray[a].slice(1, -1);
                    a++;
                    console.log(ratings);
                    const pos1 = {
                            lat: transitLat,
                            lng: transitLang,
                        };

                    map.setCenter(pos1);
                
                    addMarker({content:markerName + markerInfo + ratings, iconImage:"images/tricycle_pin.png", coords:{lat: transitLat, lng: transitLang}}, transitLat, transitLang, destination_lat, destination_long);
         
            }
        });


        /*  ------------------------------
            |  SHOW MARKERS OF JEEPNEYS |
            ------------------------------
        */
        const jeep = document.getElementById('jeep');
        jeep.addEventListener("click", () => {
          
            //addMarker({content:'<h4>Hello!</h4>This is your <strong>Aldwin\'s</strong> current location!', coords:{lat:position.coords.latitude,  lng: position.coords.longitude}});
            
            //DITO MAPUPUNTA YUNG LAMAN NUNG VARIABLE GALING SA PHP 
            var laman = '<?php echo json_encode($jeep_data); ?>';
            //var parsed_data =  JSON.parse(laman);
            
            const lamanArray = laman.split(",");
            const skipper = lamanArray.length;
            console.log(lamanArray);

            for(let a = 0; a < lamanArray.length; a++){
                    //THIS IS WHERE QUOTATION REMOVED TO BE ABLE TO BE CONVERTED IN DOUBLE
                    // console.log("latitude: ", parseFloat(lamanArray[0].slice(1, -1)));
                    // console.log("longitude: ", parseFloat(lamanArray[1].slice(1, -1)));
                    a++;
                    var markerName = lamanArray[a].slice(1, -1);
                    a++;
                    var markerInfo = lamanArray[a].slice(1, -1);
                    a++;
                    const transitLat = parseFloat(lamanArray[a].slice(1, -1));
                    a++;
                    const transitLang = parseFloat(lamanArray[a].slice(1, -1));
                    a++;
                    var ratings = lamanArray[a].slice(1, -1);
                    a++;
                    var destination_lat = lamanArray[a].slice(1, -1);
                    a++;
                    var destination_long = lamanArray[a].slice(1, -1);
                    a++;
                    
                    console.log(markerName + markerInfo);
                    const pos1 = {
                            lat: transitLat,
                            lng: transitLang,
                        };

                    map.setCenter(pos1);
                    addMarker({content:markerName + markerInfo + ratings, iconImage:"images/jeep_pin.png", coords:{lat: transitLat, lng: transitLang}}, transitLat, transitLang, destination_lat, destination_long);
         
            }
        });


        /*  ------------------------------
            |  SHOW MARKERS OF BUSSES  |
            ------------------------------
        */
        const bus = document.getElementById('bus');
        bus.addEventListener("click", () => {
            
            //DITO MAPUPUNTA YUNG LAMAN NUNG VARIABLE GALING SA PHP 
            var laman = '<?php echo json_encode($bus_data); ?>';
      
            
            const lamanArray = laman.split(",");
            const skipper = lamanArray.length;
            //console.log(lamanArray);

            for(let a = 0; a < lamanArray.length; a++){
                    //THIS IS WHERE QUOTATION REMOVED TO BE ABLE TO BE CONVERTED IN DOUBLE
                    // console.log("latitude: ", parseFloat(lamanArray[0].slice(1, -1)));
                    // console.log("longitude: ", parseFloat(lamanArray[1].slice(1, -1)));
                    a++;
                    var markerName = lamanArray[a].slice(1, -1);
                    a++;
                    var markerInfo = lamanArray[a].slice(1, -1);
                    a++;
                    const transitLat = parseFloat(lamanArray[a].slice(1, -1));
                    a++;
                    const transitLang = parseFloat(lamanArray[a].slice(1, -1));
                    a++;
                    var ratings = lamanArray[a].slice(1, -1);
                    a++;
                    var destination_lat = lamanArray[a].slice(1, -1);
                    a++;
                    var destination_long = lamanArray[a].slice(1, -1);
                    a++;
                    console.log(markerName + markerInfo);
                    const pos1 = {
                            lat: transitLat,
                            lng: transitLang,
                        };
                    map.setCenter(pos1);
                    addMarker({content:markerName + markerInfo + ratings, iconImage:"images/bus_pin.png" ,coords:{lat: transitLat, lng: transitLang}}, transitLat, transitLang, destination_lat, destination_long);
            }
        });
        
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
                addMarker({content:'<h4>Hello '+document.getElementById("client_name").value+'!</h4>This is where you at!', coords:{lat:position.coords.latitude, lng: position.coords.longitude}, iconImage:"images/jaina.png"});
                
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
            var x = document.getElementById("sidenav").style.display = "none";
            
            
            //ADD MARKER
            //addMarker({coords:event.latLng})
        });

        //CREATE DIRECTION SERVICE
        var directionService = new google.maps.DirectionsService();

        //CREATE DIRECTION RENDERER OBJECT WHICH WILL USE TO DISPLAY THE ROUTE
        var directionDisplay = new google.maps.DirectionsRenderer();

        //BIND THE DIRECTIONRENDERER TO THE MAP\
        directionDisplay.setMap(map);
        var myLatLong = '';
        var is_from_current = '';

        //GET DIRECTION FROM CURRENT LOCATION
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                var posi = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };
                
                myLatLong = (position.coords.latitude+ ", " + position.coords.longitude).toString();

                },
                () => {
                handleLocationError(true, infoWindow, map.getCenter());
                }
            );
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
        
        //THIS FUNCTION WILL DRAW PATH FROM ORIGIN TO DESTINATION
        function drawDirection(userOrigin, userDestination){
            //CREATE A REQUEST
            var request = {
                //IF USER TYPE IN FROM TEXTBOX IT WILL GET THE INFO ELSE IT WILL GET THE USER CURRRENT LOCATION
                origin: userOrigin,
                destination: userDestination,
                travelMode: google.maps.TravelMode.DRIVING, //WALKING, BICYCLE, TRANSIT
                unitSystem: google.maps.UnitSystem.IMPERIAL
            };
            //PASS THE REQUEST TO THE ROUTE METHOD
            directionService.route(request, (result, status) =>{
                if (status == google.maps.DirectionsStatus.OK){
                    var displayFrom = (document.getElementById('from').value == '') ? ("Current location") : (document.getElementById('from').value);
                    //GET DISTANCE AND TIME
                    const output = document.querySelector('#output');
                    output.innerHTML = "<div class='alert-info'> From: " + displayFrom + ".<br />To: " + 
                        document.getElementById('to').value + ".<br /> Driving distance: " +result.routes[0].legs[0].distance.text +
                        ".<br /> Duration: " + result.routes[0].legs[0].duration.text + "</div>";
                    
   
                    //DISPLAY ROUTE
                    directionDisplay.setDirections(result);
                    directionDisplay.setOptions({
                        polylineOptions: {
                        strokeColor: 'red',
                        strokeWeight: 8
                        
                    }
                    });
                                    

                }else{
                    //DELETE ROUTE FROM MAP
                    directionDisplay.setDirections({routes: []});
                    //CENTER MAP IN MY LOCATION
                    // map.setCenter(myLatLng);

                    //SHOW ERROR MESSAGE
                    output.innerHTML = "<div class='alert-danger'> Could not retrieve distance </div>"
                }
                


            });
    }
        //SHOW PATH FROM POINT A TO POINT B
        document.getElementById('directionBtn').onclick = function(){
            var origin = (document.getElementById('from').value == '') ? (myLatLong) : (document.getElementById('from').value);
            var destination = document.getElementById('to').value;
            drawDirection(origin, destination);
            
        }
        //CREATE AUTOCOMPLETE OBJECTS FOR ALL INPUT
        var options = {
            types: ['address'],
            componentRestrictions: {country: "ph"}
        }
        var input1 = document.getElementById("from");
        // var autocomplete1 = new google.maps.places.Autocomplete(input1, options)
        const autocomplete1 = new google.maps.places.Autocomplete(input1, options);
        
        var input2 = document.getElementById("to");
        //var autocomplete2 = new google.maps.places.Autocomplete(input2, options)
        const autocomplete2 = new google.maps.places.Autocomplete(input2, options);
    

        function addMarker(props, lati, longi, dest_lat, dest_long){
            
            // The marker, positioned at SAPALIBUTAD
            var marker = new google.maps.Marker({
                position    : props.coords,
                map         : map,
                animation   : google.maps.Animation.DROP,
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
                    //drawDirection("15.154322398438554, 120.63152421991438", "15.162027065287445, 120.62008734266928");
                    drawDirection(lati + ', ' + longi , dest_lat + ',' + dest_long);
                });
                // marker.addListener('dblclick', function(){
                //     marker.setMap(null);
                //     //drawDirection("15.154322398438554, 120.63152421991438", "15.162027065287445, 120.62008734266928");
                // });
            }
        }
    }
var getDirectionFrom = document.getElementById("from").style.display = "none";
var getDirectionTo = document.getElementById("to").style.display = "none";
var DirectionBtn = document.getElementById("directionBtn").style.display = "none";
</script>
