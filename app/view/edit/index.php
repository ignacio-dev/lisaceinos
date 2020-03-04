<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lisa Ceinos | Edit</title>
	<link rel="stylesheet" href="<?= URLROOT ?>/css/style.css?<?=  TIMESTAMP ?>">
	<link rel="stylesheet" href="<?= URLROOT ?>/css/header.css?<?= TIMESTAMP ?>">
	<link rel="stylesheet" href="<?= URLROOT ?>/css/edit.css?<?=   TIMESTAMP ?>">
</head>
<body>
	<form action="<?= URLROOT ?>/edit" method="POST">
		<h1><?= LOGO ?><sup>edit</sup></h1>
		<hr>
		<span class="error"><?= $data["username_error"] ?></span>
		<input type="text" name="username" placeholder="User Name" value="<?= $data["username"]?>">
		<span class="error"><?= $data["password_error"] ?></span>
		<input type="password" name="password" placeholder="Password">
		<button>Login</button>
	</form>
</body>
</html>