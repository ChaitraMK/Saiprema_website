<?php
// Install the library via PEAR or download the .zip file to your project folder.
// This line loads the library
// this line loads the library
require "../twilio/Services/Twilio.php";

$account_sid = ".................................";
$auth_token  = "..........................";
$client      = new Services_Twilio($account_sid, $auth_token);

$contact = array();
$contact = json_decode(stripslashes($_POST['contact']));
var_dump($contact);
$mess = $_POST['mess'];
foreach ($contact as $c) {
	$message = $client->account->messages->sendMessage(
		'...........',
		$c,
		$mess

	);
	echo 1;
}

?>
