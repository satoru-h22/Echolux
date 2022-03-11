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
<style>
body {font-family: Arial, Helvetica, sans-serif;
          background-color: #48656D;}
form {border: 3px solid black;
  background-color: #8FC9D9;}

input[type=email], input[type=password] {
  width: 20%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  background: #f1f1f1;
  box-sizing: border-box;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: rgb(228, 220, 220);
  outline: rgb(5, 5, 5);
}

button {
  background-color: #243236;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 8%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #243236;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

.container {
  padding: 20px;
  
text-align: center;
}

span.psw {
  float: center;
  padding-top: 10px;
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
    <input type="email" placeholder="Email" name="email" >
    <br>
    <label for="Password"><b>Password</b></label>
    <br>
    <input type="Password" placeholder="Enter Password" name="password" >
        <br>
		<button type="submit" method="POST" name="submit" id="but_submit" >Login</button>
        

    <button type="submit" value="signUp" name="signUp" id="signUp">Sign up</button>

          <br>
          <span class="psw">Forgot <a href="#">password?</a></span>
  </div>

  <div class="container" style="background-color:#8FC9D9">
    
  </div>
</form>
</body>
</html>