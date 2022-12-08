<?php
if(session_id() == '') {
    session_start();
}

	$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "map";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../css/style.css">

    <title>Transposure</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <!-- <div class="col-md-6 order-md-2">
          <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div> -->
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-block">

                <?php
                      if(isset($_POST["register"])) {

                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "map";

                        $fname = $_SESSION['one'];
                        $uname = $_SESSION['two'];
                        $pword = $_SESSION['three'];
                        $e_mail = $_SESSION['four'];
                        $contact_no = $_SESSION['contact_no'];
                        $street = $_SESSION['st'];
                        $barangay = $_SESSION['brgy'];
                        $city = $_SESSION['ct'];
                        $address = $street . $barangay;

                        $otp_code = $_SESSION['otp_code'];
                        //echo $otp_code;

                        try {
                            if($_POST["contact"] == $otp_code){
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                // set the PDO error mode to exception
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $sql = "INSERT INTO profiles (fullname, uname, pword, email, contact_no, address, city, user_type, is_active, date_created)
                                VALUES ('$fname', '$uname', '$pword', '$e_mail','$contact_no','$address','$city','client','1','".date('Y-m-d')."')";
                                
                                // use exec() because no results are returned
                                $conn->exec($sql);
                                //echo "New record created successfully";
                            echo'<script>window.location="successpage"</script>';
                            }else{
                              echo '<p1 class="text-danger">Incorrect otp code</p1>';
                            }
                        } catch(PDOException $e) {
                          echo $e;
                        }
                        $conn = null;
                      }
                  ?>


                  <div class="mb-4">
                  <h3>Sign Up to <strong>Transposure</strong></h3>
                  <p class="mb-4">Step 4 of 4</p>
                </div> 

                  <span><?php echo ($_SESSION['contact_no']); ?>&nbsp<a href="register_3">Not your number?</a></span>
                  <br><br>
                <?php 
                  echo($_SESSION['otp_code']);
                ?>
                <form action="#" method="POST">
                  <div class="form-group first">
                    <label for="contact">Enter 6 digit Code sent to you.</label>
                    <input type="number" class="form-control" id="contact" name="contact" onKeyDown="if(this.value.length==11 && event.keyCode!=6) return false;" required>
                  </div>
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="GET">
                  <input type="submit" value="Next" class="btn text-white btn-block btn-primary" name="register">
                
                </form>

              </div>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
  </body>
</html>