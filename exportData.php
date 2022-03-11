<?php 
 
// Load the database configuration file 
include_once 'Config.php'; 
 	session_start();
//get stuff
$clientID = $_SESSION["clientID"];
// Fetch records from database 
$query = $conn->query("SELECT c1.First_Name, c2.Question,p.Date, p.Answer 
	FROM answer p
	LEFT JOIN  client c1 ON p.Client_ID = c1.Client_ID 
	LEFT JOIN  question c2 ON p.Qu_ID = c2.Qu_ID 
	WHERE p.Client_ID = $clientID
	ORDER BY p.Date ASC"); 
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "members-data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('Name', 'Question', 'Date','Answer'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['First_Name'], $row['Question'], $row['Date'], $row['Answer'], ); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>