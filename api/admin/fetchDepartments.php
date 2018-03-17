<?php
	include "../dbConfig.php";
	ini_set('display_errors', 1);


	$dataResponse = array();

	$query = "SELECT * FROM page_information ORDER BY page_id ASC LIMIT 1";

	$result = $database->query($query);

	$row = $result->fetch_assoc();

	$pageInformation = $row['page_data'];

	echo "
		<section class='container'>
			$pageInformation
		</section>

		";
