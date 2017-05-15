<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\LandingPage */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Landing Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landing-page-view">

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
            'section' => [
                'attribute' => 'section',
                'value' => function ($value) {
                    return strtoupper(\backend\modules\admin\models\LandingPageValidSections::find()
                            ->where(['id' => $value->id])
                            ->one()
                            ->value);
                }
            ],

            'content_text',

            'content_image' => [
                'value' => $model->content_image,
                'attribute' => 'content_image',
                'format' => ['image', ['class' => ['col-md-5']]]
            ]
        ],
    ]) ?>

</div>
