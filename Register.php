<?php
include "config.php";
include "createUpdateAccount.php";
if(isset($_REQUEST['return']) == true){

		header('Location: loginform.php');
	
}
if(isset($_REQUEST['signup']) == true){

		createUpdateAccount();
	
}


?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="sleepApp.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;
      background-color: #48656D;}
* {box-sizing: border-box}

article {border: 3px solid black;
  background-color: #8FC9D9;}
  
input[type=text], input[type=password] {
  width: 50%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: 1px solid #ccc;
  background: #f1f1f1;
  box-sizing: border-box;
}

hr {
  border: 1px solid #000000;
  margin-bottom: 25px;
}
  
button {
  background-color: #243236;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
  opacity: 0.9;
}

/* Add padding to container elements */
.container {
  padding: 16px;
  text-align: center;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 10%;
  }
}
</style>
<script async src='/cdn-cgi/bm/cv/669835187/api.js'></script>

<body>
<article>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST" style=" border-bottom: none;">
		<div class="container">
		<h1>Registration</h1>
		<p>Please enter your access code.</p>
		<hr>

		<label for="code"><b>Access Code</b></label> 
		<br>
		<input type="text" placeholder="Enter Access Code" name="code" required>
		<br>
		
		<div class="clearfix">
			<button type="submit" name="signup" value="signup" class="signupbtn">Register</button>
		</div>

		<br>
		<p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

		<div>
		Already have an account? <a href="loginform.php">Login?</a>
		</div>
	</form>
</article>
</body>
<script type="text/javascript">(function(){window['__CF$cv$params']={r:'6db85c53fe8108f7',m:'fG5v43MlOAEZEhNNXVXY4zIll3KSKPF0Eo0V7eNpFpc-1644527808-0-AV823yX3vMQ3y23l7H21Y1jPpIEGLzuL53YWmTQb2KYFQB5ZGw4LZjt9Cga60iW9YUaCaSIDdHb+r0Esk3iVem3OMc1fY9dKbh5s8jTHTkDyYdWZ5IR1Qtvpa34YpCaJNQkl+H3/sA5yaKuBAE4NRQnCa/rxRLEDlU29ZVPVLxNNj0N0UQxLGma/9Ug48tsVJ9VeCcGI2H1XuATCzrHT5Qs=',s:[0xaac12ca72a,0x8f98fbb6b8],}})();</script></body>
</html>
