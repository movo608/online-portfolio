<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\PhotoCategories */

$this->title = 'Create Photo Categories';
$this->params['breadcrumbs'][] = ['label' => 'Photo Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
