
<!doctype html>

<html lang="en">
<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <meta charset="utf-8">

  <title>The HTML5 Herald</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="dineropagina.css">

</head>

<body>




<div class="container">

<div class="price-box">

  <form class="form-horizontal form-pricing" role="form">

    <div class="price-slider">
      <h4 class="great">Amount</h4>
      <span>Minimum $10 is required</span>
      <div class="col-sm-12">
        <div id="slider"></div>
      </div>
    </div>
    <div class="price-slider">
      <h4 class="great">Duration</h4>
      <span>Minimum 1 day is required</span>
      <div class="col-sm-12">
        <div id="slider2"></div>
      </div>
    </div>

    <div class="price-form">

      <div class="form-group">
        <label for="amount" class="col-sm-6 control-label">Amount ($): </label>
        <span class="help-text">Please choose your amount</span>
        <div class="col-sm-6">
          <input type="hidden" id="amount" class="form-control">
          <p class="price lead" id="amount-label"></p>
          <span class="price">.00</span>
        </div>
      </div>
      <div class="form-group">
        <label for="duration" class="col-sm-6 control-label">Duration: </label>
        <span class="help-text">Choose your commitment</span>
        <div class="col-sm-6">
          <input type="hidden" id="duration" class="form-control">
          <p class="price lead" id="duration-label"></p>
          <span class="price">days</span>
        </div>
      </div>
      <hr class="style">
      <div class="form-group total">
        <label for="total" class="col-sm-6 control-label"><strong>Total: </strong></label>
        <span class="help-text">(Amount * Days)</span>
        <div class="col-sm-6">
          <input type="hidden" id="total" class="form-control">
          <p class="price lead" id="total-label"></p>
          <span class="price">.00</span>
        </div>
      </div>

    </div>

    <div class="form-group">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-primary btn-lg btn-block">Proceed <span class="glyphicon glyphicon-chevron-right pull-right" style="padding-right: 10px;"></span></button>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
        <img src="http://amirolahmad.github.io/bootstrap-pricing-slider/images/payment.png" class="img-responsive payment" />
      </div>
    </div>

  </form>

  <p class="text-center" style="padding-top:10px;font-size:12px;color:#2c3e50;font-style:italic;">Created by <a href="https://twitter.com/AmirolAhmad" target="_blank">AmirolAhmad</a></p>

</div>

</div>

<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
<script src="donardinero.js"></script>







</body>
</html>

<!------ Include the above in your HEAD tag ---------->
