<?php

$name = $_POST['sendername'];

$subject = $_POST['subject'];

$email = $_POST['senderemail'];

$message = $_POST['message'];


include 'dbc/bdd_connection.php';


/*ReCaptcha + DB Inserts*/

if (isset($_POST['submitmessage'])) {

	if (isset($_POST['g-recaptcha-response'])){

		require_once 'recaptcha/autoload.php';
		$recaptcha = new \ReCaptcha\ReCaptcha('6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe');

		$resp = $recaptcha->setExpectedHostname('www.videovoidmusic.com')
			              ->verify($_POST['g-recaptcha-response']);


		if ($resp->isSuccess()) {
				// Verified!

				if( isset($name) && isset($email) && isset($subject) && isset($message) && !empty($name) && !empty($subject) && !empty($message) && !empty($email)) {

					$messageQuery = $pdo->prepare(
					"INSERT INTO messages ( name , messagedate , email, subject, message )
					VALUES ( ?, NOW(), ?, ?, ?  )
					");

					$messageQuery->execute( [$name, $email, $subject, $message] );

					header("Location: https://www.videovoidmusic.com/contactmsgsent");
				}

				else {
					
					header("Location: https://www.videovoidmusic.com/contact");
				}	
					}

		else {
			header("Location: https://www.videovoidmusic.com/contact");
		}
	}
}
	
?>