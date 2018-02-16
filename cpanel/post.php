<?php include "includes/header.php"; ?>
<section class="container-fluid">
	<section class="row">
		<section class="col-md-2 dashboard-cate">
 		<!--	<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">Dashboard</h6>-->
			<li class="selectedItem"><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="selectedItem"><a href="post" class="selected"><i class="fa fa-eye"></i> View Post</a></li>
			<li class="selectedItem"><a href="users"><i class="fa fa-users"></i> Users</a></li>
			<li class="selectedItem"><a href=""></a></li>

		</section>
		<section class="col-md-10">
			<section class="row">

				<section class="col-md-11 left-marg">
					<section class="postItems center-text down">
						
					</section>
				</section>
			</section>
		</section>
	</section>
	<section class="fixed-action-btn justify-content-end">
		<a class="btn btn-primary btn-floating btn-lg pulse" data-target="#add-post-model" data-toggle="modal">
			<i class="fa fa-plus white"></i>
		</a>
	</section>

	 <!-- Modal for Post Items  -->
    <div class="modal fade" tabindex="-1" role="dialog" id="add-post-model">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Publish</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="" method="post" enctype="multipart/form-data">
            	
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


</section>



<?php include "includes/footer.php"; ?>