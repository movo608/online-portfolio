<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\admin\models\PhotoCategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Photo Categories';
$this->params ['breadcrumbs'] [] = $this->title;
?>

<div class="photo-categories-index">

	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title"><?= Html::encode($this->title) ?></h3>

					<p>
        				<?= Html::a('Create Photo Categories', ['create'], ['class' => 'btn btn-success'])?>
    				</p>

				    <?= GridView::widget([ 
				    	'dataProvider' => $dataProvider,
				    	'filterModel' => $searchModel,

				    	'columns' => [
				    		[ 'class' => 'yii\grid\SerialColumn' ],

				    		//'id',
				    		'name',

				    		'thumbnail_image' => [
				    			'attribute' => 'thumbnail_image',
				    			'value' => 'thumbnail_image',
				    			'format' => ['image', ['class' => ['col-md-6']]]
				    		],

				    		'image' => [
				    			'attribute' => 'image',
				    			'value' => 'image',
				    			'format' => ['image', ['class' => ['col-md-6 photo-td']]],
				    		],
				    		
				    		//'description:ntext'

				    		'description' => [
				    			'attribute' => 'description',
				    			'value' => function ($value) {
				    				return substr($value->description, 0, 10) . ' ...';
				    			}
				    		],

				    		[ 'class' => 'yii\grid\ActionColumn' ]
				    	]
				    ]); ?>
				</div>

			</div>
		</div>
	</div>
</div>