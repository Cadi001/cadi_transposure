<?php
	if(session_id() == '') {
    session_start();
}
  $contact_no = 0;
  $randomnum = 0;

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
                  <div class="mb-4">
                  <h3>Sign Up to <strong>Transposure</strong></h3>
                  <p class="mb-4">Step 3 of 4</p>
                </div>

                <form action="#" method="POST">
                  <div class="form-group first">
                    <label for="contact">Contact Number(e.g. 09xxxxxxxxx)</label>

                    <?php echo '<input type="number" value = "'.$contact_no.'" class="form-control" id="contact" name="contact" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;" required>'; ?>
                  </div>
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="GET">
                  <input type="submit" value="Next" class="btn text-white btn-block btn-primary" name="register">
                
                </form>

                <?php
                    if(isset($_POST["register"])) {

                      $contact_no = $_SESSION['contact_no'] = $_POST["contact"];                   
                      echo'<script>window.location="register_otp"</script>';
                      $randomnum = rand(114751,996543);
                      $_SESSION['otp_code'] = $randomnum;
                    


                    }
                ?>

              </div>
              <?php
                  // require  ('..\vendor\autoload.php');
                  // use Twilio\Rest\Client;

                  // // Your Account SID and Auth Token from twilio.com/console
                  // $account_sid = 'ACe245059956f00101fe289c1b339cff18';
                  // $auth_token = '56c3fa40831db5f75c67c5868d750139';
                  // // In production, these should be environment variables. E.g.:
                  // // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

                  // // A Twilio number you own with SMS capabilities
                  // $twilio_number = "+12052931434";
                  // $client = new Client($account_sid, $auth_token);
                  // $client->messages->create(
                  //     // Where to send a text message (your cell phone?)
                  //     '+639973309650',
                  //     array(
                  //         'from' => $twilio_number,
                  //         'body' => 'Your Transposure one time password is ' .$randomnum. ' please do not share this to anyone!'
                  //     )
                  // );
            ?>
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