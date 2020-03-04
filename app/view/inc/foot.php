
	<script src="<?= URLROOT ?>/js/script.js?<?= TIMESTAMP ?>"></script>
	<? if ($current == "Photo"): ?>
		<script src="<?= URLROOT ?>/js/photo.js?<?= TIMESTAMP ?>"></script>
	<? endif; ?>
	<? if ($current == "Contact"): ?>
		<script src="<?= URLROOT ?>/js/contact.js?<?= TIMESTAMP ?>"></script>
		<script src="https://www.google.com/recaptcha/api.js"></script>
	<? endif; ?>
</body>
</html>