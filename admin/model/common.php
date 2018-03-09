<?php
    DEFINE('In_System', TRUE);
    

    date_default_timezone_set('America/Los_Angeles');

    $sys_config['db_location'] = 'localhost';
    $sys_config['db_username'] = 'root';
    $sys_config['db_password'] = '';
    $sys_config['db_base'] = 'svacation';

    $path = $_SERVER['DOCUMENT_ROOT'];

	$mysqli = new mysqli($sys_config['db_location'], $sys_config['db_username'], $sys_config['db_password'], $sys_config['db_base']);
	if(mysqli_connect_errno()){
		printf("Database connection failure: %s\n", mysqli_connect_error());
		exit();
	}
	if (!$mysqli->set_charset("utf8")) {
    	printf("Error loading character set utf8: %s\n", $mysqli->error);
    	exit();
	}
    //print_r($settings);
?>