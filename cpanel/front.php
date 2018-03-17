<?php include "includes/header.php"; ?>
<section class="container-fluid">
	<section class="row">
		<section class="col-md-2 dashboard-cate hide-on-med-and-down">
 		<!--	<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">Dashboard</h6>-->
    <li class="selectedItem"><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="selectedItem"><a href="post"><i class="fa fa-eye"></i> All Post</a></li>
    <li class="selectedItem"><a href="front" class="selected"><i class="fa fa-users"></i> Page Post</a></li>
    <li class="selectedItem"><a href="users"><i class="fa fa-users"></i> Users</a></a></li>
    <li class="selectedItem"><a href="gallery"><i class="fa fa-users"></i> Gallery Uploads</a></a></li>
    <li class="selectedItem"><a href="view"><i class="fa fa-eye"></i> View Gallery Images</a></a></li>
    <li class="selectedItem"><a href="executive"><i class="fa fa-eye"></i> Executive Post</a></a></li>
    <li class="selectedItem"><a href="members-exec" ><i class="fa fa-eye"></i> View Executives</a></a></li>
    <li class="selectedItem"><a href="postData"><i class="fa fa-address-card"></i> Page Writing</a></li>
    
		</section>
		<section class="col-md-10">
			<section class="row">
        <section class="col-md-3 down wow zoomIn" data-wow-duration="0.2s" data-wow-delay="0.1s">
          <button type="button" class="btn btn-primary btn-admin" data-target="#add-post-model" data-toggle="modal">Front Post</button>
        </section>


      <section class="col-md-3 down wow zoomIn" data-wow-duration="0.2s" data-wow-delay="0.2s">
        <button type="button" class="btn btn-primary btn-admin" data-target="#add-success-model" data-toggle="modal">Success Story</button>
      </section>

      <section class="col-md-3 down wow zoomIn" data-wow-duration="0.2s" data-wow-delay="0.3s">
        <button type="button" class="btn btn-primary btn-admin">Event Post</button>
      </section>

      <section class="col-md-3 down wow zoomIn" data-wow-duration="0.2s" data-wow-delay="0.4s">
        <button type="button" class="btn btn-primary btn-admin" data-target="#add-slider-modal" data-toggle="modal">Slider Post</button>
      </section>
		</section>
	</section>

	 <!-- Modal for Front Post Items  -->
    <div class="modal fade" tabindex="-1" role="dialog" id="add-post-model">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Front Post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="post-item-submit" method="post" enctype="multipart/form-data" id="post-item">
              <section class="row">
                <section class="col-md-4">
                  <img src="../assets/img/item-img-preview.png" class="image-preview" alt="">
                  <input type="file" class="input-file" id="post-image-item" accept="image/*">
                  <label for="post-image-item" class="post-item-image-label">Upload Image</label><br><br><br>
                </section>
              </section>
              <section class="row">
                <section class="col-md-4">
                  <label for="title">Post Title</label>
                  <input type="text" class="form-control postTitle"><br>
                </section>
              </section>
              <section class="row">
                <section class="col-8">
                  <label for="message">Post Message</label>
                  <textarea class="postMsg form-control" id="message-text"></textarea><br>
                </section>
              </section>
              <section class="row">
                <section class="col-md-4">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </section>
              </section>
            </form>
          </div>
          <div class="modal-footer">
            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for Success Post Items  -->
     <div class="modal fade" tabindex="-1" role="dialog" id="add-success-model">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title">Testimonies</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             <form class="success-post-item-submit" method="post" enctype="multipart/form-data" id="success-post-item">
               <section class="row">
                 <section class="col-md-4">
                   <img src="../assets/img/item-img-preview.png" class="image-preview" alt="">
                   <input type="file" class="success-input-file" id="success-post-image-item" accept="image/*">
                   <label for="success-post-image-item" class="post-item-image-label">Upload Image</label><br><br><br>
                 </section>
               </section>
               <section class="row">
                 <section class="col-md-4">
                   <label for="title">Post Title</label>
                   <input type="text" class="form-control successPostTitle"><br>
                 </section>
               </section>
               <section class="row">
                 <section class="col-8">
                   <label for="message">Post Message</label>
                   <textarea class="successPostMsg form" rows="8" col="50"></textarea><br>
                 </section>
               </section>
               <section class="row">
                 <section class="col-md-4">
                   <button type="submit" class="btn btn-primary">Submit</button>
                 </section>
               </section>
             </form>
           </div>
           <div class="modal-footer">
             <!--<button type="button" class="btn btn-primary">Save changes</button>-->
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           </div>
         </div>
       </div>
     </div>

    <!-- Modal for Sliders-->
     <div class="modal fade" tabindex="-1" role="dialog" id="add-slider-modal">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title">Sliders Images</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             <form class="slider-item-submit" method="post" enctype="multipart/form-data" id="slider-post-item">
               <section class="row">
                 <section class="col-md-4">
                   <input type="file" class="slider-input-file" name="files[]" id="slider-post-image-item" accept="image/*" multiple>
                   <label for="slider-post-image-item" class="post-item-image-label">Upload Image</label><br><br><br>
                 </section>
               </section>
               <section class="row">
                 <section class="col-md-4">
                   <label for="title">Post Title</label>
                   <input type="text" class="form-control sliderPostTitle" id="sliderPostTitle"><br>
                 </section>
               </section>
               <section class="row">
                 <section class="col-8">
                   <label for="message">Post Message</label>
                   <textarea class="sliderPostMsg form-control" rows="8" col="50" id="sliderPostMsg"></textarea><br>
                 </section>
               </section>
               <section class="row">
                 <section class="col-md-4">
                   <button type="submit" class="btn btn-primary">Submit</button>
                 </section>
               </section>
             </form>
           </div>
           <div class="modal-footer">
             <!--<button type="button" class="btn btn-primary">Save changes</button>-->
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           </div>
         </div>
       </div>
     </div>
</section>



<?php include "includes/footer.php"; ?>
