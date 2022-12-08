<?php

// use Twilio\TwiML\Voice\Echo_;

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

  // echo $_SESSION['login_user'];
  $info = $_SESSION['login_user'];
  
	//require "database/db.php";
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
                  if(isset($_POST["change_now"])) {
                    if($_POST["pass"] == $_POST["pass_2"]){
                      $password = $_POST["pass"];
                      $re_password = $_POST["pass_2"];

///////////////////////////////////////
                        // try {

                        //     $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                        //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
                        //     // echo "Connected Successfully";
                            
                        // } catch(PDOException $e) {
                        
                        //     echo "Connection Failed" .$e->getMessage();
                        // }

                        // $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
                        // $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
                        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                        // $sql = "UPDATE user_info SET pword=? WHERE email=?";
                        // $pdo->prepare($sql)->execute(["oceanpain", "aldwinnunag20@gmail.com"]);
///////////////////////////////////////

                          // Validate password strength
                                            // Validate password strength
                          $uppercase = preg_match('@[A-Z]@', $password);
                          $lowercase = preg_match('@[a-z]@', $password);
                          $number    = preg_match('@[0-9]@', $password);
                          $specialChars = preg_match('@[^\w]@', $password);

                          if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                              echo '<p1 class="text-danger">Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</p1>';
                          }else{
                            
                            if($password == $re_password){
                                try {
                                    echo $info;
                                    $contactfrom_db = $_SESSION['contactfrom_DB'];
                                    $newpass = $_POST['pass'];
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "map";

                                    // Create connection
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    // Check connection
                                    if ($conn->connect_error) {
                                      die("Connection failed: " . $conn->connect_error);
                                    }

                                    $sql = "UPDATE profiles SET pword='$newpass' WHERE uname='$info'";

                                    if ($conn->query($sql) === TRUE) {
                                      echo "Record updated successfully";
                                      echo'<script>window.location="changepass_success"</script>';
                                    } else {
                                      //echo "Error updating record: " . $conn->error;
                                      echo '<p1 class="text-danger">The username you provided is not associated with any account</p1>';
                                    }

                                    $conn->close();
                                                      
                                } catch (Exception $e) {
                                    echo $e->getMessage();
                                }
                              
                            }else{
                                echo '<p1 class="text-danger">Password doesn\'t match</p1>';
                            }
                            

                          }
                        



                    }
                    else{
                        echo '<p1 class="text-danger">Password doesn\'t match</p1>';
                    }
                  }
                ?>


                  <div class="mb-4">
                    <h3>Change your password now</h3>
                    <p class="mb-4">Choose a strong password</p>
                  </div>

                <form action="#" method="POST">
                  <div class="form-group first">
                    <label for="pass">Enter password</label>
                    <input type="password" class="form-control" id="pass" name="pass"  required>
                  </div>

                  <div class="form-group first">
                    <label for="pass_2">Re-enter password</label>
                    <input type="password" class="form-control" id="pass_2" name="pass_2"  required>
                  </div>
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="GET">
                  <input type="submit" value="Change password" class="btn text-white btn-block btn-primary" name="change_now">
                
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