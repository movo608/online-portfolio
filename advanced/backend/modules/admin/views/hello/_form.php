<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\admin\models\LandingPageValidSections;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\LandingPage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="landing-page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'section')->dropDownList(
    	ArrayHelper::map(LandingPageValidSections::find()->all(), 'id', 'value')
    ) ?>

    <?= $form->field($model, 'content_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content_image')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
