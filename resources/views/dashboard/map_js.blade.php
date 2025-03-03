
<script>
    //var trynatin = 'di nagiba';

    function redirectMe(link) {
        location.href = ('https://www.facebook.com/messages/t/' + link.toString);
    }
    function console_log(){
        var p1 = "adTrigged";
        console.log("Triggered");
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
            center  :{lat:17.1589496, lng: 120.6308387},
            disableDefaultUI: true,
            zoomControl: true,
            streetViewControl: true,
            gestureHandling: "greedy",

            
        }
        
        
        //NEW MAP
        var map = new google.maps.Map(document.getElementById('googleMap'), options);
        
        

        map.setTilt(45);
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
                    console.log(ratings);
                    const pos1 = {
                            lat: transitLat,
                            lng: transitLang,
                        };

                    map.setCenter(pos1);
                
                    addMarker({content:markerName + markerInfo + ratings, iconImage:"images/tricycle.png", coords:{lat: transitLat, lng: transitLang}});
         
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
                    console.log(markerName + markerInfo);
                    const pos1 = {
                            lat: transitLat,
                            lng: transitLang,
                        };

                    map.setCenter(pos1);
                    addMarker({content:markerName + markerInfo + ratings, iconImage:"images/jeep.png", coords:{lat: transitLat, lng: transitLang}});
         
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
                    console.log(markerName + markerInfo);
                    const pos1 = {
                            lat: transitLat,
                            lng: transitLang,
                        };
                    map.setCenter(pos1);
                    addMarker({content:markerName + markerInfo + ratings, iconImage:"images/bus.png" ,coords:{lat: transitLat, lng: transitLang}});
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
                addMarker({content:'<h4>Hello!</h4>This is where you at!', coords:{lat:position.coords.latitude, lng: position.coords.longitude}});
                
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
        

        function addMarker(props){

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
                });
            }
        }
    }

</script>
