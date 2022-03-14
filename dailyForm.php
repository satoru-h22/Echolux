<?php
//session and database connection
//include 'createUpdateAccount.php';
//include 'config.php';
session_start();
//get clientId
$clientID = 1;
//$_SESSION["clientID"];
	$servername = "localhost";
	$username = "root";
	$password = "Rerooster123!!!";
	$db ="mydb";

	  //correct variables
	  $date = "01-01-2000";
	  $ansq1 = "";
	  $ansq2 = "";
	  $ansq3 = "";
	  $ansq4 = "";
	  $ansq5 = "";
	  $ansq6 = "";
	  $ansq7 = "";
	  $ansq8 = "";
	  $ansq9 = "";

// check connection
  $conn = mysqli_connect($servername, $username, $password, $db);

  if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
		
		//when you submit
    if (isset( $_REQUEST['submit']) && $_REQUEST['submit'] == "submit") {
	    $date = $_REQUEST['date'];		
      $ansq1 = $_REQUEST['ansq1'];
      $ansq2 = $_REQUEST['ansq2'];
      $ansq3 = $_REQUEST['ansq3'];
      $ansq4 = $_REQUEST['ansq4'];
      $ansq5 = $_REQUEST['ansq5'];
      $ansq6 = $_REQUEST['ansq6'];
      $ansq7 = $_REQUEST['ansq7'];
      $ansq8 = $_REQUEST['ansq8'];
      $ansq9 = $_REQUEST['ansq9'];
      
      //insert into what
      $sql = "INSERT INTO sleep (questionID, clientId, answer, date)
      VALUES ('1', '$clientID', '$ansq1', '$date'),
	  ('2', '$clientID', '$ansq2', '$date'),
	  ('3', '$clientID', '$ansq3', '$date'),
	  ('4', '$clientID', '$ansq4', '$date'),
	  ('5', '$clientID', '$ansq5', '$date'),
	  ('6', '$clientID', '$ansq6', '$date'),
	  ('7', '$clientID', '$ansq7', '$date'),
	  ('8', '$clientID', '$ansq8', '$date'),
	  ('9', '$clientID', '$ansq9', '$date')";
	  
	}
    $conn->query($sql);
	  
	  $conn->close(); 
		
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Sleep App | Form</title>
  <link rel="stylesheet" href="sleepApp.css">
  <style>
body {
	font-family: Arial, Helvetica, sans-serif;
}
hr {
	width 50%;
}
input[type=text], input[type=number] {
	width: 20%;
	padding: 12px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #ccc;
	box-sizing: border-box;
	text-align: center;
}
input[type=time] {
	width: 20%;
	padding: 10px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #ccc;
	box-sizing: border-box;
	
}
select {
	width: 20%;
	padding: 12px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #ccc;
	box-sizing: border-box;
	text-align: center;
}

form label {
	font-size: 16;
}
	</style>
</head>
<body>
    <div class="wrapper">
        <header>
      <div class="headerS">/ </div>
      <div class="headerLogo">Lana Walsh<br>Coaching</div>
      <div class="headerSub">Sleep Coach: Helping you Conquer Insomnia so <br>You Wake up Feeling Rested and Refreshed</div>
      
    </header>
		<nav>
     	    <a href="home.html">Home</a>
            <div class="dropdown">
              <button class="dropbtn">Form
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="dailyform.html">Daily Survey</a>
                <a href="ISSI.html">ISSI</a>
                <a href="WPAI.html">WPAI</a>
              </div>
              </div>
            <a href="Profile.html">Profile</a>
            <a href="report.html">Report</a>
            <button class = "logout">LOG OUT</button>
           <a href="helpPage.html">Help</a>    
		</nav>
        
		 <article>
        <!-- This section is for the content-->
        <h3>Please fill out the following questions with your best judgement.</h3>
        <p><b>Daily Sleep Survey</b></p>
        <p><b>Please indicate the date</b></p>
     <form method="get" action="">
        <!--date-->
        <input type="date" style="text-align: center;" id="currentDate" name ="currentDate">

    <br><hr>
    <!--<script>
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    document.getElementById("currentDate").value = date;
            </script>-->
                         
        <br>

        <!--form-->
   
            

            <!--Question1-->

            <label for ="q1"><b>1. What time did you go to bed? </b></label>

                <br>

                <input type="time" id="ansq1" name="ansq1">

                <br><br>
				
				

                 <!--Question2-->

                <label for ="q2"><b>2. What time did you turn off the lights? </b></label>

                <br>

                <input type="time" id="ansq2" name="ansq2">
                
                <br><br>

                <!--Question3-->

                <label for ="q3"><b>3. How long did it take you to fall asleep?</b> <br>(in minutes)</label>

                <br>


                <select id="timelights" name="Time">
                  <option value="1">15</option>
                  <option value="3">30</option>
                  <option value="4">45</option>
                  <option value="6">60</option>
                  <option value="6">1hr+</option>
                </select>

                <br><br>
				
                 <!--Question4-->

                <label for ="q4"><b>4. How many times did you wake up last night?</b></label>

                <br>

                <select id="howtime" name="howtime">
                    <option value="1">0-5</option>
                    <option value="2">6-10</option>
                    <option value="3">11-15</option>
                    <option value="4">16+</option>
                  </select>

                <br><br>

                 <!--Question5-->

                <label for ="q5"><b>5. What was your final wake up time this morning?</b></label>

                <br>


                <input type="time" id="ansq5" name="ansq5">
                  
                <br><br>
				
                   <!--Question6-->
                
                <label for ="q6"><b>6. What time did you get out of bed?</b></label> 
                  
                <br>


                <input type="time" id="ansq6" name="ansq6">

                <br><br>

                <!--Question7-->

                <label for ="q7"><b>7. Sleep Medications</b><br>(indicate dose and type)</label>

                <br>

                <input type="text" id="ansq7" name="ansq7">

                <br><br>

                <!--Question8-->

                <label for ="q8"><b>8. Rate your sleep 1-5</b><br>
                        (1 = very poor, 5 = very good)
                    </label>

                <br>


                <input type="number" id="quality" name="quality" min="1" max="5">
                  
                <br><br>
				
                <!--Question9-->

                <label for ="q9"><b>9. - Notes - 
				<br>List any possible circumstances that might
                <br>have contributed to how you slept.</b></label>   
                        
                <br>

                <input type = text id = "ansq9" name ="ansq9" style="min-height: 10%; width: 25%">
                     
                <br><br>

                <!--Back&Submitbtn-->

                <button type="submit" value="Submit" name="but_submit" id="but_submit">Submit</button>
				<button type="submit">Back</button>
				
				<br><br><br><br><br><br>
				
        </form>  
        </article>
        <footer></footer>
    </div>
</body>
</html>
