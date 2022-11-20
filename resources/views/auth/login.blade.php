<?php
  //echo'<script>window.location="register.php"</script>';

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


  if(isset($_SESSION['login_user']) && !empty($_SESSION['login_user'])){
    echo'<script>window.location="../"</script>';
    exit();
  }
  else{
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
                      if(isset($_POST["login"])) {
                        $myusername = $_POST["username"];
                        $mypassword = $_POST["password"];
                        $sql = "SELECT id, fullname, uname, is_active FROM profiles WHERE uname = '$myusername' AND pword = '$mypassword'";
                        $result = $conn->query($sql);
                        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);		 
                        
                        $count = mysqli_num_rows($result);	

                            if($count == 1) {		
                              //CHECK IF ACCOUNT IS ACTIVE
                              $is_active =  isset($row['is_active']) ? $row['is_active'] : 0;
                              $id = $_SESSION['id'] = $row['id'];
                              $id = $_SESSION['fullname'] = $row['fullname'];
                              if($is_active == 1){	
                                  $_SESSION['login_user'] = $myusername;			 
                                  echo'<script>window.location="../"</script>';
                                  echo'hatdog';
                              }else{
                                echo '<p1 class="mb-4 h-100 d-flex align-items-center 
                                justify-content-center text-danger">Your account is already deactivated</p1>';
                              }
                            }else {
                            $error = "Your Login Name or Password is invalid";
                                  echo '<p1 class="mb-4 h-100 d-flex align-items-center 
                                  justify-content-center text-danger">Incorrect username or password!</p1>';
                            }

                      }	 

                  ?>
                  <img id="logo" style="height: 50px; width: 50px; margin-bottom: 20px" src="{{ asset('images/transposure_logo.png') }}" alt="Transposure">
                  <h3>Sign In to <strong>Transposure</strong></h3>
                  <p class="mb-4">WELCOME COMMUTER</p>
                </div>
                <form action="#" method="POST">
                  <div class="form-group first">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username"  required>

                  </div>
                  <div class="form-group last mb-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"  required>
                  </div>
                  <div class="text-right"><span><a href="changepass" class="forgot-pass">Forgot password</a></div>
                  <br>
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="GET">
                  <input type="submit" value="Login" class="btn text-white btn-block btn-primary" name="login">

                  <span class="d-block text-center my-4 text-muted"><a href="register" class="forgot-pass">No account yet?</a></span> 
                  
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
@include('components/footer')
<?php
  }
?> 
