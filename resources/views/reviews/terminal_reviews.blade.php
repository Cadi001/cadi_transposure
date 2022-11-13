<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/terminal_reviews_style.css') }}">
<!------ Include the above in your HEAD tag ---------->
<?php //die(json_encode($terminalData))?>
<div class="container">
    <div class="row">
        <div style="text-align: center; padding: 3%">
            <h2>Want to share your experience with 
              @foreach($terminalName as $tn)
                {{$tn->slug}} 
              @endforeach
                Terminal
              ?
            </h2>
        </div>
    <table width="100%" border="0">
      <div class="col-md-9 col-md-offset-0">
        <tr><td width="77%">
        <div class="">
          <form class="form-horizontal" action="send.php" method="post">
          <fieldset>
    
          <!-- Message body -->
          <div class="form-group">
            <label class="col-md-3 control-label" for="message">Your message</label>
            <div class="col-md-9">
              <textarea class="form-control" id="message" name="message" placeholder="Please enter your feedback here..." rows="5"></textarea>
            </div>
          </div>
          <div style="text-align: end">
              <button style="width: 74%" type="submit" class="btn btn-primary btn-md">Submit</button>
          </div>

    </td>
    <td align="center" valign="top" width="23%">
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-1 text-center">

              </div>
            </div>
          </fieldset>
          </form>
        </div>
    </div>
    </td>
    </tr>
    </table>
</div>

<div class="container">
    <div class="row">
        <h2>Comments</h2>
        
        @foreach($terminalData as $value)
          <div class="col-md-6">
            <div class="blockquote-box blockquote-success clearfix">
                <div class="square pull-left">
                    <span class="glyphicon glyphicon-tree-conifer glyphicon-lg"></span>
                </div>
                <h4>{{$value->commented_by}}</h4>
                <p>{{$value->body}}</p>
                <p><small>Posted on {{$value->date_posted}}</small></p>
            </div>
          </div>
        @endforeach
      

    </div>
</div>
