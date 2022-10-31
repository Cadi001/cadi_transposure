<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="../fonts/icomoon/style.css">
        <link rel="stylesheet" href="../css/owl.carousel.min.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <!-- Style -->
        <link rel="stylesheet" href="../css/style.css">

        <title> {{ $heading }} </title>

    </head>
    <body>
        @if ($logged_in  == 'true')
                
            <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <span class="d-block text-center my-4 text-muted"><a href=".." class="forgot-pass">&nbsp&nbsp&nbsp&nbspBack</a></span>
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{$profile['fullname']}}</span><span class="text-black-50">{{$profile['email']}}</span><span> </span></div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Fullname</label><input type="text" class="form-control" placeholder="Fullname" value="{{ $profile['fullname']}}" disabled></div>
                            
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value="{{ $profile['contact_no']}}" disabled></div>
                            <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address line 1" value="{{ $profile['street'] .', '.$profile['barangay'].', '.$profile['city']. '.'}}" disabled></div>
                            <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value="{{$profile['email']}}" disabled></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value="Philippines" disabled></div>
                            <div class="col-md-6"><label class="labels">City/ Province</label><input type="text" class="form-control" value="Angeles City" placeholder="state" disabled></div>
                        </div>
                        <br>
                        <div class="col-md-12"><button id="submit" class="btn text-white btn-block btn-primary">Save Changes</button></div>
                    </div>
                </div>
                </div>
            </div>
        @else
            @header("http://127.0.0.1:8000/login")
    @endif

    </body>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script src="https://kit.fontawesome.com/52721c09fd.js" crossorigin="anonymous"></script>
</html>