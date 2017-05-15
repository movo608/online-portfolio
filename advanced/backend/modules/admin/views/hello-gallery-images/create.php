<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\HelloGalleryImages */

$this->title = 'Create Hello Gallery Images';
$this->params['breadcrumbs'][] = ['label' => 'Hello Gallery Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hello-gallery-images-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
