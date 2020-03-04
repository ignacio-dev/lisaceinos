<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lisa Ceinos | Edit</title>
	<link rel="stylesheet" href="<?= URLROOT ?>/css/reset.css?<?=  TIMESTAMP ?>">
	<link rel="stylesheet" href="<?= URLROOT ?>/css/style.css?<?=  TIMESTAMP ?>">
	<link rel="stylesheet" href="<?= URLROOT ?>/css/header.css?<?= TIMESTAMP ?>">
	<link rel="stylesheet" href="<?= URLROOT ?>/css/edit.css?<?=   TIMESTAMP ?>">
	<link rel="stylesheet" href="<?= URLROOT ?>/css/about.css?<?=   TIMESTAMP ?>">
	<link rel="stylesheet" href="<?= URLROOT ?>/css/edit/about.css?<?=   TIMESTAMP ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
	<header>
		<h1><?= LOGO ?><sup>edit</sup></h1>
		<nav>
			<div id="mainmenus">
				<a href="<?= URLROOT ?>/edit/photo">photo</a>
				<a href="<?= URLROOT ?>/edit/video" class="active">video</a>
				<a href="<?= URLROOT ?>/edit/about">about</a>
				<a href="<?= URLROOT ?>/edit/logout" class="logout"><i class="fas fa-sign-out-alt"></i> logout</a>
			</div>
		</nav>
	</header>
	<main id="about-edit">
		<button id="saveBtn"><i class="far fa-save"></i> save</button>
	</main>
</body>
</html>