<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == "") {
  header("Location: login.php");
} else {
  if (isset($_POST['update'])) {
    $yearname = $_POST['yearname'];
    $yearnamenumeric = $_POST['yearnamenumeric'];
    $department = $_POST['department'];
    $cid = intval($_GET['classid']);
    $sql = "UPDATE tblclasses SET YearName=:yearname, YearNameNumeric=:yearnamenumeric, Department=:department WHERE id=:cid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':yearname', $yearname, PDO::PARAM_STR);
    $query->bindParam(':yearnamenumeric', $yearnamenumeric, PDO::PARAM_STR);
    $query->bindParam(':department', $department, PDO::PARAM_STR); // Fixed variable name
    $query->bindParam(':cid', $cid, PDO::PARAM_INT); // Changed PARAM_STR to PARAM_INT
    $query->execute();
    $msg = "Data has been updated successfully";
  }
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SRGS Admin Update Class</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/select2/select2.min.css">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
  </head>

  <body class="top-navbar-fixed">
    <div class="main-wrapper">

      <!-- ========== TOP NAVBAR ========== -->
      <?php include('includes/topbar.php'); ?>
      <!-----End Top bar>
            ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
      <div class="content-wrapper">
        <div class="content-container">

          <!-- ========== LEFT SIDEBAR ========== -->
          <?php include('includes/leftbar.php'); ?>
          <!-- /.left-sidebar -->

          <div class="main-page">
            <div class="container-fluid">
              <div class="row page-title-div">
                <div class="col-md-6">
                  <h2 class="title">Update Student Class</h2>
                </div>

              </div>
              <!-- /.row -->
              <div class="row breadcrumb-div">
                <div class="col-md-6">
                  <ul class="breadcrumb">
                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#">Classes</a></li>
                    <li class="active">Update Class</li>
                  </ul>
                </div>

              </div>
              <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading">
                      <div class="panel-title">
                        <h5>Update Student Class info</h5>
                      </div>
                    </div>
                    <div class="panel-body">
                      <?php if ($msg) { ?>
                        <div class="alert alert-success left-icon-alert" role="alert">
                          <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                        </div><?php } else if ($error) { ?>
                        <div class="alert alert-danger left-icon-alert" role="alert">
                          <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                        </div>
                      <?php } ?>
                      <form class="form-horizontal" method="post">

                        <?php
                        $cid = intval($_GET['classid']);
                        $sql = "SELECT * from tblclasses where id=:cid";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':cid', $cid, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                          foreach ($results as $result) {   ?>

                            <div class="form-group has-success">
                              <label for="success" class="col-sm-2 control-label">Year Name</label>
                              <div class="col-sm-10">
                                <input type="text" name="yearname" value="<?php echo htmlentities($result->YearName); ?>" required="required" class="form-control" id="success">
                                <span class="help-block">Eg- First Year, Second Year, etc</span>
                              </div>
                            </div>
                            <div class="form-group has-success">
                              <label for="success" class="col-sm-2 control-label">Year Name in Numeric</label>
                              <div class="col-sm-10">
                                <input type="number" name="yearnamenumeric" value="<?php echo htmlentities($result->YearNameNumeric); ?>" required="required" class="form-control" id="success">
                                <span class="help-block">Eg- 1,2,3</span>
                              </div>
                            </div>
                            <div class="form-group has-success">
                              <label for="success" class="col-sm-2 control-label">Department</label>
                              <div class="col-sm-10">
                                <input type="text" name="department" value="<?php echo htmlentities($result->Department); ?>" class="form-control" required="required" id="success">
                                <span class="help-block">Eg- Information Technology, etc</span>
                              </div>
                            </div>
                        <?php }
                        } ?>
                        <div class="form-group has-success">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="update" value="update" class="btn btn-primary">Update<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col-md-8 col-md-offset-2 -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
          <!-- /.section -->
        </div>
        <!-- /.main-page -->
        <!-- /.right-sidebar -->
      </div>
      <!-- /.content-container -->
    </div>
    <!-- /.content-wrapper -->
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
    <script src="js/prism/prism.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>
    <script>
      $(function($) {
        $(".js-states").select2();
        $(".js-states-limit").select2({
          maximumSelectionLength: 2
        });
        $(".js-states-hide").select2({
          minimumResultsForSearch: Infinity
        });
      });
    </script>
  </body>

  </html>
<?php  } ?>