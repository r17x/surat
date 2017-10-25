<?php 

	$a = array(
		'a' => 1,
		'b' => 2,
	);

	header('Access-Control-Allow-Origin:*');
	echo json_encode($a);

