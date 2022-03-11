<?php
	include "config.php";
	

	$sql = "select * from question where Sur_ID = 2;";
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
		$questIDc = 10;
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

		while($counter < count($questArr)){
		$ans = $ansArr[$counter];
		//echo "$ans<br>";
		//echo $counter;
		$sql = "INSERT INTO answer (Qu_ID , Client_ID,Date,Answer)
				Values ('$questIDc','1','$day1','$ans');";
	
				$conn->query($sql);
		$counter = $counter + 1;
		$questIDc = $questIDc +1;
		}
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
        <h3>Please rate the CURRENT (i.e. LAST 2 WEEKS) SEVERITY of your insomnia problem(s).</h3>
        <p><b>Insomnia Severity Index Survey</b></p>
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

            <label for ="q1"><b>1.</b> Difficulty falling asleep </label>

                <br><br>

                
                <select id="timelights" name="ansq1">
                  <option value="0">None</option> 
                  <option value="1 ">Mild</option>
                  <option value="3">Moderate</option>
                  <option value="4">Severe</option>
				  <option value="5">Very Severe</option>
                </select> 

                <br><br>

                 <!--Question2-->

                <label for ="q2"><b>2.</b> Difficulty staying asleep </label>

                <br><br>

                <select id="ansq2" name="ansq2">
				  
                  <option value="0">None</option> 
                  <option value="1 ">Mild</option>
                  <option value="3">Moderate</option>
                  <option value="4">Severe</option>
				  <option value="5">Very Severe</option>
                </select> 
                
                   
                     </select>

                <br><br>

                <!--Question3-->

                <label for ="q3"><b>3.</b>Problems waking up too early</label>

                <br><br>


                <select id="timelights" name="Time">
                 <option value="0">None</option> 
                  <option value="1 ">Mild</option>
                  <option value="3">Moderate</option>
                  <option value="4">Severe</option>
				  <option value="5">Very Severe</option>
                </select> 
          
                
              

                <br><br>
                    
                 <!--Question4-->

                <label for ="q4"><b>4.</b>How Satisfied/Dissatisfied are you with your CURRENT sleep pattern?</label>

                <br><br>


                <select id="howtime" name="howtime">
                  <option value="0">Very Satisfied</option> 
                  <option value="1 ">Satisfied</option>
                  <option value="3">Moderately Satisfied</option>
                  <option value="4">Dissatisfied</option>
				  <option value="5">Very Dissatisfied</option>
                </select>

                <br><br>

                 <!--Question5-->

                <label for ="q5"><b>5.</b> How NOTICEABLE to others do you think your sleep problem is in terms of impairing the quality of your life?</label>

                <br><br>


                <select id="ansq5" name="ansq5">
                  <option value="0">Not at all Noticeable</option> 
                  <option value="1 ">A Little</option>
                  <option value="3">Somewhat</option>
                  <option value="4">Much</option>
				  <option value="5">Very Much Noticeable</option>
                </select>
                  <br><br>

                   <!--Question6-->
                
                  <label for ="q6"><b>6.</b>How WORRIED/DISTRESSED are you about your current sleep problem?</label> 
                  
                  <br><br>


                <select id="ansq6" name="ansq6">
				 <option value="0">Not at all Worried</option> 
                  <option value="1 ">A Little</option>
                  <option value="3">Somewhat</option>
                  <option value="4">Much</option>
				  <option value="5">Very Much Worried</option>
                </select>

                     <br><br>

                     <!--Question7-->

                    <label for ="q7"><b>7.</b> To what extent do you consider your sleep problem to INTERFERE with your daily functioning <br>
					(e.g. daytime fatigue, mood, ability to function at work/daily chores, concentration, memory, mood, etc.) CURRENTLY?</label>

                    <br><br>

                    <select type="text" id="ansq7" name="ansq7">
						<option value="0">Not at all Interfering</option> 
						<option value="1 ">A Little</option>
						<option value="3">Somewhat</option>
						<option value="4">Much</option>
						<option value="5">Very Much Interfering</option>
					</select>

                     <br><br>


                          <!--Back&Submitbtn-->

                        <button type="submit" >Back</button>
                         <button type="submit" value="Submit" name="but_submit" id="but_submit" />Submit<utton>


            
        </form>  
        </article>
        <footer></footer>
    </div>
</body>
</html>