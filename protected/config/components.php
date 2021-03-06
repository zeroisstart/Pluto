<?php

return array (
		'user' => array (
				// enable cookie-based authentication
				'allowAutoLogin' => true 
		),
		'Folder' => array (
				'class' => 'components.System.Folder' 
		),
		'clientScript' => array (
				// 'class'=>'ext.dwz.DClientScript',
				'class' => 'components.System.ClientScript' 
		),
		// uncomment the following to enable URLs in path-format
		'urlManager' => array (
				'urlFormat' => 'path',
				'showScriptName' => false,
				'rules' => require 'routes.php' 
		),
		// uncomment the following to use a MySQL database
		'db' => array (
				'connectionString' => 'mysql:host=localhost;dbname=CodeBase',
				'emulatePrepare' => true,
				'username' => 'root',
				'password' => '',
				'charset' => 'utf8' 
		),
		/*'errorHandler' => array (
				'errorAction' => 'Top/error' 
		),*/
		'log' => array (
				'class' => 'CLogRouter',
				'routes' => array (
						array (
								'class' => 'CFileLogRoute',
								'levels' => 'error, warning' 
						) 
				) 
		),
		'switchDB' => array (
				'class' => 'application.components.System.switchDB' 
		),
		'database' => array (
				'class' => 'application.components.System.Database' 
		) ,
		'RouterParser'=>array('class'=>'application.components.System.RouterParser'),
		'cache' => array (
				'class' => 'system.caching.CApcCache',
		
		),
);