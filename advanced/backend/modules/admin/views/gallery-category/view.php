<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\PhotoCategories */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Photo Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-categories-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',

            'thumbnail_image' => [
                'attribute' => 'thumbnail_image',
                'value' => $model->thumbnail_image,
                'format' => ['image', ['class' => ['col-md-3']]]
            ],

            'image' => [
                'attribute' => 'image',
                'value' => $model->image,
                'format' => ['image', ['class' => ['col-md-3']]]
            ],

            'description:ntext',
        ],
    ]) ?>

</div>
