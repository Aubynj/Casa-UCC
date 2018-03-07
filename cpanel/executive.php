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

		</section>
		<section class="col-md-10">
			<section class="row">
        <section class="col-md-6" style="border-right:1px solid #ccc">
          <section class="field-section">
            <form class="president-field" method="post">
              <h2>President Form</h2><br>
              <label for="">President Name</label><br>
              <input type="text" id="presName" class="form-control" required><br>

              <label for="">President Position</label><br>
              <input type="text" id="presPos" class="form-control" required><br>

              <label for="">President Level</label><br>
              <input type="text" id="presLevel" class="form-control" required><br>

              <label for="">President Photo</label><br>
              <input type="file" id="presPhoto" name="file" class="form-control" required accept="image/*"><br>

              <label for="">Photo Preview</label><br>
              <img src="../assets/img/item-img-preview.png" class="image-preview" alt="">

              <button type="submit" class="btn btn-lg btn-primary" name="button">Add</button>
            </form>
          </section>

        </section>
        <section class="col-md-6">
          <section class="field-section">
            <form class="executive-field" method="post">
              <h2>Executive Form</h2><br>
              <label for="">Executive Name</label><br>
              <input type="text" name="" value="" class="form-control" require><br>

              <label for="">Executive Position</label><br>
              <input type="text" name="" value="" class="form-control"><br>

              <label for="">Executive Level</label><br>
              <input type="text" name="" value="" class="form-control"><br>

              <label for="">Executive Photo</label><br>
              <input type="file" name="" value="" class="form-control"><br>

              <label for="">Photo Preview</label><br>
              <img src="../assets/img/item-img-preview.png" class="image-preview" alt="">

              <button type="submit" class="btn btn-lg btn-primary" name="button">Add</button>
            </form>
          </section>
        </section>
			</section>
		</section>
	</section>





</section>



<?php include "includes/footer.php"; ?>
