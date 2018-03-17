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
    <li class="selectedItem"><a href="view"><i class="fa fa-eye"></i> View Gallery Images</a></a></li>
    <li class="selectedItem"><a href="executive"><i class="fa fa-eye"></i> Executive Post</a></a></li>
    <li class="selectedItem"><a href="members-exec" ><i class="fa fa-eye"></i> View Executives</a></a></li>
    <li class="selectedItem"><a href="postData"><i class="fa fa-address-card"></i> Page Writing</a></li>
    
		</section>
		<section class="col-md-10">
			<section class="row">
        <section class="galleryDiv">
          <section class="col-md-6 down wow zoomIn" data-wow-duration="0.2s" data-wow-delay="0.1s">
            <form class="multiImage" method="post" enctype="multipart/form-data" id="multi-image">
              <section class="row">
                <label for="subject">Gallery Heading</label>
                <input type="text" name="subject" id="subject" class="form-control" value="">
              </section>

                <section class="row">
                  <input type="file" name="files[]" class="multi-file"  id="multi-file" accept="image/*" multiple />
                </section>

                <section class="row">
                <label for="multi-file" class="multi-image-label" style="margin: 0px">Upload Image</label><br><br><br><br/>
              </section><br><br>

              <section class="row">
                 <button type="submit" class="btn btn-primary" name="button">Submit</button>
              </section>
            </form>
          </section>
        </section>
			</section>
		</section>
	</section>





</section>



<?php include "includes/footer.php"; ?>
