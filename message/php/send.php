<?php

require "../twilio/Services/Twilio.php";

// set your AccountSid and AuthToken from www.twilio.com/user/account
$AccountSid = "..................................................";
$AuthToken  = ".......................................";

$client = new Services_Twilio($AccountSid, $AuthToken);

$message = $client->account->messages->create(array(
		"From" => "........",
		"To"   => ".........",
		"Body" => "Test message!",
	));

// Display a confirmation message on the screen
echo "Sent message {$message->sid}";

?>
