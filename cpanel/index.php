<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style_ad.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

    <title>Administrator | Panel </title>
  </head>
  <body>
    <nav class="navbar bg-light">
      <a href="#" class="navbar-brand">CASA</a>

    </nav>
    <section class="dropdownLoader">
      <i class="fa fa-check icon-success"></i>
      <i class="fa fa-warning icon-error"></i>
      <img src="../assets/img/dropdown-loader.gif" class="dropdown-loader">
      <span class="dropdown-text"><b></b></span>
    </section>

    <section class="container">
      <section class="row">
        <section class="col-md-4">

        </section>
        <section class="col-md-4 form-field" >
          <form class="form-field admin-form" method="post" accept-charset="utf-8">
            <h3 class="center-text">Please sign in</h3>
            <div class="form-group">
              <input type="text" name="username" class="form-control form-input" id="username" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control form-input" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary btn-custom" name="action">Sign in</button><br><br>
            <p class="center-text admin-login-response"></p>
          </form>
        </section>
        <section class="col-md-4">

        </section>
      </section>

    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/controller-ad.js"></script>
  </body>
</html>
