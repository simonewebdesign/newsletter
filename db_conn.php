<?php

try {
	$db = new PDO ( "mysql:host=" . $cfg['hostname'] . ";dbname=" . $cfg['dbname'] . ";charset=UTF-8", $cfg['username'], $cfg['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
} catch ( PDOException $e ) {
	die( "Database error: ".$e->getMessage() );
}
