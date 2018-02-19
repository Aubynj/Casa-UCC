<?php include "includes/header.php"; ?>
<section class="container-fluid">
	<section class="row">
		<section class="col-md-2 dashboard-cate hide-on-med-and-down">
 		<!--	<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">Dashboard</h6>-->
    <li class="selectedItem"><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="selectedItem"><a href="post"><i class="fa fa-eye"></i> All Post</a></li>
    <li class="selectedItem"><a href="front"><i class="fa fa-users"></i> Front Post</a></li>
    <li class="selectedItem"><a href="users"><i class="fa fa-users"></i> Users</a></a></li>
    <li class="selectedItem"><a href="gallery" class="selected"><i class="fa fa-users"></i> Gallery Uploads</a></a></li>

		</section>
		<section class="col-md-10">
			<section class="row">
        <section class="col-md-3 down wow zoomIn" data-wow-duration="0.2s" data-wow-delay="0.1s">
          <form class="multiImage" method="post" enctype="multipart/form-data">
            <section class="row">
              <label for="subject">Gallery Heading</label>
              <input type="text" name="subject" id="subject" class="form-control" value="">
            </section>

            <section class="row">
              <section>
                <input type="file" name="files[]" class="multi-file"  id="multi-file" accept="image/*" multiple><br><br>
              </section>

              <label for="multi-file" class="multi-image-label">Upload Image</label><br><br><br><br/>
              <button type="submit" class="btn btn-primary" name="button">Submit</button>
            </section>
          </form>
        </section>
			</section>
		</section>
	</section>





</section>



<?php include "includes/footer.php"; ?>
