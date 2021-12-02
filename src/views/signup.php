<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/views/header.php";
?>
<body>
<div class="form m-4">
  <?php if(FlashController::hasFlash()) : ?>
    <div class="alert alert-danger" role="alert">
      <?= FlashController::getFlash(); ?>
    </div
  <?php endif; ?>
  <div></div>
  <form action="/addUser" method="post">
    <label>First Name : </label>
    <input type="text" name="firstname"/><br />
    <label>Last Name : </label>
    <input type="text" name="lastname"/><br />
    <label>Email : </label>
    <input type="email" name="email"/><br />
    <label>Admin : </label>
    <input type="checkbox" name="admin" value="true" /><br/>
    <label>Password : </label>
    <input type="password" name="pass"/><br />
    <label>Verify Password : </label>
    <input type="password" name="pass_verify"/><br />
    <br>
    <input type="submit" value="Envoyer">
  </form>
</div>  
<!-- <div class="signup-form">
    <form action="/examples/actions/confirmation.php" method="post" class="form-horizontal">
      	<div class="row">
        	<div class="col-8 offset-4">
				<h2>Sign Up</h2>
			</div>	
      	</div>			
        <div class="form-group row">
			<label class="col-form-label col-4">Username</label>
			<div class="col-8">
                <input type="text" class="form-control" name="username" required="required">
            </div>        	
        </div>
		<div class="form-group row">
			<label class="col-form-label col-4">Email Address</label>
			<div class="col-8">
                <input type="email" class="form-control" name="email" required="required">
            </div>        	
        </div>
		<div class="form-group row">
			<label class="col-form-label col-4">Password</label>
			<div class="col-8">
                <input type="password" class="form-control" name="password" required="required">
            </div>        	
        </div>
		<div class="form-group row">
			<label class="col-form-label col-4">Confirm Password</label>
			<div class="col-8">
                <input type="password" class="form-control" name="confirm_password" required="required">
            </div>        	
        </div>
		<div class="form-group row">
			<div class="col-8 offset-4">
				<p><label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a>.</label></p>
				<button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
			</div>  
		</div>		      
    </form>
	<div class="text-center">Already have an account? <a href="#">Login here</a></div>
</div> -->
</body>
</html>