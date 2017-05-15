<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\GalleryImages */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Gallery Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-images-view">

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
        
            //'id',

            'image' => [
                'value' => $model->image,
                'attribute' => 'image',
                'format' => ['image', ['class' => ['col-md-5']]]
            ],

            'thumbnail_image' => [
                'value' => $model->thumbnail_image,
                'attribute' => 'thumbnail_image',
                'format' => ['image', ['class' => ['col-md-5']]]
            ],

            'name',
            'description:ntext',

            'category_id' => [
                'attribute' => 'category_id',
                'value' => function ($value) {
                    return \backend\modules\admin\models\PhotoCategories::find()
                                ->where(['id' => $value->category_id])
                                ->one()
                                ->name;
                }
            ]
        ]
    ]) ?>

</div>
