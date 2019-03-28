<?php
	require_once 'config.php';
    require_once 'dbconnect.php';
    $db = new database($conn);
    $rows = $db->getData();
	echo json_encode($rows);
?>