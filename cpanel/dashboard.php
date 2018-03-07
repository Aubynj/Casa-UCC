<?php include "includes/header.php"; ?>
<section class="container-fluid">
	<section class="row">
		<section class="col-md-2 dashboard-cate hide-on-med-and-down">
 		<!--	<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">Dashboard</h6>-->
			<li class="selectedItem"><a href="dashboard" class="selected"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="selectedItem"><a href="post"><i class="fa fa-eye"></i> View Post</a></li>
			<li class="selectedItem"><a href="front"><i class="fa fa-users"></i> Front Post</a></li>
			<li class="selectedItem"><a href="users"><i class="fa fa-users"></i> Users</a></a></li>
      <li class="selectedItem"><a href="gallery"><i class="fa fa-users"></i> Gallery Uploads</a></a></li>
      <li class="selectedItem"><a href="view"><i class="fa fa-eye"></i> View Gallery Images</a></a></li>

		</section>
		<section class="col-md-10">
			<h3 class="move">Dashboard</h3>
			<section class="row">
				<section class="col-md-11 left-marg">
					<canvas id="adminPostsChart" class="dashboard-chart"></canvas>
				</section>
			</section>
		</section>
	</section>
</section>


<?php include "includes/footer.php"; ?>
