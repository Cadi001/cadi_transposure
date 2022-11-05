<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/terminal_reviews_style.css') }}">
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div style="text-align: center; padding: 3%">
            <h2>Want to share your experience?</h2>
        </div>
    <table width="100%" border="0">
      <div class="col-md-9 col-md-offset-0">
        <tr><td width="77%">
        <div class="">
          <form class="form-horizontal" action="send.php" method="post">
          <fieldset>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Full Name</label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Your E-mail</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
              </div>
            </div>
    
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
        <h2>
            Featured Testimonials</h2>
        <div class="col-md-6">
           
            <div class="blockquote-box blockquote-success clearfix">
                <div class="square pull-left">
                    <span class="glyphicon glyphicon-tree-conifer glyphicon-lg"></span>
                </div>
                <h4>
                    John Doe</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a
                    ante.
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="blockquote-box blockquote-info clearfix">
                <div class="square pull-left">
                    <span class="glyphicon glyphicon-info-sign glyphicon-lg"></span>
                </div>
                <h4>
                    John Doe</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a
                    ante.
                </p>
            </div>
        </div>
    </div>
</div>
