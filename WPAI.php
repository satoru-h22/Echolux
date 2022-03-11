<?php
	include "config.php";
	

	$sql = "select * from question where Sur_ID = 3;";
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
		$questIDc = 17;
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
        <h3>Please fill out the following questions with your best judgement.</h3>
        <p><b>WPAI Survey</b></p>
     <form method="get" action="">
        <!--date-->
		<label for = currentDate>Date:<br></label>
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

            <label for ="q1">During the past seven days, how many hours did you miss from work because of your sleep problems? <br> Include hours you missed on sick days, times you went in late, left early, etc., because of your sleep problems.</label>

                <br><br>

                
                <input type = text id="timelights" name="ansq1">
             <label for = "ansq1">hours</label>

                <br><br>

                 <!--Question2-->

                <label for ="q2">During the past seven days, how many hours did you miss from work because of other health problems? <br> Include hours you missed on sick days, times you went in late, left early, etc., because of your health problems.</label>

                <br><br>
				
                <input type = text id="ansq2" name="ansq2">
			<label for = "ansq2">hours</label>
                
                   
                     </select>

                <br><br>

                <!--Question3-->

                <label for ="q3">During the past seven days, how many hours did you miss from work because of any other reason, such as vacation, holidays, sick kids</label>

                <br><br>


                <input type = text id="timelights" name="Time">
           <label for = "Time">hours</label>

                <br><br>
                    
                 <!--Question4-->

                <label for ="q4">During the past seven days, how many hours did you actually work?</label>

                <br><br>


                <input type = text id="howtime" name="howtime">
                 <label for = "howtime">hours</label>

                <br><br>

                 <!--Question5-->

                <label for ="q5">During the past seven days, how much did your sleep problems affect your productivity while you were working?<br>
				Think about days you were limited in the amount or kind of work you could do, days you accomplished less than you would like, or days you<br>
				could not do your work as carefully as usual. If sleep problems affected your work only a little, choose a low number. <br> 
				Choose a high number if sleep problems affected your work a great deal. <br> Scale of 0 – 10 where 0 is sleep had no effect on my work and 10 is sleep completely prevented me from working. </label>

                <br><br>


                <input type = text id="ansq5" name="ansq5">
             
                  <br><br>

                   <!--Question6-->
                
                  <label for ="q6">During the past seven days, how much did your sleep problems affect your ability to do your regular daily activities, other than work at a job? <br>
				  By regular activities, we mean the usual activities you do, such as work around the house, shopping, childcare, exercising, studying, etc. <br>
				  Think about times you were limited in the amount or kind of activities you could do and times you accomplished less than you would like. <br>
				  If sleep problems affected your activities only a little, choose a low number. Choose a high number if sleep problems affected your activities a great deal. <br>
				  Scale of 0 – 10 where 0 is sleep had no effect on my work and 10 is sleep completely prevented me from working.</label> 
                  
                  <br><br>


                <input type = text id="ansq6" name="ansq6">
		

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