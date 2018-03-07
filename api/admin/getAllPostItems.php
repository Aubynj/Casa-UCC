<?php
	include "../dbConfig.php";

	$postArray = array();
	$counter = 1;
	$query = "SELECT * FROM frontpost ORDER BY post_id DESC";
	$result = $database->query($query);

	if($result -> num_rows > 0){
		echo "<table class='table table-bordered table-hover'>
				<h5><strong>Front Post Items</strong></h5><hr>
				<thead class='thead-dark'>
				<tr>
				<th>#</th>
				<th>Post Title</th>
				<th>Post date</th>
				<th>Post Time</th>
				<th>Action</th>
				</tr>
				</thead>
				<tbody>
		";
		while($row = $result->fetch_assoc()){
			$itemSubject = $row["post_title"];
			$itemMessage = $row["post_message"];
			$itemDate = $row["post_date"];
			$itemTime = $row["post_time"];



      $postArray["id"] = $row["post_id"];
			$postArray["title"] = $row["post_title"];
      $postArray["image"]  = $row["post_image"];
			$postArray["message"] = $row["post_message"];
			$postArray["date"] = $row["post_date"];
			$postArray["time"] = $row["post_time"];

			$postObj = json_encode($postArray);


			echo "
					<tr>
						<td>$counter</td>
						<td><strong>$itemSubject</strong></td>
						<td>$itemDate</td>
						<td>$itemTime</td>
						<td>
							<span class='action-edit'><i class='fa fa-pencil action-edit' onclick='viewPost($postObj)'></i></span>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <span class='action-delete'><i class='fa fa-trash-o action-delete' onclick='deletePost($postObj)'></i></span>
						</td>
					</tr>
				";
        $counter++;
			}

			echo "
				</thead>
				</table>
			";


	}else{
		echo "

				<h4>There Are No Front Posts Available</h4>

		";
	}
