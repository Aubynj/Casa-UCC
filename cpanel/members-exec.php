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
    <li class="selectedItem"><a href="executive"><i class="fa fa-address-card"></i> Executive Post</a></a></li>
    <li class="selectedItem"><a href="members-exec" class="selected"><i class="fa fa-eye"></i> View Executives</a></a></li>
    <li class="selectedItem"><a href="postData"><i class="fa fa-address-card"></i> Page Writing</a></li>

		</section>
		<section class="col-md-10">
      <section class="col-md-10 left-marg">
        <section class="row down executive">

        </section><br><br>
            <!--President Edit -->
            <div class="modal fade" tabindex="-1" role="dialog" id="edit-pres-model">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit President Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="pres-item-submit" method="post" enctype="multipart/form-data" id="pres-item">
                      <section class="row">
                        <section class="col-md-4">
                          <img  class="image-preview" alt="">
                          <input type="file" class="input-file" id="post-image-item" accept="image/*">
                          <label for="post-image-item" class="post-item-image-label">Upload Image</label><br><br><br>
                        </section>
                      </section>
                      <section class="row">
                        <section class="col-8">
                          <input type="hidden" class="form-control presId" name="">
                        </section>
                      </section>
                      <section class="row">
                        <section class="col-md-4">
                          <label for="title">President Name</label>
                          <input type="text" class="form-control presName"><br>
                        </section>
                      </section>
                      <section class="row">
                        <section class="col-8">
                          <label for="message">President Level</label>
                          <input type="text" class="form-control presLevel" name="">
                        </section>
                      </section>
                      <section class="row">
                        <section class="col-8">
                          <label for="message">President Position</label>
                          <input type="text" class="form-control presPos" name="">
                        </section>
                      </section><br>
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

            <!-- Executive Edit -->
            <div class="modal fade" tabindex="-1" role="dialog" id="edit-exec-model">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Executive Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="exec-edit-submit" method="post" enctype="multipart/form-data" id="exec-item">
                      <section class="row">
                        <section class="col-md-4">
                          <img  class="image-preview" alt="">
                          <input type="file" class="input-file" id="post-image-item" accept="image/*">
                          <label for="post-image-item" class="post-item-image-label">Upload Image</label><br><br><br>
                        </section>
                      </section>
                      <section class="row">
                        <section class="col-8">
                          <input type="hidden" class="form-control execId" name="">
                        </section>
                      </section>
                      <section class="row">
                        <section class="col-md-4">
                          <label for="title">Executive Name</label>
                          <input type="text" class="form-control execName"><br>
                        </section>
                      </section>
                      <section class="row">
                        <section class="col-8">
                          <label for="message">Executive Level</label>
                          <input type="text" class="form-control execLevel" name="">
                        </section>
                      </section>
                      <section class="row">
                        <section class="col-8">
                          <label for="message">Executive Position</label>
                          <input type="text" class="form-control execPos" name="">
                        </section>
                      </section><br>
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

            <!-- Pres Delete-->
            <div class="modal fade" tabindex="-1" role="dialog" id="delete-pres-model">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Delete President Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="pres-delete-submit" method="post" enctype="multipart/form-data" id="pres-item">
                
                      <section class="row">
                        <section class="col-8">
                          <input type="hidden" class="form-control presId" name="">
                        </section>
                      </section>
                
                      <section class="row">
                         <section class="col-md-12">
                          <span>Are you sure you want to delete post with title: <strong><span class="presTitle"></span></strong></span>
                         </section>
                       </section><br>

                      <section class="row">
                        <section class="col-md-4">
                          <button type="submit" class="btn btn-primary">Yes Delete</button>
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


            <!--Executive Delete -->
            <div class="modal fade" tabindex="-1" role="dialog" id="delete-exec-model">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Delete President Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="exec-delete-submit" method="post" enctype="multipart/form-data" id="exec-item">
                
                      <section class="row">
                        <section class="col-8">
                          <input type="hidden" class="form-control execId" name="">
                        </section>
                      </section>
                
                      <section class="row">
                         <section class="col-md-12">
                          <span>Are you sure you want to delete post with title: <strong><span class="execTitle"></span></strong></span>
                         </section>
                       </section><br>

                      <section class="row">
                        <section class="col-md-4">
                          <button type="submit" class="btn btn-primary">Yes Delete</button>
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
		</section>
	</section>





</section>



<?php include "includes/footer.php"; ?>
