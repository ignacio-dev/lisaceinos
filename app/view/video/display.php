<? require HEAD; ?>
	<main id="video" style="padding: 15px!important;">
		<hr>
		<nav>
			<a href="<?= URLROOT ?>/video">
				<i class="fas fa-arrow-left"></i> back
			</a>
		</nav>
		<div id="credits">
			<h2><?= $data['video_title'] ?></h2>
			<h2 class="subtitle"><?= $data['video_author'] ?></h2>
			<p>Role: <?= $data['video_role'] ?></p>
		</div>
		<div id="iframe">
			<iframe width="560" height="315" src="<?= $data['video_link'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
	</main>
	<div class="clearfix"></div>
<? require FOOT; ?>