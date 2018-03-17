<?php
	include "../dbConfig.php";

	$information = array();

	$query = "SELECT * FROM page_information";

	$result = $database->query($query);

	$row = $result->fetch_assoc();

	$information['id'] = $row['page_id'];
	$information['data'] = $row['page_data'];


	


	header("Content-Type:application/json");
	echo json_encode($information);
