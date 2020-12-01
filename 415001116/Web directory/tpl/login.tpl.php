<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Login|Quwius</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<nav>
			<a href="index.php?controller=Index"><img src="images/logo.png" alt="UWI online"></a>
			<ul>
				<li><a href="index.php?controller=Courses">Courses</a></li>
				<li><a href="index.php?controller=Streams">Streams</a></li>
				<li><a href="index.php?controller=AboutUs">About Us</a></li>
				<li><a href="index.php?controller=Login">Login</a></li>
				<li><a href="index.php?controller=SignUp">Sign Up</a></li>
			</ul>
		</nav>
		<main>
		   <div class="login-box">
			<div class="login-box-body">
			<p class="login-box-msg">Be Curious - Sign In</p>
			<form action=" " method="post">
			<?php
                if (isset($errors) && !empty($errors)): ?>
                  <ul>
                <?php
                  foreach ($errors as $err_msg): ?>
                     <li><?php echo $err_msg ?></li>
                <?php 
                  endforeach; ?>
                  </ul>
              <?php
              endif; ?>
			  <div class="form-group has-feedback">
			  <input id = "email" class="form-control" type = "email" placeholder="Email" name = "email" 
                    value = "<?php if (isset($email)): echo $email; endif; ?>"
                    <?php 
                        if (isset($errors['email'])): ?>
                            class = "err" 
                        <?php endif; ?> > &nbsp;
                        <span class = "result" id = "email">
                        <?php if (isset($errors['email'])): echo $errors['email']; endif; ?></span>
                            <br><br> &nbsp;
			  </div>
			  <div class="form-group has-feedback">
                    <input id = "psw" class="form-control" type = "password" placeholder="Password" name = "psw" 
                    value = "<?php if (isset($psw)): echo $psw; endif; ?>"
                    <?php 
                    if (isset($errors['psw'])): ?>
                            class = "err" 
                    <?php endif; ?> > &nbsp;
                    <span class = "result" id = "psw">
                    <?php if (isset($errors['psw'])): echo $errors['psw']; endif; ?></span>
                        <br><br> &nbsp;
			  </div>
			  <div class="row">
				<div class="col-xs-8">    
				  <div class="checkbox icheck">
					<label>
					  <input type="checkbox"> Remember Me
					</label>
				  </div>                        
				</div><!-- /.col -->
				<div class="col-xs-4">
				  <button type="submit" id = "login" class="btn btn-primary btn-block btn-flat">Sign In</button>
				</div><!-- /.col -->
			  </div>
			</form>
			<br>
			<a href="register.html" class="text-center">Sign Up</a>
       </div><!-- /.login-box-body -->
	  </div>
			<footer>
				<nav>
					<ul>
						<li>&copy;2015 Quwius Inc.</li>
						<li><a href="#">Company</a></li>
						<li><a href="#">Connect</a></li>
						<li><a href="#">Terms &amp; Conditions</a></li>
					</ul>
				</nav>
			</footer>
		</main>
	</body>
</html>