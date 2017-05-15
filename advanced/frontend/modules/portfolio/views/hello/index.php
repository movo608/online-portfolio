<?php
use frontend\modules\portfolio\assets\HelloAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

HelloAsset::register($this);
?>

<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->

<!-- Header -->
<header id="header">
	<h1>Big Picture</h1>
	<nav>
		<ul>
			<li><?= Html::a('Portfolio', ['/portfolio/gallery']) ?></li>
			<li><a href="#intro">Intro</a></li>
			<li><a href="#one">What I Do</a></li>
			<li><a href="#two">Who I Am</a></li>
			<li><a href="#work">My Work</a></li>
			<li><a href="#contact">Contact</a></li>
		</ul>
	</nav>
</header>

<!-- Intro -->
<section id="intro" class="main style1 dark fullscreen">
	<div class="content">
		<header>
			<h2>Hey.</h2>
		</header>
		<p>
			<?= $section_header->content_text ?>
		</p>
		<footer>
			<a href="#one" class="button style2 down">More</a>
		</footer>
	</div>
</section>

<!-- One -->
<section id="one" class="main style2 right dark fullscreen">
	<div class="content box style2">
		<header>
			<h2>What I Do</h2>
		</header>
		<p>
			<?= $section_work->content_text ?>
		</p>
	</div>
	<a href="#two" class="button style2 down anchored">Next</a>
</section>

<!-- Two -->
<section id="two" class="main style2 left dark fullscreen">
	<div class="content box style2">
		<header>
			<h2>Who I Am</h2>
		</header>
		<p>
			<?= $section_bio->content_text ?>
		</p>
	</div>
	<a href="#work" class="button style2 down anchored">Next</a>
</section>

<!-- Work -->
<section id="work" class="main style3 primary">
	<div class="content">
		<header>
			<h2>My Work</h2>
			<p>
				<?= $section_gallery_work->content_text ?>
			</p>
		</header>

		<!-- Gallery  -->
		<div class="gallery">
			<?php foreach ($hello_gallery_models as $image) { ?>
				<article class="from-left">
					<a href="<?= $image->path ?>" class="image fit">
						<img src="<?= $image->path ?>" alt="Image could not be loaded"/>
					</a>
				</article>
			<?php } ?>
		</div>

	</div>
</section>

<!-- Contact -->
<section id="contact" class="main style3 secondary">
	<div class="content">
		<header>
			<h2>Say Hello.</h2>
			<p>
				<?= $section_contact_form->content_text ?>
			</p>
		</header>
		<div class="box">
			<?= Yii::$app->session->getFlash('success'); ?>

			<?php $form = ActiveForm::begin(); ?>

			<?= $form->field($form_model, 'name')->textInput(['maxlength' => true]) ?>

			<?= $form->field($form_model, 'email')->textInput(['maxlength' => true]) ?>

			<?= $form->field($form_model, 'message')->textarea(['maxlength' => true]) ?>

			<div class="form-group">
        		<?= Html::submitButton('Submit', ['name' => 'contact-button']); ?>
    		</div>

			<?php ActiveForm::end(); ?>
		</div>
	</div>
</section>

<!-- Footer -->
<footer id="footer">

	<!-- Icons -->
	<ul class="actions">
		<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
		<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
		<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
		<li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
		<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
		<li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
	</ul>

	<!-- Menu -->
	<ul class="menu">
		<li>&copy; Sicarius &spades; <?= date('Y') ?></li>
		<li>Design: <?= Html::a('HTML5 UP', 'https://www.html5up.com') ?></li>
		<li><?= Yii::powered(); ?></li>
	</ul>

</footer>

<!-- Scripts -->
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->