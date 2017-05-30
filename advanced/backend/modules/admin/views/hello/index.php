<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\admin\models\LandingPageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Landing Page';
?>


      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

				<div class="landing-page-index">

					<br>
            
			<?= GridView::widget([

              'dataProvider' => $dataProvider,
              
              'columns' => [
                [ 'class' => 'yii\grid\SerialColumn' ],

                //'id',

                'section' => [
                  'attribute' => 'section',
                  'value' => function ($value) {
                    return strtoupper(\backend\modules\admin\models\LandingPageValidSections::find()
                                ->where(['id' => $value->id])
                                ->one()->value);
                    }
                ],

                'content_text',

                /*'content_image' => [
                  'value' => 'content_image',
                  'attribute' => 'content_image',
                  'format' => ['image', ['class' => ['col-md-6']]]
                ],*/

                [ 'class' => 'yii\grid\ActionColumn' ] 
              ]

            ]); ?>
				</div>
				<!-- /.landing-page-index -->
				
			         </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      

