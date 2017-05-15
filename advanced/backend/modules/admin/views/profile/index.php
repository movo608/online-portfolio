<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = $user->first_name . '\'s Profile';
?>

<style type="text/css">
.user-index {
	margin-top: 0.3em;
}

.user-image .profile {
	opacity: .8;
	border-radius: 50%;
	transition: opacity 1s;
}

.user-image .profile:hover {
	opacity: 1;
}
</style>

<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header with-border">
				<h2 class="box-title page-header"><?= Html::encode($this->title) ?></h2>

				<div class="user-index">

					<div class="row user">
						<div class="col-md-3 col-md-offset-1">
							<h4 class="general">General</h4>
							<p class="user-first-name">
								First Name: <i><?= $user->first_name ?></i>
							</p>
							<p class="user-last-name">
								Last Name: <i><?= $user->last_name ?></i>
							</p>
							<p class="user-username">
								Username: <i><?= $user->username ?></i>
							</p>
							<p class="user-email">
								E-mail Address: <i><?= $user->email ?></i>
							</p>
							<p class="user-password">
								Password: <?= $hidden_password['password'] . ' / Length (ch): ' . $hidden_password['length'] ?>
							</p>
							<p class="user-status">
								Status: <?= $user->status == 10 ? '<i>ACTIVE :: '. $user->status .'</i>' : '<i>INACTIVE :: '. $user->status .'</i>'?>
							</p>
						</div>
						<div class="user-image col-md-3 col-md-offset-4">
							<?= Html::img($user->image, ['class' => 'col-md-12 profile'])?>
							<div class="mein-image text-center">
								<p> Mein <?= utf8_encode('fäis') ?> </p>
							</div>
						</div>
					</div>
					
					<hr>
					
					<div class="row form">
					
						<div class="user-form col-md-8 col-md-offset-2">
							<?php $form = ActiveForm::begin(); ?>
								
							<?= $form->field($user, 'last_name')->textInput(['maxLength' => true]) ?>
							
							<?= $form->field($user, 'first_name')->textInput(['maxLength' => true]) ?>
							
							<?= $form->field($user, 'username')->textInput(['maxLength' => true]) ?>
							
							<?= $form->field($user, 'email')->textInput(['maxLength' => true, 'type' => 'email']) ?>
							
							<?= $form->field($user, 'image')->textInput([]) ?>
							
							<div class="form-group">
								<?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
							</div>
							
							<?php ActiveForm::end(); ?>
						</div>
						
					</div>

				</div>

			</div>
		</div>
	</div>
</div>