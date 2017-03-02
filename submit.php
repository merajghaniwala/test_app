<?php
$name = $email =$message = "";
if(empty($_POST['name'])) {
$error="<br/>- Please enter your name";
} else {
$name = test_input($_POST['name']);
if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
$error = "<br/>- Name: only letters and white space allowed"; 
}
}
if(empty($_POST['email'])) {
$error.="<br/>- Please enter your email";
}
if(empty($_POST['message'])) {
$error.="<br/>- Please enter your message";
}
if($error) {
$result='<div class="alert alert-danger" role="alert"><strong>Please correct the following:</strong>'.$error.'</div>';
echo "$result";
} else {
mail("info@hoplitepower.com", "Contact message", "Name: ".$_POST['name']."\nEmail: ".$_POST['email']."\nMessage: ".$_POST['message']);
$result='<div class="alert alert-success" role="alert">Thank you. We will get back to you shortly!</div>';
echo "$result";
}
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>
