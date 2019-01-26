<?php
require_once('top.php');
require_once('login_lib.php');

 ?>

<div class="inner-bg">
		<div class="container">
				<div class="row">

				</div>
				<div class="row">
						<div class="col-sm-6 col-sm-offset-3 form-box">
							<div class="form-top">
								<div class="form-top-left">
									<h3>Sign up to our site</h3>
										<p>Enter your username and password to Sign up:</p>
								</div>
								<div class="form-top-right">
									<i class="fa fa-lock"></i>
								</div>
								</div>
								<div class="form-bottom">
							<form role="form" action="signup_process.php" method="post" class="login-form" id="sign_form">
								<div class="form-group">
									<label class="sr-only" for="form-username">Username</label>
										<input type="text" name="form-username" placeholder="Username..." class="form-username form-control" id="form-username">
									</div>
									<div class="form-group">
										<label class="sr-only" for="form-password">Password</label>
										<input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
									</div>
                  <div class="form-group">
                    <label class="sr-only" for="form-password">Password</label>
                    <input type="password" name="form-repassword" placeholder="Re Password..." class="form-password form-control" id="form-repassword">
                  </div>
									<p><button type="button" class="btn" id="sign_ok_btn">Sign up!</button></p>
							</form>
						</div>
						</div>
				</div>

		</div>
</div>

<?php
require_once('bottom.php');
 ?>
