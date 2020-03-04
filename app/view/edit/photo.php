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
	<link rel="stylesheet" href="<?= URLROOT ?>/css/photo.css?<?=   TIMESTAMP ?>">
	<link rel="stylesheet" href="<?= URLROOT ?>/css/edit/photo.css?<?=   TIMESTAMP ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
	<header>
		<h1><?= LOGO ?><sup>edit</sup></h1>
		<nav>
			<div id="mainmenus">
				<a href="<?= URLROOT ?>/edit/photo" class="active">photo</a>
				<a href="<?= URLROOT ?>/edit/video">video</a>
				<a href="<?= URLROOT ?>/edit/about">about</a>
				<a href="<?= URLROOT ?>/edit/logout" class="logout"><i class="fas fa-sign-out-alt"></i> logout</a>
			</div>
		</nav>
	</header>
	<main id="photo">
		<ul>
			<li title="Drag to move" id="photo1">
				<div class="chooseFileContainer">
					<input type="file" class="chooseFileBtn" name="chooseFileBtn1" accept="image/jpg">
				</div>
				<figure style="background-image: url(<?= URLROOT ?>/img/photo/photo1.jpg?v=<?= $data["photo1"]->version ?>)" data-updated="false"></figure>
			</li>
			<li title="Drag to move" id="photo2">
				<div class="chooseFileContainer">
					<input type="file" class="chooseFileBtn" name="chooseFileBtn2" accept="image/jpg">
				</div>
				<figure style="background-image: url(<?= URLROOT ?>/img/photo/photo2.jpg?v=<?= $data["photo2"]->version ?>)" data-updated="false"></figure>
			</li>
			<li title="Drag to move" id="photo3">
				<div class="chooseFileContainer">
					<input type="file" class="chooseFileBtn" name="chooseFileBtn3" accept="image/jpg">
				</div>
				<figure style="background-image: url(<?= URLROOT ?>/img/photo/photo3.jpg?v=<?= $data["photo3"]->version ?>)" data-updated="false"></figure>
			</li>
			<li title="Drag to move" id="photo4">
				<div class="chooseFileContainer">
					<input type="file" class="chooseFileBtn" name="chooseFileBtn4" accept="image/jpg">
				</div>
				<figure style="background-image: url(<?= URLROOT ?>/img/photo/photo4.jpg?v=<?= $data["photo4"]->version ?>)" data-updated="false"></figure>
			</li>
			<li title="Drag to move" id="photo5">
				<div class="chooseFileContainer">
					<input type="file" class="chooseFileBtn" name="chooseFileBtn5" accept="image/jpg">
				</div>
				<figure style="background-image: url(<?= URLROOT ?>/img/photo/photo5.jpg?v=<?= $data["photo5"]->version ?>)" data-updated="false"></figure>
			</li>
			<li title="Drag to move" id="photo6">
				<div class="chooseFileContainer">
					<input type="file" class="chooseFileBtn" name="chooseFileBtn6" accept="image/jpg">
				</div>
				<figure style="background-image: url(<?= URLROOT ?>/img/photo/photo6.jpg?v=<?= $data["photo6"]->version ?>)" data-updated="false"></figure>
			</li>
			<li title="Drag to move" id="photo7">
				<div class="chooseFileContainer">
					<input type="file" class="chooseFileBtn" name="chooseFileBtn7" accept="image/jpg">
				</div>
				<figure style="background-image: url(<?= URLROOT ?>/img/photo/photo7.jpg?v=<?= $data["photo7"]->version ?>)" data-updated="false"></figure>
			</li>
			<li title="Drag to move" id="photo8">
				<div class="chooseFileContainer">
					<input type="file" class="chooseFileBtn" name="chooseFileBtn8" accept="image/jpg">
				</div>
				<figure style="background-image: url(<?= URLROOT ?>/img/photo/photo8.jpg?v=<?= $data["photo8"]->version ?>)" data-updated="false"></figure>
			</li>
		</ul>
		<button id="saveBtn"><i class="far fa-save"></i> save</button>
		<div id="resp"></div>
	</main>
	<div id="clearfix"></div>
	<script src="<?= URLROOT ?>/js/edit/photo.js?<?= TIMESTAMP ?>"></script>
</body>
</html>