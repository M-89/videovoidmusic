		<?php include 'header_html.php'; ?>

		<main id="maincontact">

			<h1>Contact</h1>

			<form action="addMessage.php" method="post" id="formmsg">
				<label>Name * : </label><input type="text" name="sendername" class="contactinputs" aria-label="name" required>
				<label>Subject * : </label><input type="text" name="subject" class="contactinputs" aria-label="messagesubject" required>
				<label>Email * : </label><input type="email" name="senderemail" class="contactinputs" aria-label="email" required>
				<label>Message * : </label><textarea rows="4" cols="50" name="message" id="message" aria-label="message" required></textarea>
				<div class="g-recaptcha" id="contactcaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
				<input type="submit" name="submitmessage" value="Send" id="send" aria-label="submitbutton">
			</form>
			
		</main>

	</div>

	<?php include 'footer_html.php'; ?>