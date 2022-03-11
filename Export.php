<?php
	include "config.php";
	session_start();
//get stuff
$clientID = $_SESSION["clientID"];
?>





<html lang="en">
<!-- Export link -->
<div class="col-md-12 head">
    <div class="float-right">
        <a href="exportData.php" class="btn btn-success"><i class="dwn"></i> Export</a>
    </div>
</div>

<!-- Data list table --> 
<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Question</th>
            <th>Date</th>
            <th>Answer</th>
        </tr>
    </thead>
    <tbody>
   <?php 
    // Fetch records from database 
    $result = $conn->query("SELECT c1.First_Name, c2.Question, p.Date, p.Answer
	FROM answer p
	LEFT JOIN  client c1 ON p.Client_ID = c1.Client_ID 
	LEFT JOIN  question c2 ON p.Qu_ID = c2.Qu_ID 
	WHERE p.Client_ID = $clientID
	ORDER BY p.Date ASC"); 
    if($result->num_rows > 0){ 
        while($row = $result->fetch_assoc()){ 
    ?>
        <tr>
            <td><?php echo $row['First_Name']; ?></td>
            <td><?php echo $row['Question']; ?></td>
            <td><?php echo $row['Date']; ?></td>
            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $row['Answer']; ?></td>
            
        </tr>
    <?php } }else{ ?>
        <tr><td colspan="7">No member(s) found...</td></tr>
    <?php } ?>
    </tbody>
</table>
</html>