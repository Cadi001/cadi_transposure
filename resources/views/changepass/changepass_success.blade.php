<?php
	if(session_id() == '') {
    session_start();
}
  session_unset();
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
                  <h3><strong>GREAT!</strong></h3>
                  <h2>You successfully changed your password!</h2>
                  <p class="mb-4">Be safe!</p>
                </div>

                <form action="#" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="GET">
                  <input type="submit" value="Go to login page" class="btn text-white btn-block btn-primary" name="okay">

                </form>
                
                <?php
                  if(isset($_POST["okay"])) {
                    echo'<script>window.location="login"</script>';
                    exit();
                      }
                  
                ?>

                
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





