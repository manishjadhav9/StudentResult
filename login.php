<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Result Generation System</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
  <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
  <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
  <link rel="stylesheet" href="css/prism/prism.css" media="screen">
  <link rel="stylesheet" href="css/login.css" media="screen">
  <!-- <link rel="stylesheet" href="css/index.css" media="screen"> -->
  <script src="js/modernizr/modernizr.min.js"></script>
</head>

<body class="">
  <div class="main-wrapper">
    <h1 class="title text-center">Student Result Generation System</h1>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <section class="section">
            <div class="panel">
              <div class="panel-heading">
                <div class="panel-title text-center">
                  <h4>For Students</h4>
                </div>
              </div>
              <div class="panel-body p-20">
                <div class="panel-title text-center">
                  <h4 class="sub-title">Click here to view your results</h4>
                </div>
                <form class="form-horizontal" method="post">
                  <div class="form-group">
                    <div class="panel-title text-center">
                      <p><a href="find-result.php">Search for your Results</a></p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </div>
        <div class="col-md-6">
          <section class="section">
            <div class="panel">
              <div class="panel-heading">
                <div class="panel-title text-center">
                  <h4>For Admin</h4>
                </div>
              </div>
              <div class="panel-body p-20">
                <div class="section-title">
                  <p class="sub-title text-center">Admin Login Panel</p>
                </div>
                <form class="form-horizontal" method="post">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Username</label>
                    <div class="col-sm-8">
                      <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="UserName">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">
                      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group mt-20">
                    <div class="col-sm-offset-4 col-sm-8">
                      <button type="submit" name="login" value="Login" class="btn btn-success btn-labeled pull-right">Sign in<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
  <!-- /.main-wrapper -->

  <!-- ========== COMMON JS FILES ========== -->
  <script src="js/jquery/jquery-2.2.4.min.js"></script>
  <script src="js/jquery-ui/jquery-ui.min.js"></script>
  <script src="js/bootstrap/bootstrap.min.js"></script>
  <script src="js/pace/pace.min.js"></script>
  <script src="js/lobipanel/lobipanel.min.js"></script>
  <script src="js/iscroll/iscroll.js"></script>

  <!-- ========== PAGE JS FILES ========== -->

  <!-- ========== THEME JS ========== -->
  <script src="js/main.js"></script>
  <script>
    $(function() {

    });
  </script>

  <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
</body>

</html>
