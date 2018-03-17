<?php include "includes/header.php"; ?>
<section class="container-fluid">
	<section class="row">
		<section class="col-md-2 dashboard-cate hide-on-med-and-down">
 		<!--	<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">Dashboard</h6>-->
    <li class="selectedItem"><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="selectedItem"><a href="post"><i class="fa fa-eye"></i> All Post</a></li>
    <li class="selectedItem"><a href="front"><i class="fa fa-users"></i> Front Post</a></li>
    <li class="selectedItem"><a href="users"><i class="fa fa-users"></i> Users</a></a></li>
    <li class="selectedItem"><a href="gallery"><i class="fa fa-users"></i> Gallery Uploads</a></a></li>
    <li class="selectedItem"><a href="view"><i class="fa fa-eye"></i> View Gallery Images</a></a></li>
    <li class="selectedItem"><a href="executive" class="selected"><i class="fa fa-address-card"></i> Executive Post</a></a></li>
    <li class="selectedItem"><a href="members-exec" ><i class="fa fa-eye"></i> View Executives</a></a></li>
    <li class="selectedItem"><a href="postData"><i class="fa fa-address-card"></i> Page Writing</a></li>

		</section>
		<section class="col-md-10">
			<section class="row">
        <section class="col-md-6" style="border-right:1px solid #ccc">
          <section class="field-section">
            <form class="president-field" method="post" enctype="multipart/form-data" id="presForm">
              <h2>President Form</h2><br>
              <label for="">President Name</label><br>
              <input type="text" id="presName" class="form-control" required><br>

              <label for="">President Position</label><br>
              <input type="text" id="presPos" class="form-control" required><br>

              <label for="">President Level</label><br>
              <input type="text" id="presLevel" class="form-control" required><br>

              <label for="">President Photo</label><br>
              <input type="file" id="presPhoto" name="files" class="form-control input-pres" accept="image/*"><br>

              <label for="">Photo Preview</label><br>
              <img src="../assets/img/item-img-preview.png" class="image-preview-pres" alt="">

              <button type="submit" class="btn btn-lg btn-primary" name="button">Add</button>
            </form>
          </section>

        </section>
        <section class="col-md-6">
          <section class="field-section">
            <form class="executive-field" method="post" enctype="multipart/form-data" id="exec-Form">
              <h2>Executive Form</h2><br>
              <label for="">Executive Name</label><br>
              <input type="text" id="execName" name="" value="" class="form-control" required><br>

              <label for="">Executive Position</label><br>
              <input type="text" id="execPos" name="" value="" class="form-control" required><br>

              <label for="">Executive Level</label><br>
              <input type="text" id="execLevel" name="" value="" class="form-control" required><br>

              <label for="">Executive Photo</label><br>
              <input type="file" id="execPhoto" name="files" value="" class="form-control input-exec"><br>

              <label for="">Photo Preview</label><br>
              <img src="../assets/img/item-img-preview.png" class="image-preview-exec" alt="">

              <button type="submit" class="btn btn-lg btn-primary" name="button">Add</button>
            </form>
          </section>
        </section>
			</section>
		</section>
	</section>





</section>



<?php include "includes/footer.php"; ?>
