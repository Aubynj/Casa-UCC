<?php include "includes/header.php"; ?>
<section class="container-fluid">
	<section class="row">
		<section class="col-md-2 dashboard-cate hide-on-med-and-down">
 		<!--	<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">Dashboard</h6>-->
    <li class="selectedItem"><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="selectedItem"><a href="post" class="selected"><i class="fa fa-eye"></i> All Post</a></li>
    <li class="selectedItem"><a href="front"><i class="fa fa-users"></i> Front Post</a></li>
    <li class="selectedItem"><a href="users"><i class="fa fa-users"></i> Users</a></a></li>
    <li class="selectedItem"><a href="gallery"><i class="fa fa-users"></i> Gallery Uploads</a></a></li>
    <li class="selectedItem"><a href="view"><i class="fa fa-eye"></i> View Gallery Images</a></a></li>
    <li class="selectedItem"><a href="executive"><i class="fa fa-address-card"></i> Executive Post</a></a></li>
    <li class="selectedItem"><a href="members-exec" ><i class="fa fa-eye"></i> View Executives</a></a></li> 
    <li class="selectedItem"><a href="postData"><i class="fa fa-address-card"></i> Page Writing</a></li>
    
		</section>
		<section class="col-md-10">
			<section class="row">
				<section class="col-md-10 left-marg">
					<section class="postItems center-text down">

					</section><br><br>
          <section class="successItems center-text down">

					</section><br><br><br>
          <h3>Sliders Viewpoint</h3>
          <section class="row sliderImages">

          </section>
				</section>
			</section>
		</section>
	</section>
<!--	<section class="fixed-action-btn justify-content-end">
		<a class="btn btn-primary btn-floating btn-lg pulse" data-target="#add-post-model" data-toggle="modal">
			<i class="fa fa-plus white"></i>
		</a>
	</section>-->

   <!-- Modal for Editing Post  -->
   <div class="modal fade" tabindex="-1" role="dialog" id="edit-post-modal">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title">Front Post</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           <form class="edit-post-submit" method="post" enctype="multipart/form-data" id="edit-post">
             <section class="row">
               <section class="col-md-4">
                 <img src="" class="image-preview" alt="edit-picture">
                 <input type="hidden" id="number" value="">
                 <input type="file" class="input-file-edit" id="edit-image-post" accept="image/*">
                 <label for="edit-image-post" class="post-item-image-label">Upload Image</label><br><br><br>
               </section>
             </section>
             <section class="row">
               <section class="col-md-4">
                 <label for="title">Post Title</label>
                 <input type="text" class="form-control postTitle"><br>
               </section>
             </section>
             <section class="row">
               <section class="col-md-4">
                 <label for="message">Post Message</label>
                 <textarea class="postMsg form-control"></textarea><br>
               </section>
             </section>
             <section class="row">
               <section class="col-md-4">
                 <button type="submit" class="btn btn-primary">Update</button>
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

    <!-- Modal for Deleting Post  -->
     <div class="modal fade" tabindex="-1" role="dialog" id="delete-post-model">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title">Delete Post</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             <form class="delete-post-submit" method="post" enctype="multipart/form-data" id="edit-post">
               <section class="row">
                 <section class="col-md-4">
                   <input type="hidden" id="number" value="">
                 </section>
               </section>
               <section class="row">
                 <section class="col-md-4">
                  <span>Are you sure you want to delete post with title: <span class="postTitle"></span></span>
                 </section>
               </section>
               <section class="row">
                 <section class="col-md-4">
                   <button type="submit" class="btn btn-primary">Yes Delete</button>
                 </section>
               </section>
             </form>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           </div>
         </div>
       </div>
     </div>


    <!--This is a modal for success editing -->
    <div class="modal fade" tabindex="-1" role="dialog" id="edit-success-modal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Success Post Editing</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="edit-success-submit" method="post" enctype="multipart/form-data" id="edit-post">
              <section class="row">
                <section class="col-md-4">
                  <img src="" class="image-preview" alt="edit-picture">
                  <input type="hidden" id="number" value="">
                  <input type="file" class="input-file-edit" id="edit-image-post" accept="image/*">
                  <label for="edit-image-post" class="post-item-image-label">Upload Image</label><br><br><br>
                </section>
              </section>
              <section class="row">
                <section class="col-md-4">
                  <label for="title">Post Title</label>
                  <input type="text" class="form-control successTitle"><br>
                </section>
              </section>
              <section class="row">
                <section class="col-md-4">
                  <label for="message">Post Message</label>
                  <textarea class="successMsg form-control"></textarea><br>
                </section>
              </section>
              <section class="row">
                <section class="col-md-4">
                  <button type="submit" class="btn btn-primary">Update</button>
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


    <!--Modal for Deleting Success POST -->
    <div class="modal fade" tabindex="-1" role="dialog" id="delete-success-model">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Delete Post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="delete-success-submit" method="post" enctype="multipart/form-data" id="edit-post">
              <section class="row">
                <section class="col-md-4">
                  <input type="hidden" id="number" value="">
                </section>
              </section>
              <section class="row">
                <section class="col-md-4">
                 <span>Are you sure you want to delete post with title: <span class="successTitle"></span></span>
                </section>
              </section>
              <section class="row">
                <section class="col-md-4">
                  <button type="submit" class="btn btn-primary">Yes Delete</button>
                </section>
              </section>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!--Edit Slider-->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="edit-slider-model">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Slider</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="edit-slider-submit" method="post" enctype="multipart/form-data" id="edit-slider">
              <section class="row galImg">
            
              </section><br><br><br>

              <section class="row">
                 <input type="hidden" id="numText" value="">
                 <input type="hidden" id="numImg" value="">
              </section>

              <section class="row">
                <section class="col-md-4">
                  <label for="title">Post Title</label>
                  <input type="text" class="form-control sliderTitle"><br>
                </section>
              </section>
              <section class="row">
                <section class="col-md-4">
                  <label for="message">Post Message</label>
                  <textarea class="sliderMsg form-control"></textarea><br>
                </section>
              </section>
              <section class="row">
                <section class="col-md-4">
                  <button type="submit" class="btn btn-primary">Update</button>
                </section>
              </section>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>



    <!--Delete Modal for slider-->
    <div class="modal fade" tabindex="-1" role="dialog" id="delete-slider-model">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Delete Slider</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="delete-slider-submit" method="post" enctype="multipart/form-data" id="delete-slider">
              <section class="row">
                <section class="col-md-4">
                  <input type="hidden" id="numText" value="">
                  <input type="hidden" id="numImg" value="">
                </section>
              </section>
              <section class="row">
                <section class="col-md-4">
                 <span>Are you sure you want to delete post with title: <b><span class="sliderTitle"></span></b></span>
                </section>
              </section>
              <section class="row">
                <section class="col-md-4">
                  <button type="submit" class="btn btn-primary">Yes Delete</button>
                </section>
              </section>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

</section>



<?php include "includes/footer.php"; ?>
