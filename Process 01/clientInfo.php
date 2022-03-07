<?php
include 'createUpdateAccount.php';
session_start();
$editClientID = $_SESSION['editClientID'];
if(isset($_REQUEST['submit']) == true){
	$clientType = "new";
	writeToAccount($clientType);
	
}
?>
<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;
      background-color: #48656D;}
* {box-sizing: border-box}
form {border: 3px solid black;
  background-color: #8FC9D9;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 20%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: 1px solid #ccc;
  background: #f1f1f1;
  box-sizing: border-box;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: rgb(228, 220, 220);
  outline: rgb(5, 5, 5);
}

hr {
  border: 1px solid #000000;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
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

button:hover {
  opacity:0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
  padding: 14px 20px;
  background-color: #243236;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
    text-align: center;
  float: center;
  width: 20%;
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
     width: 20%;
  }
}
</style>
<script async src='/cdn-cgi/bm/cv/669835187/api.js'></script><body>

<form action="" method = "post" style="border:1px solid #ccc">
  <div class="container">
    <h1>Client Information</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
   

    <label for="Email"><b>Email</b></label> 
    <br>
    <input type="text" placeholder="Enter Email" name="editEmail" required>
    <br>
    
    <label for="First Name"><b>First Name:</b></label> 
    <br>
   <input type="text" placeholder="Enter First Name" name="editFirstName" required>
   <br>

   <label for="Last Name"><b>Last Name:</b></label> 
    <br>
   <input type="text" placeholder="Enter Last Name" name="editLastName" required>
   <br>

   <label for="Phone Number"><b>Phone Number:</b></label> 
    <br>
   <input type="text" placeholder="Enter Phone Number" name="editPhone" required>
   <br>
    
    <label for="Company"><b>Company</b></label> 
    <br>
   <input type="text" placeholder="Enter company" name="editCompanyID" required>
   <br>
    <label for="psw"><b>Password</b></label>
    <br>
    <input type="password" placeholder="Enter Password" name="editPass" required>
    <br>
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <br>
    <input type="password" placeholder="Repeat Password" name="editPass2" required>
    <br>
    
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" name="cancel" value="cancel" class="cancelbtn">Cancel</button>
      <button type="submit" name="submit" value="signup" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>

<script type="text/javascript">(function(){window['__CF$cv$params']={r:'6db85c53fe8108f7',m:'fG5v43MlOAEZEhNNXVXY4zIll3KSKPF0Eo0V7eNpFpc-1644527808-0-AV823yX3vMQ3y23l7H21Y1jPpIEGLzuL53YWmTQb2KYFQB5ZGw4LZjt9Cga60iW9YUaCaSIDdHb+r0Esk3iVem3OMc1fY9dKbh5s8jTHTkDyYdWZ5IR1Qtvpa34YpCaJNQkl+H3/sA5yaKuBAE4NRQnCa/rxRLEDlU29ZVPVLxNNj0N0UQxLGma/9Ug48tsVJ9VeCcGI2H1XuATCzrHT5Qs=',s:[0xaac12ca72a,0x8f98fbb6b8],}})();</script></body>
</html>