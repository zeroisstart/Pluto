<?php
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
        array(
        'components' => array(
            'db' => array(
		        'connectionString' => 'mysql:host=localhost;dbname=codebase',
		        'emulatePrepare'   => true,
		        'username'         => 'root',
                'tablePrefix'        => 'cb_',
		        'password'         => '',
		        'charset'          => 'utf8',
		        'enableProfiling'  => true,
	        )
	    ) 
    )
);

