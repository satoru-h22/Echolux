<!--<?php 
   include "config.php"; 
   
  session_start(); 

$client_ID = $_SESSION["clientID"]; 

    $sql = "SELECT Qu_ID, Answer, Date FROM answer where Client_ID = $client_ID";
    $result = $conn->query($sql); 

  while ($row = $result -> fetch_assoc()){ 
      $Qu_ID =$row['Qu_ID']; 
	  $Date =$row['Date']; 
      $Answer= $row['Answer'];
    echo " . $Answer";
     
  }            


?>-->

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sleep App | Report</title>
  <link rel="stylesheet" href="sleepApp.css">
  <style>
    * { box-sizing: border-box;}
		article {
		min-height: 1000px;
		height: auto;
		}
		nav {
		text-align: center;
		}

		article {
		  height: 1000;
		}

		* {
		  box-sizing: border-box;
		}

		@media screen and (max-width: 600px) {
		  .column {
			width: 100%;
		  }
		}

		.sleep .sleep-day .name {
			letter-spacing: -1.5px;
		}

		.graphContainer { 
			Position: relative;
			
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
      <div class="navlink"><a href="home.html">Home</a></div>
      <div class="navlink"><a href="dailyForm.html">Form</a></div>
      <div class="navlink"><a href="Profile.html">Profile</a></div>
      <div class="navlink"><a href="report.html">Report</a></div>
      <div class="navlink"><a href="helpPage.html">Help</a></div>      
		</nav>
        <article>
        <!-- This section is for the content--> 
              <h1 align="center">Weekly Report</h1>
              <div class="row">
                <div class="column">
                    <h2> Average Sleep Efficiency</h2>
                    <div><?php echo $row['Answer']; ?><h3>%</h3></div> 
                    <br></br>
                    <h2>Average Sleep Time</h2> 
                    <div><?php echo $row['Answer']; ?><h3> Hours</h3></div> 
                    <br></br>
                    <br></br>
                    <div class="graphContainer">
                      <div class="sleep">
                        <div class="sleep-day">
                            <div class="graph" style="height:50%;">
                                <div class="percent">50%</div>
                                <div class="name">Monday</div>
                            </div>
                        </div>
          
                        <div class="sleep-day">
                            <div class="graph" style="height: 25%;">
                                <div class="percent">25%</div>
                                <div class="name">Tuesday</div>
                            </div>
                        </div>
            
                        <div class="sleep-day">
                            <div class="graph" style="height:95%;">
                                <div class="percent">95%</div>
                                <div class="name">Wednesday</div>
                            </div>
                        </div>
            
                        <div class="sleep-day">
                            <div class="graph" style="height: 65%;">
                                <div class="percent">65%</div>
                                <div class="name">Thursday</div>
                            </div>
                        </div>
            
            
                        <div class="sleep-day">
                            <div class="graph" style="height: 100%;">
                                <div class="percent">100%</div>
                                <div class="name">Friday</div>
                            </div>
                        </div>
            
            
                        <div class="sleep-day">
                            <div class="graph" style="height: 80%;">
                                <div class="percent">80%</div>
                                <div class="name">Saturday</div>
                            </div>
                        </div>
            
                        <div class="sleep-day">
                            <div class="graph" style="height: 60%;">
                                <div class="percent">60%</div>
                                <div class="name">Sunday</div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="column">
                    <h2>Average Time To Go To Sleep</h2>  
			<!--<div><?php echo $row['Answer']; ?>--> <h3> Minutes</h3></div> 
                </div>
                <div class="column"> 
                    <h2>Average Time Allotted For Sleep</h2> 
                   	 <!--<div><?php echo $row['Answer']; ?>--> <h3> Hours</h3></div> 
                    <br></br>
                    <h2>Average Time Awake</h2> 
			<!--<div><?php echo $row['Answer']; ?>--> <h3> Hours</h3></div> 
               </div>
               </div>
            
        </article>
        <footer></footer>
    </div>
</body>
</html>
