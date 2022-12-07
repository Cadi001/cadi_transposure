<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/terminal_reviews_style.css') }}">
<title>Reviews</title>
<!------ Include the above in your HEAD tag ---------->
<?php //die(json_encode($terminalData))?>
<div id="div_container" class="container">
    <div class="row">
  
        <div class="container">
                    <div class="tab-pane fade active show" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                        <div id="ratings-and-reviews" class="bg-white rounded shadow-sm p-4 mb-4 clearfix ">
                          
                            <h5 class="mb-0 pt-1">
                                <a href="../">Back</a>&nbsp&nbsp&nbsp
                                Rate 
                                @foreach($terminalName as $tn)
                                    {{$tn->slug}} 
                                @endforeach
                            </h5>
                        </div>

                        <div class="bg-white rounded shadow-sm p-4 mb-4 restaurant-detailed-ratings-and-reviews">
                            <h5 class="mb-1">All Ratings and Reviews</h5>

                            @foreach($terminalData as $value)
                              <div class="reviews-members pt-4 pb-4">
                                  <div class="media">
                                      <a href="#"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar1.png" class="mr-3 rounded-pill"></a>
                                      <div class="media-body">
                                          <div class="reviews-members-header">
                                                <p style="color:rgb(250, 151, 69);">
                                                    <?php 
                                                        if($value->star_ratings == '5'){
                                                            echo(
                                                                '<a onclick="" id="star-one"><span id="span-one" class="rate fa fa-star checked"></span></a>
                                                                 <a onclick="" id="star-two"><span id="span-two" class="rate fa fa-star checked"></span></a>
                                                                 <a onclick="" id="star-three"><span id="span-three" class="rate fa fa-star checked"></span></a>
                                                                 <a onclick="" id="star-four"><span id="span-four" class="rate fa fa-star checked"></span></a>
                                                                 <a onclick="" id="star-five" ><span id="span-five" class="rate fa fa-star checked"></span></a>');
                                                        }elseif ($value->star_ratings == '4') {
                                                            echo(
                                                                '<a onclick="" id="star-one"><span id="span-one" class="rate fa fa-star checked"></span></a>
                                                                 <a onclick="" id="star-two"><span id="span-two" class="rate fa fa-star checked"></span></a>
                                                                 <a onclick="" id="star-three"><span id="span-three" class="rate fa fa-star checked"></span></a>
                                                                 <a onclick="" id="star-four"><span id="span-four" class="rate fa fa-star checked"></span></a>
                                                                 <a onclick="" id="star-one"><span id="span-one" class="rate fa fa-star unchecked"></span></a>');
                                                        }elseif ($value->star_ratings == '3') {
                                                            echo(
                                                                '<a onclick="" id="star-one"><span id="span-one" class="rate fa fa-star checked"></span></a>
                                                                 <a onclick="" id="star-two"><span id="span-two" class="rate fa fa-star checked"></span></a>
                                                                 <a onclick="" id="star-three"><span id="span-three" class="rate fa fa-star checked"></span></a>
                                                                 <a onclick="" id="star-one"><span id="span-one" class="rate fa fa-star unchecked"></span></a>
                                                                 <a onclick="" id="star-one"><span id="span-one" class="rate fa fa-star unchecked"></span></a>');
                                                        }elseif ($value->star_ratings == '2') {
                                                            echo(
                                                                '<a onclick="" id="star-one"><span id="span-one" class="rate fa fa-star checked"></span></a>
                                                                 <a onclick="" id="star-two"><span id="span-two" class="rate fa fa-star checked"></span></a>
                                                                 <a onclick="" id="star-one"><span id="span-one" class="rate fa fa-star unchecked"></span></a>
                                                                 <a onclick="" id="star-one"><span id="span-one" class="rate fa fa-star unchecked"></span></a>
                                                                 <a onclick="" id="star-one"><span id="span-one" class="rate fa fa-star unchecked"></span></a>');
                                                        }elseif ($value->star_ratings == '1') {
                                                            echo('<a onclick="" id="star-one"><span id="span-one" class="rate fa fa-star checked"></span></a>
                                                                    <a onclick="" id="star-one"><span id="span-one" class="rate fa fa-star unchecked"></span></a>
                                                                    <a onclick="" id="star-one"><span id="span-one" class="rate fa fa-star unchecked"></span></a>
                                                                    <a onclick="" id="star-one"><span id="span-one" class="rate fa fa-star unchecked"></span></a>
                                                                    <a onclick="" id="star-one"><span id="span-one" class="rate fa fa-star unchecked    "></span></a>
                                                            ');
                                                        }
                                                        
                                                    ?>
                                                </p>
                                              <h6 class="mb-1"><a class="text-black" href="#">{{$value->commented_by}}</a></h6>
                                              <p class="text-gray">Posted on {{$value->date_posted}}</p>
                                          </div>
                                          <div class="reviews-members-body">
                                              <p>{{$value->body}}</p>
                                          </div>
                                          {{-- <div class="reviews-members-footer">
                                              <a class="total-like" href="#"><i class="icofont-thumbs-up"></i> 856M</a> <a class="total-like" href="#"><i class="icofont-thumbs-down"></i> 158K</a>
                                          </div> --}}
                                      </div>
                                  </div>
                              </div>
                              <hr>
                            @endforeach
                            
                            {{-- <a class="text-center w-100 d-block mt-4 font-weight-bold" href="#">See All Reviews</a> --}}
                        </div>
            <?php if(isset($_SESSION['fullname'])){
                if($_SESSION['fullname'] == ""){

                }else{
            
            
            ?>
                        <div class="bg-white rounded shadow-sm p-4 mb-5 rating-review-select-page">
                            <h5 class="mb-4">Rate now</h5>
                            <div style="font-size: 30px">
                                <button onclick="rateone()" id="star_btn1" class="star_btn"><span  class="rate fa fa-star"></span></button>
                                <button onclick="ratetwo()" id="star_btn2" class="star_btn"><span  class="rate fa fa-star"></span></button>
                                <button onclick="ratethree()" id="star_btn3" class="star_btn"><span class="rate fa fa-star"></span></button>
                                <button onclick="ratefour()" id="star_btn4" class="star_btn"><span  class="rate fa fa-star"></span></button>
                                <button onclick="ratefive()" id="star_btn5" class="star_btn"><span class="rate fa fa-star re"></span></button>
                            </div>

                            <script>
                                function rateone(){
                                    document.getElementById("star_val").value = 1;
                                    document.getElementById("star_btn1").style.color = "orange";
                                    document.getElementById("star_btn2").style.color = "gray";
                                    document.getElementById("star_btn3").style.color = "gray";
                                    document.getElementById("star_btn4").style.color = "gray";
                                    document.getElementById("star_btn5").style.color = "gray";
                                }
                                function ratetwo(){
                                    document.getElementById("star_val").value = 2;
                                    document.getElementById("star_btn1").style.color = "orange";
                                    document.getElementById("star_btn2").style.color = "orange";
                                    document.getElementById("star_btn3").style.color = "gray";
                                    document.getElementById("star_btn4").style.color = "gray";
                                    document.getElementById("star_btn5").style.color = "gray";
                                }
                                function ratethree(){
                                    document.getElementById("star_val").value = 3;
                                    document.getElementById("star_btn1").style.color = "orange";
                                    document.getElementById("star_btn2").style.color = "orange";
                                    document.getElementById("star_btn3").style.color = "orange";
                                    document.getElementById("star_btn4").style.color = "gray";
                                    document.getElementById("star_btn5").style.color = "gray";
                                }
                                function ratefour(){
                                    document.getElementById("star_val").value = 4;
                                    document.getElementById("star_btn1").style.color = "orange";
                                    document.getElementById("star_btn2").style.color = "orange";
                                    document.getElementById("star_btn3").style.color = "orange";
                                    document.getElementById("star_btn4").style.color = "orange";
                                    document.getElementById("star_btn5").style.color = "gray";
                                    
                                }
                                function ratefive(){
                                    document.getElementById("star_val").value = 5;
                                    document.getElementById("star_btn1").style.color = "orange";
                                    document.getElementById("star_btn2").style.color = "orange";
                                    document.getElementById("star_btn3").style.color = "orange";
                                    document.getElementById("star_btn4").style.color = "orange";
                                    document.getElementById("star_btn5").style.color = "orange";
                                }

                            </script>

                            <p class="mb-2">what can you say about 
                              @foreach($terminalName as $tn)
                                  {{$tn->slug}} Terminal?
                              @endforeach
                            </p>
                            <?php 
                                if(isset($_POST['submit_comment'])){
                                    $_SESSION['comment'] = $_POST['comment'];
                                    $_SESSION['star_val'] = $_POST['star_val'];
                                    echo'<script>window.location="../submit_comment"</script>';
                                }
                            ?>
                            <form method="POST">
                                <input type="hidden" id="star_val" name="star_val" value="0">
                                <div class="form-group">
                                    <textarea style="height: 15%" class="form-control" name="comment"></textarea>
                                </div>
                                <div style="direction: rtl;" class="form-group">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="GET">
                                    <input style="display: block; padding: 12px" class="btn btn-dark btn-sm" value="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Rate &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp " type="submit" name="submit_comment">
                                </div>
                            </form>
                    <?php }} ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>





    </div>
</div>
<script src="https://kit.fontawesome.com/52721c09fd.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>