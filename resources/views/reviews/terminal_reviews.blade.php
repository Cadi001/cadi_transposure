<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/terminal_reviews_style.css') }}">
<title>Reviews</title>
<!------ Include the above in your HEAD tag ---------->
<?php //die(json_encode($terminalData))?>
<div class="container">
   
<div class="container">
    <div class="row">
  
    
      
      
        <link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css" integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">
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
                                                                 <a onclick="" id="star-four"><span id="span-four" class="rate fa fa-star"></span></a>
                                                                 <a onclick="" id="star-five" ><span id="span-five" class="rate fa fa-star re"></span></a>');
                                                        }elseif ($value->star_ratings == '4') {
                                                            echo(
                                                                '<a onclick="" id="star-one"><span id="span-one" class="rate fa fa-star checked"></span></a>
                                                                 <a onclick="" id="star-two"><span id="span-two" class="rate fa fa-star checked"></span></a>
                                                                 <a onclick="" id="star-three"><span id="span-three" class="rate fa fa-star checked"></span></a>
                                                                 <a onclick="" id="star-four"><span id="span-four" class="rate fa fa-star"></span></a>');
                                                        }elseif ($value->star_ratings == '3') {
                                                            echo(
                                                                '<a onclick="" id="star-one"><span id="span-one" class="rate fa fa-star checked"></span></a>
                                                                 <a onclick="" id="star-two"><span id="span-two" class="rate fa fa-star checked"></span></a>
                                                                 <a onclick="" id="star-three"><span id="span-three" class="rate fa fa-star checked"></span></a>');
                                                        }elseif ($value->star_ratings == '2') {
                                                            echo(
                                                                '<a onclick="" id="star-one"><span id="span-one" class="rate fa fa-star checked"></span></a>
                                                                 <a onclick="" id="star-two"><span id="span-two" class="rate fa fa-star checked"></span></a>');
                                                        }elseif ($value->star_ratings == '1') {
                                                            echo('<a onclick="" id="star-one"><span id="span-one" class="rate fa fa-star checked"></span></a>');
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
                        <div class="bg-white rounded shadow-sm p-4 mb-5 rating-review-select-page">
                            <h5 class="mb-4">Rate now</h5>
                            <div style="font-size: 30px">
                                <a onclick="" id="star-one"><span id="span-one" class="rate fa fa-star checked"></span></a>
                                <a onclick="" id="star-two"><span id="span-two" class="rate fa fa-star checked"></span></a>
                                <a onclick="" id="star-three"><span id="span-three" class="rate fa fa-star checked"></span></a>
                                <a onclick="" id="star-four"><span id="span-four" class="rate fa fa-star"></span></a>
                                <a onclick="" id="star-five" ><span id="span-five" class="rate fa fa-star re"></span></a>
                            </div>
                            
                            <p class="mb-2">what can you say about 
                              @foreach($terminalName as $tn)
                                  {{$tn->slug}} Terminal?
                              @endforeach
                            </p>
                            <?php 
                                if(isset($_POST['submit_comment'])){
                                    $_SESSION['comment'] = $_POST['comment'];
                                    echo'<script>window.location="../submit_comment"</script>';
                                }
                            ?>
                            <form method="POST">
                                <div class="form-group">
                                    <textarea style="height: 15%" class="form-control" name="comment"></textarea>
                                </div>
                                <div style="direction: rtl;" class="form-group">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="GET">
                                    <input style="display: block; padding: 12px" class="btn btn-dark btn-sm" value="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Rate &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp " type="submit" name="submit_comment">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>





    </div>
</div>
<script src="https://kit.fontawesome.com/52721c09fd.js" crossorigin="anonymous"></script>