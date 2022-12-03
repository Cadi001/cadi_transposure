<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <title> Route </title>
    </head>
    <body style="background-color: #1D2C4D; color: white !important;">
        {{-- <h4>From: {{ $profile['direction_from']}} <br> To: {{ $profile['direction_to']}}</h4>
        <p>{!! $profile['description'] !!}</p> --}}
   

        <div class="card" style="width: 100%;">
            <ul class="list-group list-group-flush ">
                @foreach(explode(',',$p_route['description']) as $row)
                    <li style="background-color: #1D2C4D !important; border-color:#304A7D;" class="list-group-item">{!!$row!!}</li>
                @endforeach
            </ul>
        </div>
    </body>
</html> 
<style>
    /* width */
    ::-webkit-scrollbar {
      width: 10px;
    }
    
    /* Track */
    ::-webkit-scrollbar-track {
      background: #f1f1f1; 
    }
     
    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #888; 
    }
    
    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #555; 
    }
    </style>
<script src="https://kit.fontawesome.com/52721c09fd.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>