<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\HelloMessage */

$this->title = 'Create Hello Message';
$this->params['breadcrumbs'][] = ['label' => 'Hello Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hello-message-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
