<?php
include 'createUpdateAccount.php';
include 'config.php';
session_start();
//get stuff
$clientID = $_SESSION["clientID"];
$companyID = $_SESSION['comID'];
$firstName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];
$phone = $_SESSION['phone'];
$email = $_SESSION['email'];
$administrator = $_SESSION['admin'];




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




input[type=text], input[type=password] {
  width: 20%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #243236;
  color: #C4E3EC;
  padding: 10px 15px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  /*width: %;*/
  opacity: 0.9;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #243236;
  color: #C4E3EC;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 20%;
  border-radius: 50%;
}

.container {
  padding: 16px;
  max-width: 500px;
  margin: auto;
  padding: 10px;
  
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
  
  .changepass {
  width: 50%;
  padding: 20px 18px;
  }

   /* added to sleep app.css */
  .profile { 
   /* width: 50%;
    left: 50%;
    position: absolute;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%); */

    max-width: 500px;
  margin: auto;
  padding: 10px;
  }

  div{
      margin-top: 50px;
      margin-bottom: auto;


  }

}
</style>
<script async src='/cdn-cgi/bm/cv/669835187/api.js'></script></head>
<body>

<h1 style="text-align: center;">Profile</h1>

<section>
<form action="" method="post">
 
  <div class="container">

    <div class="profile">

      <!--first name-->
        <div style="border-bottom: 1px solid #243236;">
          <label for="firstn"><b>First Name:</b></label>

          <br><br>
          
        <div style="display: inline;">

            <div style="float: left; margin-left: 50px;">
              
              <label style="text-align:left;" for="runame"><b><?=$firstName?></b></label> 
            
            </div>

            <div style=" float: right; margin-right: 50px;">
              
              <button type="submit" name="firstName">EDIT</button>
            
            </div>
            
            <br><br><br>

          </div>                    
        </div>
        <br>

      <!--last name-->
      <div style="border-bottom: 1px solid #243236;">
        <label for="firstn"><b>Last Name:</b></label>

        <br><br>
        
      <div style="display: inline;">

          <div style="float: left; margin-left: 50px;">
            
            <label style="text-align:left;" for="runame"><b><?=$lastName?></b></label> 
          
          </div>

          <div style=" float: right; margin-right: 50px;">
            
            <button type="submit">EDIT</button>
          
          </div>
          
          <br><br><br>

        </div>                    
      </div>
      <br> 


      <!--company-->
      <div style="border-bottom: 1px solid #243236;">
        <label for="firstn"><b>Company:</b></label>

        <br><br>
        
      <div style="display: inline;">

          <div style="float: left; margin-left: 50px;">
            
            <label style="text-align:left;" for="runame"><b><?=$companyID?></b></label> 
          
          </div>

          <div style=" float: right; margin-right: 50px;">
            
            <button type="submit">EDIT</button>
          
          </div>
          
          <br><br><br>

        </div>                    
      </div>
      <br>

      
      <!--phone-->
      <div style="border-bottom: 1px solid #243236;">
        <label for="firstn"><b>Phone:</b></label>

        <br><br>
        
      <div style="display: inline;">

          <div style="float: left; margin-left: 50px;">
            
            <label style="text-align:left;" for="runame"><b><?=$phone?></b></label> 
          
          </div>

          <div style=" float: right; margin-right: 50px;">
            
            <button type="submit">EDIT</button>
          
          </div>
          
          <br><br><br>

        </div>                    
      </div>
      <br>


      <!--email-->
      <div style="border-bottom: 1px solid #243236;">
        <label for="firstn"><b>Email:</b></label>

        <br><br>
        
      <div style="display: inline;">

          <div style="float: left; margin-left: 50px;">
            
            <label style="text-align:left;" for="runame"><b><?=$email?></b></label> 
          
          </div>

          <div style=" float: right; margin-right: 50px;">
            
            <button type="submit">EDIT</button>
          
          </div>
          
          <br><br><br>

        </div>                    
      </div>
      <br>


        <!--email-->
      
      <br>
        
      <button type="submit" class="cancelbtn">Change Password</button>
      
      <br>
    </div>
  </div>

  
</form>

</section>

<script type="text/javascript">(function(){window['__CF$cv$params']={r:'6db8666a3b774214',m:'dz6VVvj.uT230Yd7BsYyt7my5bewRYZLO9aI.YKdMyk-1644528221-0-AQ9jyDl23/9sM1vh1jw9Tj38xb7MC0a9/Rt+t2BvTNW8NLdru+YIMaAa1Srn7ALO6sqao9Ey7KsjSNqVsCdwky4BiKGc2byOOjG/sl10DUTOQht0U2pELQKMRF1mC6Nb39fp6j5GYG6j0++ril2o64JKaBt+gzBrr0zd9OUZ5wY3FpqiJaBgyHmgzvbdO9c3EMTiZt2LdXIYmpW3XgfMPDM=',s:[0xb4239a42a3,0xafb62abc48],}})();</script></body>
</html>