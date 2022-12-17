<?php
	if(session_id() == '') {
    session_start();
}

  $fullname = " ";
  $username = " ";
  $street = " ";
  $barangay = " ";
  $city = " ";

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
                <?php $uname_data = []; ?>
                @foreach($proshit as $pro)
                    
                    @if(isset($_POST["next"]))
                      @if($pro->uname == $_POST["username"])
                          <?php array_push($uname_data, $pro->uname); ?>
                      @else

                      @endif

                    @endif
                @endforeach

              <?php

                if(isset($_POST["next"])) {
                  // Given password
                  $password = $_POST["password"];
                  $_SESSION['one'] = $_POST["fullname"];
                  $username = $_SESSION['two'] = $_POST["username"];
                  $fullname = $_SESSION['one'];
                  $street = $_SESSION['st']= $_POST["street"];
                  $barangay = $_SESSION['brgy']= $_POST["barangay"];
                  $city = $_SESSION['ct']= $_POST["city"];

                  // Validate password strength
                  $uppercase = preg_match('@[A-Z]@', $password);
                  $lowercase = preg_match('@[a-z]@', $password);
                  $number    = preg_match('@[0-9]@', $password);
                  $specialChars = preg_match('@[^\w]@', $password);
                  $re_password = $_POST["re_password"];

                  if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                      echo '<p1 class="text-danger">Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</p1>';
                  }elseif (in_array($username, $uname_data)) {
                      echo '<p1 class="text-danger">Your chosen username has been taken</p1>';
                  
                  }else{
                      //echo 'Strong password.';
                      if($password == $re_password){
                                      
                        $_SESSION['three'] = md5($_POST["password"]);

                        $_SESSION['next_1'] =  $_POST["fullname"];
                        if(isset($_SESSION['next_1'])&&!empty($_SESSION['next_1'])){
                          echo'<script>window.location="register_2"</script>';
                          exit();
                          
                        }
                      }else{
                        echo '<p1 class="text-danger">Password doesn\'t match</p1>';
                      }
                  } 
                }
                ?>
                  <div class="mb-4">
                  <h3>Sign Up to <strong>Transposure</strong></h3>
                  <p class="mb-4">We value your privacy here</p>
                  <p class="mb-4">Step 1 of 4</p>
                </div>
                <form action="#" method="POST">

                  <div class="form-group first">
                        <label for="fullname">Full Name</label>
                        
                        <?php echo '<input type="text" value="'.$fullname.'" class="form-control" id="fullname" name="fullname"  required>'; ?>
                        
                  </div>

                  <div class="form-group first">
                    <label for="username">Username</label>
                    <?php echo '<input type="text" value="'.$username.'" class="form-control" id="username" name="username"  required>'; ?>
                  </div>

                  <div class="form-group last mb-4">
                    <label for="street">Street</label>
                    <?php echo '<input type="text" value="'.$street.'"class="form-control" id="street" name="street"  required>'; ?>
                  </div>

                  <div class="form-group last mb-4">
                    <label for="barangay">Barangay</label>
                    <?php echo '<input type="text" value="'.$barangay.'"class="form-control" id="barangay" name="barangay"  required>'; ?>
                  </div>

                  <div class="form-group last mb-4">
                    <label for="city">City</label>
                    <?php echo '<input type="text" value="'.$city.'" class="form-control" id="city" name="city"  required>'; ?>
                  </div>

                  <div class="form-group last mb-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"  required>
                  </div>
                  
                  <div class="form-group last mb-4">
                    <label for="re-password">Retype Password</label>
                    <input type="password" class="form-control" id="re_password" name="re_password"  required>
                  </div>
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="GET">
                  <input type="submit" value="Next" class="btn text-white btn-block btn-primary" name="next">

                
                </form>
                
                <span class="d-block text-center my-4 text-muted"><a href="login" class="forgot-pass">Already have an account?</a></span> 

                
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