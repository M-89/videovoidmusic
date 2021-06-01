<?php

include 'dbc/bdd_connection.php';

$name = $_POST['name'];

$email = $_POST['email'];

/*ReCaptcha + DB Inserts*/

if (isset($_POST['submitmail'])) {

	if (isset($_POST['g-recaptcha-response'])){

		require_once 'recaptcha/autoload.php';
		$recaptcha = new \ReCaptcha\ReCaptcha('6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe');

		$resp = $recaptcha->setExpectedHostname('www.videovoidmusic.com')
			              ->verify($_POST['g-recaptcha-response']);


		if ($resp->isSuccess()) {
				// Verified!

				if( isset($name) && isset($email) && !empty($name) && !empty($email) 
					&& isset($_POST['checkboxconsent']) ) {

					$customerQuery = $pdo->prepare(
					"INSERT INTO customers ( name , email , creationtimestamp, emailmarketingconsent )
					VALUES ( ?, ?, NOW(), ? )
					");

					$customerQuery->execute([$name, $email, 'Yes']);

					header("Location: https://www.videovoidmusic.com/dlep");

					}

				elseif ( isset($name) && isset($email) && !empty($name) && !empty($email) 
				&& empty($_POST['checkboxconsent']) ) {

					$customerQuery = $pdo->prepare(
					"INSERT INTO customers ( name , email , creationtimestamp, emailmarketingconsent )
					VALUES ( ?, ?, NOW(), ? )
					");

					$customerQuery->execute([$name, $email, 'No']);

					header("Location: https://www.videovoidmusic.com/dlep");

					}

				else {
							
					header("Location: https://www.videovoidmusic.com/");
				}		
		}

		else {
			header("Location: https://www.videovoidmusic.com/");
		}
	}
}

?>