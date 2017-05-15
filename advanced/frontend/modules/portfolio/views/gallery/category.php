<?php
use frontend\modules\portfolio\assets\GalleryAsset;

GalleryAsset::register($this);
?>
<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
<body class="is-loading-0 is-loading-1 is-loading-2">

	<!-- Main -->
	<div id="main">

		<!-- Header -->
		<header id="header">
			<h1>Lens</h1>
			<p>
				Just another fine responsive site template by <a
					href="http://html5up.net">HTML5 UP</a>
			</p>
			<ul class="icons">
				<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
				<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
				<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
			</ul>
		</header>

		<!-- Thumbnails -->

		<section id="thumbnails">

			<?php foreach ($images_models as $image) { ?>
				<article>
					<a class="thumbnail" href="<?= $image->image ?>" data-position="left center">
						<img src="<?= $image->image ?>" alt="Error Loading Image" />
					</a>
					<h2><?= $image->name ?></h2>
					<p><?= $image->description ?></p>
				</article>
			<?php } ?>

		</section>

		<!-- Footer -->
		<footer id="footer">
			<ul class="copyright">
				<li>&copy; Untitled.</li>
				<li>Design: 
					<a href="http://html5up.net">HTML5 UP</a>.
				</li>
			</ul>
		</footer>

	</div>

	<!-- Scripts -->
	<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->