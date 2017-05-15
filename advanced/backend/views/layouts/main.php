<?php

/* @var $this \yii\web\View */
/* @var $content string */
use backend\assets\AppAsset;
use yii\helpers\Html;
use common\widgets\Alert;
use common\models\User;

AppAsset::register($this);

$user = User::find()->where(['id' => Yii::$app->user->id])->one();

$seen_messages = \backend\modules\admin\models\SeenMessages::find()->all();

$counter = 0;

foreach ($seen_messages as $message) {
	if (! $message->is_seen) {
		$counter++;
	}
}

if (!$counter) {
	$counter = 'None';
}

?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags()?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head()?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody()?>

<div class="wrapper">

		<header class="main-header">

			<!-- Logo -->
		
		<?= Html::a('<span class="logo-mini"><b>A</b>LT</span><span class="logo-lg"><b>Admin</b>LTE</span>', ['/'], ['class' => 'logo'])?>

		<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Navbar Right Menu -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown messages-menu">
							<?php
							if ($counter) {
								echo Html::a('<i class="fa fa-envelope-o"></i><span class="new_messages_header label label-success">'
									. $counter 
									.'</span>', 
									['/admin/hello-message']);
							} else {
								echo Html::a('<i class="fa fa-envelope-o"></i><span class="new_messages_header label label-danger">'
									. $counter 
									.'</span>', 
									['/admin/hello-message']);
							}
							?>
						</li>
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu"><a href="#"
							class="dropdown-toggle" data-toggle="dropdown"> <img
								src="<?= $user->image ?>" class="user-image"
								alt="User Image"> <span class="hidden-xs">
								<?= $user->first_name . ' ' . $user->last_name ?>
							</span>
						</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header"><img src="<?= $user->image ?>"
									class="img-circle" alt="User Image">

									<p>
										<?= $user->first_name . ' ' . $user->last_name ?> <small>Member since <?= Yii::$app->formatter->asDate($user->created_at) ?></small>
									</p></li>
								<li class="user-footer">
									<div class="pull-left">
										<?= Html::a('Profile', ['/admin/profile'], ['class' => 'btn btn-default btn-flat']) ?>
									</div>
									<div class="pull-right">
									
									<?=
									Html::beginForm([ '/site/logout' ], 'post') 
									. Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')', 
									[ 'class' => 'btn btn-default btn-flat' ]) . Html::endForm();
									?>
									
								</div>
								</li>
							</ul></li>
					</ul>
				</div>

			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sid	ebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?= $user->image ?>" class="img-circle"
							alt="User Image">
					</div>
					<div class="pull-left info">
						<p><?= $user->first_name . ' ' . $user->last_name ?></p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="header">MAIN NAVIGATION</li>
					<li class="active treeview"><a href="#"> <i class="fa fa-dashboard"></i>
							<span>Modules</span> <span class="pull-right-container"> <i
								class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
						<ul class="treeview-menu">
							<li><?= Html::a('<i class="fa fa-circle-o text-red"></i> Landing Page', ['/admin/hello']) ?></li>
							<li><?= Html::a('<i class="fa fa-circle-o text-red"></i> Gallery Categories', ['/admin/gallery-category']) ?></li>
							<li><?= Html::a('<i class="fa fa-circle-o text-red"></i> Gallery Images', ['/admin/gallery-photos-in-category']) ?></li>
							<li><?= Html::a('<i class="fa fa-circle-o text-red"></i> Hello Page Gallery', ['/admin/hello-gallery-images']) ?></li>
							<li><?= Html::a('<i class="fa fa-circle-o text-red"></i> Messages (<span id="new_messages">' . $counter .'</span> unread)', ['/admin/hello-message']) ?></li>
						</ul></li>
					<li class="active treeview"><a href="#"> <i class="fa fa-cogs"
							aria-hidden="true"></i> <span>Other</span> <span
							class="pull-right-container"> <i
								class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
						<ul class="treeview-menu">
							<li>
								<?= Html::a('<i class="fa fa-circle-o text-yellow"></i> Profile Settings</li>', ['/admin/profile'])?>
							</li>
						</ul>
					</ul>
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Dashboard <small>Version 2.0</small>
				</h1>
				<ol class="breadcrumb">
					<li><?= Html::a('<i class="fa fa-dashboard"></i> Home</li>', ['/']) ?></li>
		
					<?= ($this->title != 'Home') ? '<li class="active">' . $this->title . '</li>' : false ?>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
        	<?= Alert::widget()?>
       		<?= $content?>
		</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 2.3.8
			</div>
			<strong>Copyright &copy; 2014-2016 <a
				href="http://almsaeedstudio.com">Almsaeed Studio</a>.
			</strong> All rights reserved.
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Create the tabs -->
			<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
				<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i
						class="fa fa-home"></i></a></li>
				<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i
						class="fa fa-gears"></i></a></li>
			</ul>
	
	</div>
	</aside>
	<!-- /.control-sidebar -->
	<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
	</div>

<?php $this->endBody()?>
</body>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
</html>
<?php $this->endPage()?>
