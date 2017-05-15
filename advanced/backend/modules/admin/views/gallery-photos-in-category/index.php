<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\admin\models\GalleryImagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gallery Images';
$this->params ['breadcrumbs'] [] = $this->title;
?>
<div class="gallery-images-index">

	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title"><?= Html::encode($this->title) ?></h3>

					
				    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

				    <p>
				        <?= Html::a('Create Gallery Images', ['create'], ['class' => 'btn btn-success'])?>
				    </p>

				    <?= GridView::widget([ 
				    	'dataProvider' => $dataProvider,
				    	'filterModel' => $searchModel,
				    	'columns' => [ 
				    		[ 'class' => 'yii\grid\SerialColumn' ],

				    		//'id',

				    		'image' => [
				    			'value' => 'image',
				    			'attribute' => 'image',
				    			'format' => ['image', ['class' => ['col-md-12']]]
				    		],

				    		'thumbnail_image' => [
				    			'value' => 'image',
				    			'attribute' => 'thumbnail_image',
				    			'format' => ['image', ['class' => ['col-md-12']]]
				    		],

				    		'name',
				    		'description:ntext',
				    		
				    		'category_id' => [
				    			'value' => function ($value) {
				    				return \backend\modules\admin\models\PhotoCategories::find()
				    							->where(['id' => $value->category_id])
				    							->one()
				    							->name;
				    			},
				    			'attribute' => 'category_id'
				    		],

				    		[ 'class' => 'yii\grid\ActionColumn' ]
				    	]
				    ]); ?>
				</div>
			</div>
		</div>
	</div>
</div>
