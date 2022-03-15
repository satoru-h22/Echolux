<?php

// Variables
$servername = "localhost";
$username = "root";
$password = "Password1";
$db = "SleepDB";
$err = '';
$resultScreen = 'hidden'

// Create new connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if (isset($_REQUEST['submit'])){
    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $date = $_REQUEST['date'];

    $sql = "SELECT type, name, size, contents from uploads where id='$id'";
    $result = $conn->query($sql);
    if(!$result){
        $err = "Cannot find the user."
    }

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sleep App | Data Search</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;
        background-color: #48656D;}
.wrapper{
    border: 3px solid black;
  background-color: #8FC9D9;
}
.container{
    padding: 10px;
    text-align: center;
}
input {
  width: 200px;
  padding: 12px 20px;
  margin: 10px 0;
  display: inline-block;
  border: 1px solid #ccc;
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
  width: 10%;
}

button:hover {
  opacity: 0.8;
}

label{
    font-weight: bold;
}

</style>
</head>
<body>
<div class="wrapper">
    <div class="container">
        <form action="/action_page.php" method="post">
            
            <h1>Data Search</h1>
            <hr>
                <label for="fname">First Name</label><br>
                <input type="text" name="fname"><br>
                
                <label for="lname">Last Name</label><br>
                <input type="text" name="lname"><br>

                <label for="date">Date</label><br>
                <input type="date" name="date"><br>
                <?php ?>
                <button type="submit" name="submit">Search</button><br>
            
        </form>
    </div>
    <?php
    echo "<div class='result' $resultScreen>"
        <table>
          
        </table>    

    echo "</div>";
    ?>
    
</div>
</body>
</html>