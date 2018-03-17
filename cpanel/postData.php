<?php include "includes/header.php"; ?>
<section class="container-fluid">
	<section class="row">
		<section class="col-md-2 dashboard-cate hide-on-med-and-down">
            <li class="selectedItem"><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="selectedItem"><a href="post"><i class="fa fa-eye"></i> All Post</a></li>
            <li class="selectedItem"><a href="front"><i class="fa fa-users"></i> Front Post</a></li>
            <li class="selectedItem"><a href="users"><i class="fa fa-users"></i> Users</a></li>
            <li class="selectedItem"><a href="gallery"><i class="fa fa-users"></i> Gallery Uploads</a></li>
            <li class="selectedItem"><a href="view"><i class="fa fa-eye"></i> View Gallery Images</a></li>
            <li class="selectedItem"><a href="executive"><i class="fa fa-address-card"></i> Executive Post</a></li>
            <li class="selectedItem"><a href="members-exec" ><i class="fa fa-eye"></i> View Executives</a></li>
            <li class="selectedItem"><a href="postData" class="selected"><i class="fa fa-address-card"></i> Page Writing</a></li>

		</section>
		<section class="col-md-10">
			<section class="row" ng-app="ck" ng-controller="ckController">
                <section class="col-md-6" style="border-right:1px solid #ccc">
                    <section class="form-data-field">
                        <h2>Page Preview</h2>
                        <p ng-bind-html="myData" class="previewBody"></p>
                    </section>
                </section>
                <section class="col-md-6">
                    <section class="form-data-field">
                        <h2>Post Large Content here</h2>
                        <form class="form-ck" method="post">
                         <input type="hidden" id="id">
                         <textarea ck-editor id="postMsg" class="plugEditor" ng-model="myData" rows="100" cols="100"></textarea> 

                         <button type="submit" class="btn btn-primary">Post</button>
                        </form>

                        <br>
                        <div>
                           Status:&nbsp;&nbsp;<span class="status"></span> 
                        </div>
                    </section>
                </section>
			</section>
		</section>
   



<?php include "includes/footer-inc.php"; ?>
