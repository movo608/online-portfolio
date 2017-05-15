<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
	'modules' => [
		'portfolio' => [
			'class' => 'frontend\modules\portfolio\Module',
		]
	],
    'components' => [
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            /*
            *
            * Uncomment if application settings are available.
            * Otherwise, default PHP7 mail() function will be used.
            *
            'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'port' => '587',
            'encryption' => 'tls'
            ]
            */
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
    ],
    'params' => $params,
];
