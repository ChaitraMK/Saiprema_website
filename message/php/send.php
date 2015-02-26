<?php

require "../twilio/Services/Twilio.php";

// set your AccountSid and AuthToken from www.twilio.com/user/account
$AccountSid = "ACdcb07be670ddd2b5951cf0e6a265fbdd";
$AuthToken  = "924d5d0fd53f84fc27e38b2dc522cc76";

$client = new Services_Twilio($AccountSid, $AuthToken);

$message = $client->account->messages->create(array(
		"From" => "8478071716",
		"To"   => "8147264989",
		"Body" => "Test message!",
	));

// Display a confirmation message on the screen
echo "Sent message {$message->sid}";

?>
