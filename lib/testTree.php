<?php
$data = Array();
$path = $_POST['path'];
$path = $path.$_POST['choice'];
$data['index'] = $path;

$bin_arr = array(
		'1'  => 'Did anyone see you',
		'10' => 'Was it sticky?',
		'11' => 'Was it a boss/lover/parent?'
		);
$data['string'] = $bin_arr[$path];


echo json_encode($data);



?>