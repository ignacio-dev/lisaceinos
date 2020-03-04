<? require HEAD; ?>
	<main id="photo">
		<ul>
			<li><figure style="background-image: url(img/photo/photo1.jpg?v=<?= $data['photo1']->version ?>)"></figure></li>
			<li><figure style="background-image: url(img/photo/photo2.jpg?v=<?= $data['photo2']->version ?>)"></figure></li>
			<li><figure style="background-image: url(img/photo/photo3.jpg?v=<?= $data['photo3']->version ?>)"></figure></li>
			<li><figure style="background-image: url(img/photo/photo4.jpg?v=<?= $data['photo4']->version ?>)"></figure></li>
			<li><figure style="background-image: url(img/photo/photo5.jpg?v=<?= $data['photo5']->version ?>)"></figure></li>
			<li><figure style="background-image: url(img/photo/photo6.jpg?v=<?= $data['photo6']->version ?>)"></figure></li>
			<li><figure style="background-image: url(img/photo/photo7.jpg?v=<?= $data['photo7']->version ?>)"></figure></li>
			<li><figure style="background-image: url(img/photo/photo8.jpg?v=<?= $data['photo8']->version ?>)"></figure></li>
		</ul>
		<div class="clearfix"></div>
	</main>
	<script>
		<?php
			$allDataVersions = [];
			foreach ($data as $key) {
				array_push($allDataVersions, $key->version);
			}
		?>
		var photoVersions = [<?= implode(', ', $allDataVersions); ?>];
	</script>
<? require FOOT; ?>