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

					<p>
				        <?= Html::a('Create Landing Page Section Component', ['create'], ['class' => 'btn btn-success']) ?>
				    </p>
				    <?= GridView::widget([ 'dataProvider' => $dataProvider,'filterModel' => $searchModel,'columns' => [ [ 'class' => 'yii\grid\SerialColumn' ],'id','section:ntext','content_text','content_image',[ 'class' => 'yii\grid\ActionColumn' ] ] ]); ?>
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
      

