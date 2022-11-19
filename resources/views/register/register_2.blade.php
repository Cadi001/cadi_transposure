<?php
	if(session_id() == '') {
    session_start();
}
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
                  if(isset($_POST["next_2"])) {
                    $_SESSION['four'] = $_POST["email"];
                    $email = $_SESSION['email_verify'] = $_POST["email"];

                    //validate email if it is GMAIL
                    $checkmail = preg_match("~@gmail\.com$~",$email);
                    if(!$checkmail){
                      echo '<p1 class="text-danger">Please use Google email only</p1>';
                    }else{                       
                      $otp = rand(10,100);
                      if(isset($_SESSION['email_verify'])&&!empty($_SESSION['email_verify'])){
                        echo'<script>window.location="register_3"</script>';
                        exit();
                        
                      }
                    }
                  }
                ?>


                  <div class="mb-4">
                    <h3>Sign Up to <strong>Transposure</strong></h3>
                    <p class="mb-4">Step 2 of 4</p>
                  </div>

                <form action="#" method="POST">
                  <div class="form-group first">
                    <label for="email">Enter your valid email address</label>
                    <input type="email" class="form-control" id="email" name="email"  required>
                  </div>
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="GET">
                  <input type="submit" value="Next" class="btn text-white btn-block btn-primary" name="next_2">
                
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