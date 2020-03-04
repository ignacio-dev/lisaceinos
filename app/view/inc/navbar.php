	<header>
		<h1><?= LOGO ?></h1>
		<nav>
			<div id="mainmenus">
				<a href="<?= URLROOT ?>/photo"   <? if ($current == "Photo")   echo "class='active'"; ?>>photo</a>
				<a href="<?= URLROOT ?>/video"   <? if ($current == "Video")   echo "class='active'"; ?>>video</a>
				<a href="<?= URLROOT ?>/about"   <? if ($current == "About")   echo "class='active'"; ?>>about</a>
				<a href="<?= URLROOT ?>/contact" <? if ($current == "Contact") echo "class='active'"; ?>>contact</a>
			</div>
			<a class="fas fa-bars" id="hamb"></a>
		</nav>
	</header>
