<?php

use yii\helpers\Html;

?>

<h1>LOREM IPSUM DOLOR</h1>

<h3>Aici intra pagina cu toate categoriile</h3>

<?php foreach ($categories_models as $category) { ?>

	Name: <?= $category->name ?> <br>
	<?= Html::img($category->image, ['class' => 'col-md-3']) ?>
	Photos: <?= Html::a('Next', ['gallery/category/?id=' . $category->id]) ?>

<?php } ?>