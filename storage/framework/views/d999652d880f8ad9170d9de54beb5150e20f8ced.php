<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
	overflow: hidden;
	background-color: rgb(0, 115, 0);
	position: fixed;
  	width: 100%;
  	top: 0;
}

li a {
	display: block;
	color: white;
	text-align: center;
	padding: 20px 20px;
	
	text-decoration: none;
	font-size: 25px;
	float: left;
}

li a:hover {
	background-color: rgb(190, 240, 35);
	text-decoration: none;
}

li.right {
	float: right;
	
}

form {
	text-align: center;
	margin-top: 100px;
}

h2 {
	
	margin-bottom: 5px;
}

input[type=text], input[type=date], input[type=email], input[type=password]{
  width: 30%;
  padding: 10px;
  
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

input[name=state], input[name=zipcode]{
	width: 14.1%;
	padding: 10px;
	border: 1px solid #ccc;
 	border-radius: 4px;
  	resize: vertical;

}

input[type=submit] {
  background-color: rgb(0, 115, 0);
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: center;
  font-size:15px;
}

input[type=submit]:hover {
  background-color: rgb(190, 240, 35);
}

.login a:link {
	color: black;
	font-size: 20px;
}

.login a:hover{
	background-color: rgb(218, 240, 110);
}
.error {color: #FF0000;}
</style>
</head>

<body>
	
	<form action="login" method="post">
	<div class="text"><h2>Welcome, Please Login</h2></div>
	<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
	<input name="email" type="text" placeholder="Email">
	<?php if($errors->first('email')): ?>
		<div class="alert-danger"><?php echo e($errors->first('email')); ?></div>
	<?php endif; ?>
	<br>	
	<input name="password" type="password" placeholder="Password">
		
	<?php if($errors->first('password')): ?>
	<div class="alert-danger"><?php echo e($errors->first('password')); ?></div>
	<?php endif; ?>
	<br>
	<div class="forgot-pass">
		<a href="#">Forgot Password?</a>
	</div>
		<input type="submit" value="Sign in"  name="submit"/>
	<div class="signup-link">
		Not a member? <a href="/MilestonePHP3/public/register">Signup now</a>
			</div>
	</form>
</body>
</html>
<?php /**PATH C:\Users\Alexv\Documents\1.LaravelWorkspace\MilestonePHP3\resources\views//login.blade.php ENDPATH**/ ?>