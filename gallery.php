<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">

    <title>Gallery</title>
  </head>
  <body>
    <div class="wait-loading"></div>
    <section class="nav-container">
      <header class="blog-header py-3">
        <section class="row flex-nowrap justify-content-between align-items-center">
          <section class="col-4 pt-1">
            <a href="#" class="navbar-brand logo-brand"><span class="single">C</span>ASA-<span class="single">U</span>CC <br><span class="vision">with vision </span></a>

          </section>
          <section class="col-4 text-center">

          </section>
          <section class="col-4 d-flex justify-content-end">

            <button class="navbar-toggler hide-on-large-only bar" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="fa fa-bars"></span>
          </button>
          </section>
        </section>
      </header>

      <!-- Draggable Menu  -->
      <section class="side-div hide-on-large-only" id="sideNav">
        <br>
        <a href="javascript:void(0)" class="closeSide"><span class="fa fa-close"></span></a>
        <section class="logo-pic-div">
          <img src="assets/img/sect.jpg" class="navbar-brand side-div-img" alt="Logo">
          <span class="side-logo"><span class="single">C</span>ASA-<span class="single">U</span>CC</span>
        </section>
          <ul class="side-div-list">
            <li><a href="index"class="fa fa-home"> Home</a></li>
            <li><a href="#">People</a></li>
            <li><a href="#">Executives</a></li>
            <li><a href="#">Wings/Department</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Singers</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">FAQ</a></li>
          </ul>
      </section>

      <section class="py-1 mb-2 hide-on-med-and-down">
        <nav class="myNav">
          <ul class="menu-list">
            <li><a href="index">Home</a></li>
            <li><a href="#">People</a></li>
            <li><a class="dropdown-toggle" href="javascript:void(0)" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Executives</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="#">Prayer Family</a>
                <a class="dropdown-item" href="#">Bible Studies Department</a>
                <a class="dropdown-item" href="#">Evangelism Department</a>
                <a class="dropdown-item" href="#">Ladies Department</a>
                <a class="dropdown-item" href="#">Organising Department</a>
                <a class="dropdown-item" href="#">Media and Publicity Department</a>
                <a class="dropdown-item" href="#">Drama and Choreography Department</a>
              </div>
            </li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Singers</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">FAQ</a></li>
          </ul>
        </nav>
      </section>
    </section>

    <section class="container-fluid">
      <section class="divider">
      <strong>Gallery Images</strong>
        <section class="divider1">
        </section>
      </section>
      <section class="row gallery_res">

      </section>

      <section class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modal">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
          <span aria-hidden="true">&times;</span>
        </button>

        <div class="modal-content">
          <img src="" alt="" id="galleryImg">
          <h4>Hey</h4>
        </div>
      </section>
    </section>



    <!--This is where the footer scripts can be found-->

    <footer class="container-fluid bg-light footer-row">
      <section class="row">
        <section class="col-md-4">
        </section>
        <section class="col-md-4">
            <h4 class="text-center"> Hear from us by a regular mail</h4><br>
            <section class="footer-mail">
              <input type="text" name="" class="form-control" placeholder="Email Address">
              <button type="button" class="btn btn-outline-success" name="button">Send</button>
            </section>
        </section>
        <section class="col-md-4">
        </section>
      </section>
      <br><br><br>
      <section class="row">
        <section class="col-6 col-md">
          <ul class="text-center footer-list">
            <li>SOme Link</li>
            <li>SOme link</li>
            <li>Some link</li>
            <li>Some link</li>
          </ul>
        </section>
        <section class="col-6 col-md">
          <ul class="text-center footer-list">
            <li>SOme Link</li>
            <li>SOme link</li>
            <li>Some link</li>
            <li>Some link</li>
          </ul>
        </section>
        <section class="col-6 col-md">
          <section class="footer-box">
            <ul class=" footer-list">
              <li><a href=""><i class="fa fa-facebook"></i>Facebook</a></li>
              <li><a href=""><i class="fa fa-twitter"></i>Twitter</a></li>
              <li><a href=""><i class="fa fa-instagram"></i>Instagram</a></li>
              <li><a href="#!"><i class="fa fa-linkedin"></i>LinkedIn</a></li>
            </ul>
          </section>
        </section>

  			<section class="col-md-12">
  				<hr>
  				<h6 class="text-center">CASA UCC &copy;<?php echo date('Y')?></h6>
  			</section>
  		</section>
  	</footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/modenizer.min.js"></script>
    <script text="text/javascript" src="assets/js/wow.min.js"></script>
    <script text="text/javascript" src="assets/js/init.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="assets/js/controller.js"></script>
    <script type="text/javascript" src="assets/js/frontEndControllers.js"></script>
  </body>
</html>
