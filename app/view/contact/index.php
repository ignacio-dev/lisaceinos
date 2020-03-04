<? require HEAD; ?>
	<main id="contact">
		<form action="<?= URLROOT ?>/contact" method="POST">
			<input type="text" name="name" placeholder="Name" value="<?= $data['name'] ?>" required data-gramm_editor="false">
			<input type="email" name="email" placeholder="Email" value="<?= $data['email'] ?>" required data-gramm_editor="false">
			<input type="tel" name="phone" placeholder="Phone number (optional)" value="<?= $data['phone'] ?>" data-gramm_editor="false">
			<textarea name="message" placeholder="Message" required data-gramm_editor="false" maxlength="5000"><?= $data['message']?></textarea>
			<span class="error"><?= $data['captcha_error'] ?></span>
			<div class="captcha-container">
				<div class="g-recaptcha <?= $data['captcha_class'] ?>" data-sitekey="<?= Contact::$publicKey ?>"></div>
			</div>
			<button name="send" id="sendBtn">
				<i class="far fa-paper-plane"></i>Send
			</button>	
		</form>
	</main>
<? require FOOT; ?>