<?php

//connect to database
//include 'config.php';

//comments for testing individual processes
//session_start();
//testing non admin clients
//$_SESSION["admin"] = "0";
//$_SESSION["clientID"] = "2893";
//generateNewAccount();
//createUpdateAccount();
//$editClientID = 0;
	if (isset($_POST['registerSubmit'])){
		
		writeToAccount();
		
	}
	
		
function createUpdateAccount(){
	//splits users into two main groups - admin and non-admin 
	//also requests an admin to choose between updating an existing account (sending them to searchForAccount through editAccount case 0) or creating a new account (sending them to generateNewAccount then to edit account via case 1 to get account info and write to account)
	//this allows the admin the option of creating an account right there with a person or online by emailing them their client ID (via log in they should be able to sign in and fill in their data via editAccount case 2)
	//an admin may select update current account from the radio list 
	//check if the user is logged in or not make sure if they 
	if(isset($_SESSION['ClientID']) == true && $_SESSION['admin'] == '0') {
	echo'edit 2';
		editAccount(2);
	
	}
	elseif (isset($_SESSION['ClientID']) == true && $_SESSION['admin'] == '1'){
		
		echo"Admin true createUpdateAccount";
		
	}
	
	elseif (isset($_POST['code']) == true){
			editAccount(3);
	
	}
		
	else{
		echo'failure to evaluate input';

		
	}
	
}
	

//generates random 4 digit numbers until one is not found in the Client table 
function generateNewAccount(){
	include 'config.php';
	
	
	
	do{	
	
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
		
		//case 3 brand new user has a user code and wants to complete registration
		case '3':
			if(isset($_POST['code']) == true){
				
				getAccountinfo();
				
			}
			else{
				
				header('Location: Register.php');
				
			}
			
		
		break;
		//case 2 the user is logged in as a client without administrator privilages get their account information then write it to their account
		case '2':
		echo"editAccount case 2";
			getAccountinfo();
			
			$companyID = $_POST['companyID'];
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$phone = $_POST['phone'];
			$email= $_POST['email'];
			//if statement to see if user is new or returning 
			//have to stop here and see how echolux is planning on creating the UI for creating a new account which will change how I add passwords to users
			
		

	
			if (isset($_REQUEST['submit']) == true){
				echo"$companyID</br>$firstName</br>$lastName</br>$phone</br>$email</br>write to account submit case 2 editAccount</br>";
				writeToAccount();
				
			}
			elseif (isset($_REQUEST['submitPass']) == true){
				echo"submitPass";
				//get password info from the post array
				$pass = $_POST['pass'];
				$pass2= $_POST['pass2'];
				//hash current password and Client ID to check them in the password table
				$current = $_POST['currentPass'];
				$hashedPass = hash('sha512',$current);
				$clientID = $_SESSION['ClientID'];
				$hashID = hash('sha512',$clientID);
				
				
				if ($pass == $pass2 && $pass != null){
					
					$sql = "select * from Password where Client_ID = $hashID";
					$result = $conn -> query($sql);
					$row = $result -> fetch_assoc();
					$hashDB = $row['Password'];
					echo"$hashDB";
					
					if($hashDB == $hashedPass){
						echo"pass write to account";
					writeToAccount();
				
				
					}
					else{
						
						echo"</br>Current Password Incorrect</br>";
						
					}
				}
				else{
					echo"passwords do not match</br>";
				}
				
			}
			else{
				echo"$companyID</br>$firstName</br>$lastName</br>$phone</br>$email</br>else edit account switch 2 above</br>";
				//if the user is new these will all be set to 0 and must be updated
				if($firstName == 0 || $lastName == 0 || $phone == 0 || $email == 0){
				
				//test inputs to be changed or erased when echolux gets done
				//does not have current password
				echo"old update screen";
					
					
				}
			}
		break;
		//case 1 the administrator has created a new account on POST editID
		case '1':
		echo"editAccount case 1";
			getAccountinfo();
		break;
		//case 0 the administrator has selected to update an existing account
		case '0':
		echo"editAccount case 0";
			searchForAccount();
		break;
		
		default: echo"</br>error. Unrecognized input</br>";
	}
	$conn->close();
}

function getAccountinfo(){
	include 'config.php';
		
	if (isset($_POST['editID'])){
		//get the admin set editID (from searchForAccount or from generateNewAccount
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
				//$_GLOBALS['editClientID'] = $code;
					
					exit();
				}
				else {
					
					echo"please sign in to edit account";
					
				}
				
			}
		
		
		
	}
	else{
		$clientID = $_SESSION["clientID"];
		//get all data from client table for the specific client
		$sql = "select * from Client where Client_ID = $clientID;";
		
		//old meathods don't seem to work here aparently PDO is the way to go now
		$result = $conn -> query($sql);
		$row = $result -> fetch_assoc();
		
		//get each value individually from the result minus the administrator tag because users don't have the power to make themselves admin
		$companyID = $row['Com_ID'];
		$firstName = $row['First_Name'];
		$lastName = $row['Last_Name'];
		$phone = $row['Phone'];
		$email = $row['Email'];
		echo"$companyID</br>$firstName</br>$lastName</br>$phone</br>$email</br>";
		
		//add values to post array
		$_POST['companyID'] = $companyID;
		$_POST['firstName'] = $firstName;
		$_POST['lastName'] = $lastName;
		$_POST['phone'] = $phone;
		$_POST['email'] = $email;
		
	}
	$conn->close();
}

function writeToAccount($actType){
	include 'config.php';
	//add a loop to create multiple accounts at a time if desired
	//need to ensure if user does not change a text box or if it's invalid data we use the old data and throw an error
	//if currentPass is set the user is not new
	if ($actType == 'new'){
			$clientID = $_SESSION['editClientID'];
			$hashID = hash('sha512',$clientID);
			$companyID = $_POST['editCompanyID'];
			$firstName = $_POST['editFirstName'];
			$lastName = $_POST['editLastName'];
			$phone = $_POST['editPhone'];
			$email = $_POST['editEmail'];
			$pass = $_POST['editPass'];
			$pass2 = $_POST['editPass2'];
			$administrator = 0;
			
			$sql = "select Email from Client where Email = $email";
			$result = $conn -> query($sql);
			$numRow = $result -> num_rows;
			
			if (empty($numRow)){
			
				if ($pass == $pass2 && $pass != '0000'){

				$hashPass = hash('sha512',$pass);
				$sql = "update password set Password = '$hashPass' where Client_ID = '$hashID'";
				$conn -> query($sql);
				$sql2 = "update client set Com_ID = '$companyID', First_Name = '$firstName', Last_Name = '$lastName', Phone = '$phone', Email = '$email', Administrator = $administrator where Client_ID = '$clientID'";
				$conn -> query($sql2);
				session_destroy();
				}
				
				else{
				
				echo"passwords do not match";
				
				}
				
			}	
			else{
				
				echo"Email exists please log in";
				
			}
			//need to make sure the passwords are valid before client data is written otherwise they won't be able to sign in 
			
	}
	elseif ($actType == 'current'){
		
		
		
	}
	elseif($actType = 'admin'){
		echo"admin writing privilages writeToAccount";
		$clientID = $_SESSION["clientID"];
			$companyID = $_POST['companyID'];
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$Phone = $_POST['Phone'];
			$Email = $_POST['Email'];
			$administrator = $_POST['Administrator'];
			$pass = $_POST['pass'];
			$sql = "update client set Com_ID = '$companyID', Name = '$Name', Phone = '$Phone', Email = '$Email', Administrator = $administrator where Client_ID = '$clientID'";
			$conn -> query($sql);
			
	}
		
		
		
	else{
		echo"client writing privilages writeToAccount";
		//client write privilages ensure non admins can't write admin to their own account
		$clientID = $_POST["editClientID"];
		$companyID = $_POST['editCompanyID'];
		$firstName = $_POST['editFirstName'];
		$lastName = $_POST['editLastName'];
		$phone = $_POST['editPhone'];
		$email = $_POST['editEmail'];
		$administrator = 0;
		echo"$clientID</br>$companyID</br>$firstName</br>$lastName</br>$phone</br>$email</br>";
		$sql = "update client set Com_ID = '$companyID', First_Name = '$firstName', Last_Name = '$lastName', Phone = '$phone', Email = '$email', Administrator = $administrator where Client_ID = '$clientID'";
		$conn -> query($sql);
	}
		
		
	
	
}

function searchForAccount(){
	include 'config.php';
	
	echo"searchForAccount initilized</br>";
	
	//idk how echolux is implementing this but I'm going to do it with checkboxes/textboxes for now
	echo"
<html>
	<body>
	
		<form action='' method='get'>
			Search type: </br>
			<input type='text' name='search' value='Client_ID' /> Client_ID
			<input type='text' name='search' value='Com_ID' /> Company_ID
			<input type='text' name='search' value='First_Name' /> First Name
			<input type='text' name='search' value='Last_Name' /> Last Name
			<input type='text' name='search' value='Phone' /> Phone
			<input type='text' name='search' value='Email' /> Email
			<input type='checkbox' name='search' value='Administrator' /> Administrator 
			</br></br>
			<input type='submit' name='submit' value='select' />
		</form>
	</body>
</html>
";
	$conn->close();
	
}

//function getStuff is something I dreamed up to get stuff out of the post array 
function getStuff($stuff){
	
	switch ($stuff){
		
		
	}
	
}
?>
