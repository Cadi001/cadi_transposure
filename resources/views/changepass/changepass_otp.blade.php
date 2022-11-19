<?php
	if(session_id() == '') {
    session_start();
}

	//require "../database/db.php";
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

                        $otp_code = $_SESSION['changeotp_code'];

                        if($_POST["user_otp"] == $otp_code){
                          echo'<script>window.location="changepass_now"</script>';
                        }else{
                          echo '<p1 class="text-danger">Incorrect otp code</p1>';
                        }
                      }
                  ?>

                    
                  <div class="mb-4">
                  <h3>Enter OTP that was sent to your number </h3>
                  <p class="mb-4">verify if it was yours</p>
                </div> 


                  <br><br>
                
                <form action="#" method="POST">
                  <div class="form-group first">
                    <?php echo($_SESSION['changeotp_code']); ?>
                    <label for="contact">Enter 6 digit Code sent to you.</label>
                    <input type="number" class="form-control" id="contact" name="user_otp" onKeyDown="if(this.value.length==11 && event.keyCode!=6) return false;" required>
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