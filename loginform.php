<?php
include "config.php";

if (isset($_REQUEST['signUp'])){
	
	header('Location: Register.php');
	
}
elseif (isset($_REQUEST['submit'])){
	//get email and password input and hash the password for comparison
	$p1 = $_POST['password'];
	$email = $_POST['email'];
	$hashPass = hash('sha512',$p1);
	//get the client ID from the database
	$sql = "select * from Client where Email = '$email'";
	$result = $conn -> query($sql);
	$row = $result -> fetch_assoc();
	//$numRow = $result -> num_rows;
	//ensure a client ID came back from the database if not send error to user
	if ($row == null) {
		
		echo '<script>alert("Email invalid. Please enter a valid email")</script>';
		
	}
	else{
		//get client ID from row
		
		$clientID = $row['Client_ID'];
		$comID = $row['Com_ID'];
		$firstName = $row['First_Name'];
		$lastName = $row['Last_Name'];
		$phone = $row['Phone'];
		$email = $row['Email'];
		$admin = $row['Administrator'];
		
		
		$hashID = hash('sha512',$clientID);
		$sql2 = "select Password from Password where Client_ID = '$hashID'";
		$result2 = $conn -> query($sql2);
		$row2 = $result2 -> fetch_assoc();
		$salt = $row2['Password'];
		
		if ($salt == $hashPass) {
			session_start();
			$_SESSION['clientID'] = $clientID;
			$_SESSION['comID'] = $comID;
			$_SESSION['firstName'] = $firstName;
			$_SESSION['lastName'] = $lastName;
			$_SESSION['phone'] = $phone;
			$_SESSION['email'] = $email;
			$_SESSION['admin'] = $admin;
			session_write_close();
			header('Location: home.html');
			
		}
	}


}
?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="sleepApp.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;
        background-color:#48656D ;}
form {border: 3px solid black;
  background-color: #8FC9D9;}

input[type=text], input[type=password], input[type=email] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #243236;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
}

hr {
  border: 1px solid #000000;
  margin-bottom: 25px;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: 20%;
  padding: 14px 20px;
  background-color: #243236;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
  text-align: center;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }

}
</style>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style=" border-bottom: none;">
  <div class="container">
    <h1>Login</h1>
    <p>Please enter your credentials.</p>
    <hr>
	
    <label for="Email"><b>Email</b></label>
    <br>
    <input type="email" placeholder="Enter Email" name="email" required>
    <br>
	
    <label for="Password"><b>Password</b></label>
    <br>
    <input type="Password" placeholder="Enter Password" name="password" required>
    <br>
	
	<button type="submit" method="POST" name="submit" id="but_submit" >Login</button>
<br>
		
		<div>
			<label>
			<input type="checkbox" checked="checked" name="remember"> Remember me
			</label>
		</div>
	<div class="container" style="background-color: #8FC9D9; height: auto:">	
		<div>
			<div>
			<span>Forgot <a href="#">password?</a></span>
			</div>
			<div>
			<span>Need to <a href="Register.php">Register?</a></span>
			</div>
		</div>
	</div>
	<div class="container" style="background-color: #8FC9D9;">
	</div>
	<div class="container" style="background-color: #8FC9D9;">
	</div>
	
	</div>
</form>
</body>
</html>
