<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\HtmlHelper;
use backend\components\TextFormatterComponent;

/* @var $this yii\web\View */
/* @var $searchModel common\models\HelloMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hello Messages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hello-message-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hello Message', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',

            [
                'attribute' => 'name',
                'contentOptions' => ['class' => 'col-md-2']
            ],

            'email:email',

            [
                'attribute' => 'message',
                'value' => function ($value) {
                    $string = $value->message;
                    if (strlen($string) > 70) {
                        return substr($string, 0, 70) . ' ...';
                    } else {
                        return $value->message;
                    }
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>