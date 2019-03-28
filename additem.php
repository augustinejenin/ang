<?php
	require_once 'config.php';
    require_once 'dbconnect.php';
    $db = new database($conn);
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    $rows = $db->insertdata($data);
    echo json_encode($rows);
?>