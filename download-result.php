<?php
session_start();
require_once('includes/configpdo.php');
require "dompdf/autoload.inc.php";

use Dompdf\Dompdf;

ob_start();
//error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Result</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
    }

    h1 {
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th,
    td {
      border: 1px solid #000;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }

    .total {
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Student Result</h1>
    <?php
    $totlcount = 0;
    $rollid = $_SESSION['rollid'];
    $classid = $_SESSION['classid'];
    $qery = "SELECT tblstudents.StudentName,tblstudents.RollId,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status,tblclasses.YearName,tblclasses.Department from tblstudents join tblclasses on tblclasses.id=tblstudents.YearId where tblstudents.RollId=? and tblstudents.YearId=?";
    $stmt21 = $mysqli->prepare($qery);
    $stmt21->bind_param("ss", $rollid, $classid);
    $stmt21->execute();
    $res1 = $stmt21->get_result();
    $cnt = 1;

    while ($result = $res1->fetch_object()) {
      $filename = str_replace(" ", "_", $result->StudentName) . "_" . $result->RollId . "_" . time();  ?>
      <p><b>Student Name :</b> <?php echo htmlentities($result->StudentName); ?></p>
      <p><b>Student Roll Id :</b> <?php echo htmlentities($result->RollId); ?>
      <p><b>Student Class:</b> <?php echo htmlentities($result->YearName); ?>(<?php echo htmlentities($result->Department); ?>)
      <?php }
      ?>
      <table class="table table-inverse" border="1">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Subject</th>
              <th>Marks</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Code for result
            $query = "select t.StudentName,t.RollId,t.YearId,t.marks,SubjectId,tblsubjects.SubjectName from (select sts.StudentName,sts.RollId,sts.YearId,tr.marks,SubjectId from tblstudents as sts join  tblresult as tr on tr.StudentId=sts.StudentId) as t join tblsubjects on tblsubjects.id=t.SubjectId where (t.RollId=? and t.YearId=?)";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("ss", $rollid, $classid);
            $stmt->execute();
            $res = $stmt->get_result();
            $cnt = 1;
            while ($row = $res->fetch_object()) {
            ?>
              <tr>
                <td><?php echo htmlentities($cnt); ?></td>
                <td><?php echo htmlentities($row->SubjectName); ?></td>
                <td><?php echo htmlentities($totalmarks = $row->marks); ?></td>
              </tr>
            <?php
              $totlcount += $totalmarks;
              $cnt++;
            }
            ?>
            <tr>
              <th colspan="2">Total Marks</th>
              <td class="total"><?php echo htmlentities($totlcount); ?> out of <?php echo htmlentities($outof = ($cnt - 1) * 100); ?></td>
            </tr>
            <tr>
              <th colspan="2">Percentage</th>
              <td class="total"><?php echo htmlentities($totlcount * 100 / $outof); ?>%</td>
            </tr>
          </tbody>
        </table>
  </div>
</body>

</html>
<?php
$html = ob_get_clean();
$dompdf = new dompdf();
$dompdf->set_option('enable_html5_parser', TRUE);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($filename);
?>