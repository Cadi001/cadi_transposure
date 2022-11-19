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

                  <div class="mb-4">
                  
                <?php
                      // require __DIR__ . '../../vendor/autoload.php';
                      // use Twilio\Rest\Client;
                      if(isset($_POST["change_pass"])) {
                        $myusername = $_POST["username"];
                        $_SESSION['login_user'] = $myusername;	
                        $sql = "SELECT uname FROM profiles WHERE uname = '$myusername'";
                        $result = $conn->query($sql);
                        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                        //FOR OTP CODE
                        $randomnum = rand(114751,996543);
                        $_SESSION['changeotp_code'] = $randomnum;	

                        
                        
                        $count = mysqli_num_rows($result);		  
                        if($count == 1) {			
                          try{
                            $sql_1 = "SELECT contact_no FROM profiles WHERE uname = '$myusername'";
                            $result_1 = $conn->query($sql_1);
                            $row_1 = mysqli_fetch_array($result_1,MYSQLI_ASSOC);
                            $contactfrom_db = $_SESSION['contactfrom_DB'] = $row_1['contact_no'];
                            $contact_ready = "+63" . $contactfrom_db;
                            echo'<script>window.location="changepass_otp"</script>';
                            echo $contact_ready;
                          }catch(Exception $e){
                              echo $e;
                          }
                            
                            
                            // //SEND THE OTP CODE
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
                            //     "$contact_ready",
                            //     array(
                            //         'from' => $twilio_number,
                            //         'body' => 'Your Transposure one time password is ' .$randomnum. ' please do not share this to anyone! NOTE: This is system generated.'
                            //     )
                            // );


                            // //echo'<script>window.location="changepass_now.php"</script>';
                            // //echo'success';
                        }else {
                          echo '<p1 class="text-danger">The username you provided is not associated with any account</p1>';
                        }
                      }	 

                  ?>
                  <h3>Identify yourself </h3>
                  <p class="mb-4">Who are you?</p>
                </div>
                <form action="#" method="POST">
                  <div class="form-group first">
                    <label for="username">Enter your username</label>
                    <input type="text" class="form-control" id="username" name="username"  required>
                  </div>

                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="GET">
                  <input type="submit" value="Next" class="btn text-white btn-block btn-primary" name="change_pass">

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
