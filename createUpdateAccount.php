<?php
//buffers output to ensure headers work where they need to work
ob_start();	
function createUpdateAccount(){
	//splits users into two main groups - admin and non-admin 
	//also requests an admin to choose between updating an existing account (sending them to searchForAccount through editAccount case 0) or creating a new account (sending them to generateNewAccount then to edit account via case 1 to get account info and write to account)
	//this allows the admin the option of creating an account right there with a person or online by emailing them their client ID (via log in they should be able to sign in and fill in their data via editAccount case 2)
	//these features will come when the admin interface is built
if(isset($_POST["profile"])) {
	//set on profile.php as 1 to act as a flag for this function to send the script to the right switch in editAccount()
		editAccount(2);
	
	}
	elseif (isset($_SESSION['ClientID']) == true && $_SESSION['admin'] == '1'){
		//admin pages are coming in future
		echo'<script>alert("Admin pages are coming in a future update. Look for the ability to edit and create accounts here")</script>';
		
	}
	elseif (isset($_POST['code'])){
		//user has submitted a 4 digit code for review of its validity 
		getAccountinfo();
		
	}
	elseif (isset($_REQUEST['clientInfo'])){
		//new account has been successfully verified by getAccountinfo() and has submitted data on clientInfo
		editAccount(4);
		
	}
	else{
		//no variables set send to login through editAccount()
		editAccount(3);

		
	}
	
}
	

//generates random 4 digit numbers until one is not found in the Client table then inserts a new blank account with 
function generateNewAccount(){
	include 'config.php';
	
	do{	
	//once we get the interface for this screen it will be able to generate accounts on a specific companyID
		//generate 4 digit code and 0 fill if needed
		$random = rand(1,9999);
		$testID = str_pad($random,4,"0", STR_PAD_LEFT);
		echo"$testID</br>";
		//check if the random generated code exists already or not
		$sql = "select Client_ID from Client where Client_ID=$testID";	
		$result = $conn->query($sql);
		
	} while ($result == $testID);
		$_POST["editID"] = $testID;
		
	$inSQL = "INSERT INTO Client (Client_ID, Com_ID, First_Name, Last_Name, Phone, Email, Administrator)
						values ($testID, 0001, 0, 0, 0, 0, 0);";
	$conn->query($inSQL);
	//insert client into password table
	$hashID = hash('sha512',$testID);
	echo"hashID = $hashID";
	$SQL2 = "INSERT INTO password (Client_ID, Password)
						values ('$hashID', '0000');";
	$conn->query($SQL2);
	echo"inserted ID: $testID";
	$conn->close();
	return 0;
	
}

function editAccount($editType){
	include 'config.php';
		//depending on the choice taken from createUpdateAccount this module will execute searchForAccount or getAccountinfo
	switch ($editType){
		//case 4 a new user has submitted a correct account number and filled in the client information form
		case '4':
		$new = 'new';
			writeToAccount($new);
		break;
		//case 3 brand new user has a user code and wants to complete registration
		case '3':
				header('Location: loginform.php');
				exit();
			
		
		break;
		//case 2 get the value edited on profile and send to writeToAccount with the correct edit type
		case '2':
			if(isset($_REQUEST['editFirstName'])){
				$type = "firstName";
				
				writeToAccount($type);
				
			}
			elseif(isset($_REQUEST['editLastName'])){
				$type = "lastName";
			
				writeToAccount($type);
				
				
			}
			elseif(isset($_REQUEST['editCompanyID'])){
				$type = "companyID";
				
				writeToAccount($type);
				
				
			}
			elseif(isset($_REQUEST['editPhone'])){
				$type = "phone";
				
				writeToAccount($type);
				
				
			}
			elseif(isset($_REQUEST['editEmail'])){
				$type = "email";
				$email = $_REQUEST['editEmail'];
				$sql = "select * from Client where Email = '$email'";
				$result = $conn -> query($sql);
				$row = $result -> fetch_assoc();
	
				if ($row == null) {
			
				
					writeToAccount($type);
				
				
				}
				else{
					
				echo'<script>alert("Email exists. Please choose another email")</script>';
				
				}
			}
			else{
				
				echo"<script>alert('Unable to assess edit please try again')</script>";
				
			}
		break;
		//case 1 the administrator has created a new account on POST editID
		case '1':
			getAccountinfo();
		break;
		//case 0 the administrator has selected to update an existing account
		case '0':
			searchForAccount();
		break;
		
		default: echo"</br>error. Unrecognized input</br>";
	}
	$conn->close();
}

function getAccountinfo(){
	include 'config.php';
		
	if (isset($_POST['editID'])){
		//get the admin set editID (from searchForAccount or from generateNewAccount) 
		$clientID = $_POST['editID'];
		
		//get all data from client table for the specific client
		$sql = "select * from Client where Client_ID is $clientID";
		$result = $conn -> query($sql);
		$row = $result -> fetch_assoc();
		
		//get each value individually from the result
		$companyID = $row['Com_ID'];
		$firstName = $row['First_Name'];
		$lastName = $row['Last_Name'];
		$Phone = $row['Phone'];
		$Email = $row['Email'];
		$Administrator = $row['Administrator'];
		//add values to post array
		$_POST['companyID'] = $companyID;
		$_POST['firstName'] = $firstName;
		$_POST['lastName'] = $lastName;
		$_POST['phone'] = $Phone;
		$_POST['email'] = $Email;
		$_POST['administrator'] = $Administrator;

	}
	else if (isset($_POST['code']) == true){
		session_start();
		
		//occurs when a new user is trying to set up an account and has submitted a code for varifacation 
			$code = $_POST['code'];
			$result = mysqli_query($conn, "select * from Client where Client_ID = $code");
			$numRow = $result -> num_rows;
			
			if($numRow == 0) {
				echo '<script>alert("Incorrect Access Code")</script>';
				session_destroy();
			}
			else{
				$row = $result -> fetch_assoc();
				//if there are results from the database the data is checked to see if the account has been set up already
				$firstName = $row['First_Name'];
				$lastName = $row['Last_Name'];
				$phone = $row['Phone'];
				$email = $row['Email'];
				if($firstName == '0' && $lastName == '0' && $phone == '0' && $email == '0'){
				
				$_SESSION['editClientID'] = $code;
					header('Location: clientInfo.php');
					exit();
				}
				else {
					
					echo'<script>alert("Incorrect Access Code")</script>';
					
				}
				
			}
		
		
		
	}
	else{
		echo'<script>alert("account type unrecognized please logout and log back in")</script>';
		
	}
	$conn->close();
}

function writeToAccount($actType){
	include 'config.php';

	//this function writes to account with different privilages depending on what is passed
	switch ($actType){
		
		case"new":
		$clientID = $_SESSION['editClientID'];
			$hashID = hash('sha512',$clientID);
			$firstName = $_POST['editFirstName'];
			$lastName = $_POST['editLastName'];
			$phone = $_POST['editPhone'];
			$email = $_POST['editEmail'];
			$pass = $_POST['editPass'];
			$pass2 = $_POST['editPass2'];
			$administrator = 0;
			//
			$sql = "select * from Client where Email = '$email'";
			$result = $conn -> query($sql);
			$row = $result -> fetch_assoc();
	
			if ($row == null) {
		
		
			
				if ($pass == $pass2 && $pass != '0000'){

				$hashPass = hash('sha512',$pass);
				$sql = "update password set Password = '$hashPass' where Client_ID = '$hashID'";
				$conn -> query($sql);
				$sql2 = "update client set First_Name = '$firstName', Last_Name = '$lastName', Phone = '$phone', Email = '$email', Administrator = $administrator where Client_ID = '$clientID'";
				$conn -> query($sql2);
				session_destroy();
				echo'<script>alert("account created. Please log in")</script>';
				unset($_REQUEST);
				header('Location: loginform.php');
				
				}
				
				else{
				
				echo'<script>alert("passwords do not match")</script>';
				
				}
				
			}	
			else{
				
				echo'<script>alert("Email exists please choose another email")</script>';
				
			}
			//need to make sure the passwords are valid before client data is written otherwise they won't be able to sign in 
			
		break;
		//these cases handle writing to the database and updating the session array from the profile page. They are individual cases because of the way profile is implemented each value is submitted one at a time
		case"firstName":
		//handles updating first name from profile
			$clientID = $_SESSION['clientID'];
			$edit = $_REQUEST['editFirstName'];
			$_SESSION['firstName'] = $edit;
			$sql = "update client set First_Name = '$edit' where Client_ID = '$clientID'";
			$conn -> query($sql);
			unset($_REQUEST);
			header("Refresh:0");
			
		break;
		case"lastName":
		//handles updating last name from profile
			$clientID = $_SESSION['clientID'];
			$edit = $_REQUEST['editLastName'];
			$_SESSION['lastName'] = $edit;
			$sql = "update client set Last_Name = '$edit' where Client_ID = '$clientID'";
			$conn -> query($sql);
			header("Refresh:0");
			
		break;
		case"phone":
		//handles updating phone from profile
			$clientID = $_SESSION['clientID'];
			$edit = $_REQUEST['editPhone'];
			$_SESSION['phone'] = $edit;
			$sql = "update client set Phone = '$edit' where Client_ID = '$clientID'";
			$conn -> query($sql);
			header('Location: profile.php');
			
			
		break;
		case"email":
		//handles updating email from profile
			$clientID = $_SESSION['clientID'];
			$edit = $_REQUEST['editEmail'];
			$_SESSION['email'] = $edit;
			$sql = "update client set Email = '$edit' where Client_ID = '$clientID'";
			$conn -> query($sql);
			header("Refresh:0");
			
		break;
		
		case"admin":
		
		break;
	}	
		
	
}

function searchForAccount(){
	include 'config.php';
	
	echo'<script>alert("Please look for the searchForAccount function in a future update")</script>';
	
	
	$conn->close();
	
}

//function getStuff is something I dreamed up to get stuff out of the post or session arrays. I have not had time to properly implement it so it remains commented out. This will be removed if it is not used in the final version
/*
function getStuff($stuff){
	
	switch ($stuff){
		
		
	}
	
}*/
?>
