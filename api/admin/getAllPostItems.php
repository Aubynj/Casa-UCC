<?php
	include "../dbConfig.php";

	$postArray = array();
	$counter = 0;
	$query = "SELECT * FROM post";
	$result = $database->query($query);

	if($result -> num_rows > 0){
		echo "<table>
				<h5><strong>Post Items</strong></h5><hr>
				<thead>
				<tr>
				<th>#</th>
				<th>Post Subject</th>
				<th>Post date</th>
				<th>Post Time</th>
				<th>Action</th>
				</tr>
				</thead>
				<tbody>
		";
		while($row = $result->fetch_assoc()){
			$itemSubject = $row["post_subject"];
			$itemMessage = $row["post_message"];
			$itemDate = $row["post_date"];
			$itemTime = $row["post_time"];




			$postArray["subject"] = $row["post_subject"];
			$postArray["message"] = $row["post_message"];
			$postArray["date"] = $row["post_date"];
			$postArray["time"] = $row["post_time"];

			$postObj = json_encode($postArray);


			echo "
					<tr>
						<td>$counter</td>
						<td><strong>itemSubject</strong></td>
						<td>$itemDate</td>
						<td>$itemTime</td>
						<td>
							<button type='button'  class='btn indigo accent-2' onclick='viewItem($itemObj)'>
	                        	<i class='fa fa-eye'></i> View
	                        </button>
						</td>
					</tr>
				";

			}

			echo "
				</thead>
				</table>
			";

		
	}else{
		echo "
		
				<h4>There Are No Posts Available</h4>

		";
	}