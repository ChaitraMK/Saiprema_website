<?php
// Install the library via PEAR or download the .zip file to your project folder.
// This line loads the library
// this line loads the library
require "../twilio/Services/Twilio.php";

$account_sid = "ACdcb07be670ddd2b5951cf0e6a265fbdd";
$auth_token  = "924d5d0fd53f84fc27e38b2dc522cc76";
$client      = new Services_Twilio($account_sid, $auth_token);

$contact = array();
$contact = json_decode(stripslashes($_POST['contact']));
var_dump($contact);
$mess = $_POST['mess'];
foreach ($contact as $c) {
	$message = $client->account->messages->sendMessage(
		'8478071716',
		$c,
		$mess

	);
	echo 1;
}

?>
