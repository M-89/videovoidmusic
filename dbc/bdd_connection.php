<?php

$user ='...';

$pass = '...';
		
$pdo = new PDO(	'mysql:host=='...';;dbname=='...';;charset=UTF8', $user, $pass );
$pdo->exec('SET NAMES UTF8');