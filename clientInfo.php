<?php
include 'createUpdateAccount.php';
session_start();
//used if the user submits a email that is already in use so they don't loose the values they input into the form
if (isset($_POST['editFirstName'])){
	$firstName = $_POST['editFirstName'];
	$lastName = $_POST['editLastName'];
	$phone = $_POST['editPhone'];
	$email = $_POST['editEmail'];
	
}
else{
	//set to null the first time through the form so that the text in the textboxes is null and the placeholders can appear
	$firstName = null;
	$lastName = null;
	$phone = null;
	$email = null;
	
	
}
//submit changes to be parsed and accepted (sending the user to the login page) or rejected (sending the user back to the signup page to complete filling out the data
if(isset($_REQUEST['submit']) == true){
	$_REQUEST['clientInfo'] = '1';
	createUpdateAccount();
	
	
}
?><!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="sleepApp.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;
      background-color: #48656D;}
* {box-sizing: border-box}
form {border: 3px solid black;
  background-color: #8FC9D9;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 50%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: 1px solid #ccc;
  background: #f1f1f1;
  box-sizing: border-box;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: rgb(228, 220, 220);
  outline: rgb(5, 5, 5);
}

hr {
  border: 1px solid #000000;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #243236;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
  opacity: 0.9;
}

button:hover {
  opacity:0.8;
}


/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
    text-align: center;
  float: center;
  width: 20%;
  padding: 14px 20px;
  background-color: #243236;
}

/* Add padding to container elements */
.container {
  padding: 16px;
  text-align: center;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 20%;
  }
}

select {

}

</style>
<script>
  // angelwatt.com/coding/masked_input.php
  
  window.onload = function() {
     MaskedInput({
        elm: document.getElementById('phone'),
        format: '(___)-___-____',
        separator: '()-'
     });
	$phone = document.getValueById('phone');
	return $phone;
  };
  
  // masked_input_1.4-min.js
  (function(a){a.MaskedInput=function(f){if(!f||!f.elm||!f.format){return null}if(!(this instanceof a.MaskedInput)){return new a.MaskedInput(f)}var o=this,d=f.elm,s=f.format,i=f.allowed||"0123456789",h=f.allowedfx||function(){return true},p=f.separator||"/:-",n=f.typeon||"_YMDhms",c=f.onbadkey||function(){},q=f.onfilled||function(){},w=f.badkeywait||0,A=f.hasOwnProperty("preserve")?!!f.preserve:true,l=true,y=false,t=s,j=(function(){if(window.addEventListener){return function(E,C,D,B){E.addEventListener(C,D,(B===undefined)?false:B)}}if(window.attachEvent){return function(D,B,C){D.attachEvent("on"+B,C)}}return function(D,B,C){D["on"+B]=C}}()),u=function(){for(var B=d.value.length-1;B>=0;B--){for(var D=0,C=n.length;D<C;D++){if(d.value[B]===n[D]){return false}}}return true},x=function(C){try{C.focus();if(C.selectionStart>=0){return C.selectionStart}if(document.selection){var B=document.selection.createRange();return -B.moveStart("character",-C.value.length)}return -1}catch(D){return -1}},b=function(C,E){try{if(C.selectionStart){C.focus();C.setSelectionRange(E,E)}else{if(C.createTextRange){var B=C.createTextRange();B.move("character",E);B.select()}}}catch(D){return false}return true},m=function(D){D=D||window.event;var C="",E=D.which,B=D.type;if(E===undefined||E===null){E=D.keyCode}if(E===undefined||E===null){return""}switch(E){case 8:C="bksp";break;case 46:C=(B==="keydown")?"del":".";break;case 16:C="shift";break;case 0:case 9:case 13:C="etc";break;case 37:case 38:case 39:case 40:C=(!D.shiftKey&&(D.charCode!==39&&D.charCode!==undefined))?"etc":String.fromCharCode(E);break;default:C=String.fromCharCode(E);break}return C},v=function(B,C){if(B.preventDefault){B.preventDefault()}B.returnValue=C||false},k=function(B){var D=x(d),F=d.value,E="",C=true;switch(C){case (i.indexOf(B)!==-1):D=D+1;if(D>s.length){return false}while(p.indexOf(F.charAt(D-1))!==-1&&D<=s.length){D=D+1}if(!h(B,D)){c(B);return false}E=F.substr(0,D-1)+B+F.substr(D);if(i.indexOf(F.charAt(D))===-1&&n.indexOf(F.charAt(D))===-1){D=D+1}break;case (B==="bksp"):D=D-1;if(D<0){return false}while(i.indexOf(F.charAt(D))===-1&&n.indexOf(F.charAt(D))===-1&&D>1){D=D-1}E=F.substr(0,D)+s.substr(D,1)+F.substr(D+1);break;case (B==="del"):if(D>=F.length){return false}while(p.indexOf(F.charAt(D))!==-1&&F.charAt(D)!==""){D=D+1}E=F.substr(0,D)+s.substr(D,1)+F.substr(D+1);D=D+1;break;case (B==="etc"):return true;default:return false}d.value="";d.value=E;b(d,D);return false},g=function(B){if(i.indexOf(B)===-1&&B!=="bksp"&&B!=="del"&&B!=="etc"){var C=x(d);y=true;c(B);setTimeout(function(){y=false;b(d,C)},w);return false}return true},z=function(C){if(!l){return true}C=C||event;if(y){v(C);return false}var B=m(C);if((C.metaKey||C.ctrlKey)&&(B==="X"||B==="V")){v(C);return false}if(C.metaKey||C.ctrlKey){return true}if(d.value===""){d.value=s;b(d,0)}if(B==="bksp"||B==="del"){k(B);v(C);return false}return true},e=function(C){if(!l){return true}C=C||event;if(y){v(C);return false}var B=m(C);if(B==="etc"||C.metaKey||C.ctrlKey||C.altKey){return true}if(B!=="bksp"&&B!=="del"&&B!=="shift"){if(!g(B)){v(C);return false}if(k(B)){if(u()){q()}v(C,true);return true}if(u()){q()}v(C);return false}return false},r=function(){if(!d.tagName||(d.tagName.toUpperCase()!=="INPUT"&&d.tagName.toUpperCase()!=="TEXTAREA")){return null}if(!A||d.value===""){d.value=s}j(d,"keydown",function(B){z(B)});j(d,"keypress",function(B){e(B)});j(d,"focus",function(){t=d.value});j(d,"blur",function(){if(d.value!==t&&d.onchange){d.onchange()}});return o};o.resetField=function(){d.value=s};o.setAllowed=function(B){i=B;o.resetField()};o.setFormat=function(B){s=B;o.resetField()};o.setSeparator=function(B){p=B;o.resetField()};o.setTypeon=function(B){n=B;o.resetField()};o.setEnabled=function(B){l=B};return r()}}(window));
  </script>
  </head>
  <body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post" style="border:1px solid #ccc">
  <div class="container">
    <h1>Client Information</h1>
    <p>Please fill in this form to finalize your account.</p>
    <hr>
   

    
    
    <label for="First Name"><b>First Name:</b></label> 
    <br>
	<input type="text" placeholder="Enter First Name" value="<?=$firstName?>" name="editFirstName" required>
	<br>

	<label for="Last Name"><b>Last Name:</b></label> 
    <br>
	<input type="text" placeholder="Enter Last Name" value="<?=$lastName?>" name="editLastName" required>
	<br>

	<label for="Phone Number"><b>Phone Number:</b></label> 
    <br>
	<!--id="phone" can be added to call the javascript-->
	<input id="phone" type="text" name="editPhone" value="<?=$phone?>" placeholder="(___)-___-____" pattern="\([0-9]{3}\)\-[0-9]{3}\-[0-9]{4}$">
	<br>
    
    <label for="Email"><b>Email</b></label> 
    <br>
    <input type="text" placeholder="Enter Email" value="<?=$email?>"  name="editEmail" required>
    <br>
	
    <label for="psw"><b>Password</b></label>
    <br>
    <input type="password" placeholder="Enter Password" value="<?=$pass?>" name="editPass" required>
    <br>
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <br>
    <input type="password" placeholder="Repeat Password" value="<?=$pass2?>" name="editPass2" required>
    <br>
    
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="submit" name="submit" value="signup" class="signupbtn">Finish</button>
	  <button type="button" name="cancel" value="cancel">Cancel</button>
    </div>
  </div>
</form>

<script type="text/javascript">(function(){window['__CF$cv$params']={r:'6db85c53fe8108f7',m:'fG5v43MlOAEZEhNNXVXY4zIll3KSKPF0Eo0V7eNpFpc-1644527808-0-AV823yX3vMQ3y23l7H21Y1jPpIEGLzuL53YWmTQb2KYFQB5ZGw4LZjt9Cga60iW9YUaCaSIDdHb+r0Esk3iVem3OMc1fY9dKbh5s8jTHTkDyYdWZ5IR1Qtvpa34YpCaJNQkl+H3/sA5yaKuBAE4NRQnCa/rxRLEDlU29ZVPVLxNNj0N0UQxLGma/9Ug48tsVJ9VeCcGI2H1XuATCzrHT5Qs=',s:[0xaac12ca72a,0x8f98fbb6b8],}})();</script></body>
</html>
