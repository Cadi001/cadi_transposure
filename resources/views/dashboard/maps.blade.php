@include("templates/header")

<?php 
if(session_id() == '') {
    session_start();
}
?>

<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "map";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


            
    //GET LONGITUDE AND LATITUDE OF TRICYCLE TERMINALS
    $tricycle_data = [];
    $sql = "SELECT id, marker_name, marker_description, latitude, longitude, terminal_rating, destination_lat, destination_lang, date_modified FROM transits WHERE transit_id = 1";
    $result = $conn->query($sql);
    $row = mysqli_fetch_all($result);

    foreach($row as $r){
        array_push($tricycle_data, $r[0]);
        array_push($tricycle_data, $r[1]);   
        array_push($tricycle_data, $r[2]);
        array_push($tricycle_data, $r[3]);
        array_push($tricycle_data, $r[4]);
        array_push($tricycle_data, $r[5]); 
        array_push($tricycle_data, $r[6]);  
        array_push($tricycle_data, $r[7]);
        array_push($tricycle_data, $r[8]);   
    }

    //GET LONGITUDE AND LATITUDE OF JEEP TERMINALS
    $jeep_data = [];
    $sql2 = "SELECT id, marker_name, marker_description, latitude, longitude, terminal_rating, destination_lat, destination_lang, date_modified FROM transits WHERE transit_id = 2";
    $result2 = $conn->query($sql2);
    $row2 = mysqli_fetch_all($result2);

    foreach($row2 as $r2){
        array_push($jeep_data, $r2[0]);
        array_push($jeep_data, $r2[1]);   
        array_push($jeep_data, $r2[2]);
        array_push($jeep_data, $r2[3]);
        array_push($jeep_data, $r2[4]); 
        array_push($jeep_data, $r2[5]); 
        array_push($jeep_data, $r2[6]); 
        array_push($jeep_data, $r2[7]); 
        array_push($jeep_data, $r2[8]); 
    }

    //GET LONGITUDE AND LATITUDE OF BUS TERMINALS
    $bus_data = [];
    $sql3 = "SELECT id, marker_name, marker_description, latitude, longitude, terminal_rating, destination_lat, destination_lang, date_modified FROM transits WHERE transit_id = 3";
    $result3 = $conn->query($sql3);
    $row3 = mysqli_fetch_all($result3);

    foreach($row3 as $r3){
        array_push($bus_data, $r3[0]);
        array_push($bus_data, $r3[1]);
        array_push($bus_data, $r3[2]);
        array_push($bus_data, $r3[3]);
        array_push($bus_data, $r3[4]);
        array_push($bus_data, $r3[5]);
        array_push($bus_data, $r3[6]);
        array_push($bus_data, $r3[7]);
        array_push($bus_data, $r3[8]);
    }

?>
        <div id="getDirection">
            <div class= "d-flex align-items-center">
                <div class="float-right">
                    <button id="toggleNavbar" class="btn text-white btn-block btn-primary" onclick="myFunction()"><i class="icon-color fa-solid fa-bars"></i></button>
                </div>
                <input type="text" id ="from" placeholder="Origin" class="form-control">
                <input type="text" id ="to" placeholder="Destination" class="form-control">
                <button id="directionBtn" class="btn text-white btn-block btn-primary"><i class="fa-solid fa-compass"></i></button>
                <button id="getLocation" class="btn text-white btn-block btn-primary"><i class="fa-solid fa-location-crosshairs"></i></button>
            </div>
        </div>           
        
        <div id="googleMap">
        
        </div>
        <div id="sidenav">
            <button id="toggleNavbar" class="btn text-white btn-block btn-primary" onclick="myFunction()"><i class="fa-solid fa-bars"></i></button>
            
            <img id="logo" src="images/transposure_logo.png" alt="Transposure">
            <br><br>
            <h6>TRANSPOSURE</h6>
            <br><br>
            <div>
                <a onclick="showGetDirectionForm()" class="sideNavButton" id="searchDirection" href="#"><i class="fa-solid fa-motorcycle" ></i>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Search Directions &nbsp&nbsp&nbsp&nbsp&nbsp</a>
                {{-- <br><br><br><br>
                <a class="sideNavButton" href="#"><i class="fa-solid fa-bell"></i> Notifications</a> --}}
                <br><br><br><br>
                <a onclick="myFunction()" class="sideNavButton" id="jeep" href="#"><i class="fa-solid fa-motorcycle"></i>&nbsp&nbsp&nbsp&nbsp&nbsp Jeep &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
                <br><br><br><br>
                <a onclick="myFunction()" class="sideNavButton" id="bus" href="#"><i class="fa-solid fa-bus-simple"></i>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Bus &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
                <br><br><br><br>
                <a onclick="myFunction()" class="sideNavButton" id="tricycle" href="#"><i class="fa-solid fa-motorcycle" ></i>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Tricycle &nbsp&nbsp&nbsp&nbsp&nbsp</a>
                <br><br><br><br>
                <?php
                    if(!empty($_SESSION['login_user'])){
                        $id = $_SESSION['id'];?>
                        <a class="sideNavButton" href="<?php echo('profile/'.$id);?>"><i class="fa-solid fa-user"></i>&nbsp&nbsp&nbsp&nbsp&nbsp Profile &nbsp&nbsp&nbsp&nbsp&nbsp</a>
                        <br><br><br><br>
                        <a class="sideNavButton" href="<?php echo('logout');?>"><i class="fa-solid fa-user"></i>&nbsp&nbsp&nbsp&nbsp&nbsp Logout &nbsp&nbsp&nbsp&nbsp&nbsp</a>
                    <?php
                    }
                    else{
                        echo '<a class="sideNavButton" href="login"><i class="fa-solid fa-user"></i>&nbsp&nbsp&nbsp&nbsp&nbsp Login &nbsp&nbsp&nbsp&nbsp&nbsp</a>';
                    }
                
                ?>
            </div>
        </div>
        <div id="output">

        </div>
        
    </body>
    @include ("dashboard/map_js")
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkgdeYfgqc0CrCToppJtf5FP4LXSQcgRY&libraries=places&callback=initMap">
    </script>
    <script src="https://kit.fontawesome.com/52721c09fd.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
    
</html>