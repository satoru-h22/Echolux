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
	$sql = "select Client_ID, Administrator from Client where Email = '$email'";
	$result = $conn -> query($sql);
	//$numRow = $result -> num_rows;
	//ensure a client ID came back from the database if not send error to user
	if ($result === false) {
		
		echo"Email invalid";
		
	}
	else{
		//get client ID from row
		$row = $result -> fetch_assoc();
		$clientID = $row['Client_ID'];
		$admin = $row['Administrator'];
		$hashID = hash('sha512',$clientID);
		$sql2 = "select Password from Password where Client_ID = '$hashID'";
		$result2 = $conn -> query($sql2);
		$row2 = $result2 -> fetch_assoc();
		$salt = $row2['Password'];
		
		if ($salt == $hashPass) {
			
			session_start();
			$_SESSION['ClientID'] = $clientID;
			$_SESSION['admin'] = $admin;
			
			header('Location: profile.php');
		}
	}


}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid black;}

input[type=email], input[type=password] {
  width: 20%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: black;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
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

<h2>Login Form</h2>

<form action="" method="post">
  <div class="imgcontainer">
   <h2>Sleep App</h2>
  </div>

  <div class="container">
    <label for="Email"><b>Email</b></label>
    <br>
    <input type="email" placeholder="Email" name="email" required>
    <br>
    <label for="Password"><b>Password</b></label>
    <br>
    <input type="Password" placeholder="Enter Password" name="password" required>
        <br>
    <button type="submit" method="POST" name="submit" id="but_submit" >Login</button>

    <br>
  </div>

  <div class="container" style="background-color:#f1f1f1">
 	<button type="submit" value="signUp" name="signUp" id="signUp" /> Register</button>
  </div>
</form>
</body>
</html>