<?php
	include "config.php";
	session_start();
//get stuff
$clientID = $_SESSION["clientID"];

	$sql = "select * from question where Sur_ID = 1;";
	$result = $conn->query($sql);
	if($result){
	$countArr = 0;
	$questArr = array();
		while($row = $result->fetch_assoc()){
			$questArr[$countArr] = $row['Qu_ID'];
			//echo "$countArr<br>";
			$countArr =$countArr+1;
			//echo $questArr[0] ;
		}
	}
	if(isset($_GET['but_submit'])){
		//echo $questArr[2] ;
		$counter = 0;
		$ansArr = array();
		$day1 = strtotime($_GET['currentDate']);
		$day1 = date('Y-m-d H:i:s', $day1); 
	
		//echo $date;
		$ansArr[0] = $_GET['ansq1'];
		$ansArr[1] = $_GET['ansq2'];
		$ansArr[2] = $_GET['Time'];
		$ansArr[3] = $_GET['howtime'];
		$ansArr[4] = $_GET['ansq5'];
		$ansArr[5] = $_GET['ansq6'];
		$ansArr[6] = $_GET['ansq7'];
		$ansArr[7] = $_GET['quality'];
		$ansArr[8] = $_GET['ansq9'];
		while($counter < count($questArr)){
		$ans = $ansArr[$counter];
		//echo "$ans<br>";
		//echo $counter;
		$sql = "INSERT INTO answer (Qu_ID , Client_ID,Date,Answer)
				Values ('$questArr[$counter]','$clientID','$day1','$ans');";
	
				$conn->query($sql);
		$counter = $counter + 1;
		}
		echo'<script>alert("Submitted!")</script>';
	}
?>





<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sleep App | Home</title>
  <link rel="stylesheet" href="sleepApp.css">
</head>
<body>
    <div class="wrapper">
        <header>
          <h1>/ Lana Walsh Coaching</h1>
        </header>
        <div>
			<nav>
			  <a href="home.html">Home</a>
			  <a href="dailyForm.php">Form</a>
			  <a href="Profile.php">Profile</a>
			  <a href="report.html">Report</a>
			  <a href="helpPage.html">Help</a>
			</nav>
		</div>
        <article>
        <!-- This section is for the content-->
        <h3>Please fill out the following questions with your best judgement.</h3>
        <p><b>Daily Sleep Survey</b></p>
     <form method="get" action="">
        <!--date-->
        <input type="date" style="text-align: center;" id="currentDate" name ="currentDate">

    <br><br>
    <!--<script>
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    document.getElementById("currentDate").value = date;
            </script>-->
                         
        <br>

        <!--form-->
   
            

            <!--Question1-->

            <label for ="q1"><b>1.</b> What time did you go to bed? </label>

                <br><br>

                <input type="time" id="ansq1" name="ansq1">

                <br><br>

                 <!--Question2-->

                <label for ="q2"><b>2.</b> What time did you turn off the lights? </label>

                <br><br>

                <input type="time" id="ansq2" name="ansq2">
                
                   
                     </select>

                <br><br>

                <!--Question3-->

                <label for ="q3"><b>3.</b> How long did it take you to fall asleep?</label>

                <br><br>


                <select id="timelights" name="Time">
                  <option value="1">15</option>
                  <option value="3">30</option>
                  <option value="4">45</option>
                  <option value="6">60</option>
                </select> min

                
              

                <br><br>
                    
                 <!--Question4-->

                <label for ="q4"><b>4.</b> How many times did you wake up last night?</label>

                <br><br>


                <select id="howtime" name="howtime">
                    <option value="1">0-5</option>
                    <option value="2">6-10</option>
                    <option value="3">11-15</option>
                    <option value="4">16+</option>
                  </select>

                <br><br>

                 <!--Question5-->

                <label for ="q5"><b>5.</b> What was your final wake up time this morning?</label>

                <br><br>


                <input type="time" id="ansq5" name="ansq5">
                  
                  <br><br>

                   <!--Question6-->
                
                  <label for ="q6"><b>6.</b> What time did you get out of bed?</label> 
                  
                  <br><br>


                <input type="time" id="ansq6" name="ansq6">

                     <br><br>

                     <!--Question7-->

                    <label for ="q7"><b>7.</b> Sleep Medications(indicate dose and type)</label>

                     <br><br>

                     <input type="text" id="ansq7" name="ansq7">

                     <br><br>

                     <!--Question8-->

                     <label for ="q8"><b>8.</b> Rate your sleep 1-5<br>
                        (1 = very poor, 5 = very good)
                        </label>

                    <br><br>


                    <input type="number" id="quality" name="quality" min="1" max="5">
                  
                      <br><br>

                       <!--Question9-->

                      <label for ="q9"><b>9.</b> Notes- possible circumstances that<br> might
                        have contributed to how you slept.
                        </label>   
                        
                        <br><br>

                        <input type = text id = "ansq9" name ="ansq9">
                     
                        <br><br>

                          <!--Back&Submitbtn-->

						<button type="submit">Back</button>
                         <button type="submit" value="Submit" name="but_submit" id="but_submit">Submit</button>
						
        </form>  
        </article>
        <footer></footer>
    </div>
</body>
</html>