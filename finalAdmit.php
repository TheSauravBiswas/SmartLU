<?php
// include autoloader
require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
include 'config.php';
$id = $_GET['id'];
$select = " SELECT * FROM tuitionfees WHERE id = '$id' ";
$results = mysqli_query($conn, $select);
$row = mysqli_fetch_array($results);
if($row['fees']<$row['totalfee']){
    header("location:tuitionFees.php?error=Please pay you tuition fees first before downloading admit card.");
    exit;
}
$table = $row['season'].$row['year'];
$sid = $row['sid'];
$courseSelect = " SELECT * FROM $table WHERE sid = '$sid' ";
$courses = mysqli_query($conn, $courseSelect);
$invoice = substr(str_shuffle("1234567890"), 0, 6);
$html = '<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap.min.css" rel="stylesheet">

    <title>Mid-Term Admit Card</title>

    <style>
        table{
            font-family; Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th{
            border: 1px solid #444;
            padding: 4px;
            text-align: left;
        }
        p{
            padding: 1px;
            margin: 1px;
        }
        .colhead{
            text-align:center;
        }
    </style>
  </head>
  <body>
    <div class="container">
    <h1 style="text-align:center;"><b>Leading University</b></h1>
    <p style="text-align:center;font-size:13px;">ADMIT CARD</p>
    <p style="text-align:center;">Semester Final Examination '.$row['semester'].'</p>
    <p style="text-align:center;">'.$row['dept'].'</p><br>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">Student Name</th>
                <td>'.$row['name'].'</td>
            </tr>
            <tr>
                <th scope="row">Student ID</th>
                <td>'.$row['sid'].'</td>
            </tr>
        </tbody>
    </table><br>
    <table class="table table-bordered">
        <thead>
            <tr class="colhead">
                <th scope="col">Course Code</th>
                <th scope="col">Course Title</th>
                <th scope="col">Credit</th>
            </tr>
        </thead>
        <tbody>';
        while($rows = mysqli_fetch_assoc($courses)){
            $html .= '<tr>
                <td>'.$rows['ccode'].'</td>
                <td>'.$rows['ctitle'].'</td>
                <td>'.$rows['credit'].'</td>
            </tr>';
        }
        $html .= '</tbody>
    </table>
    </div>
  </body>
</html>';
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("admit_midterm.pdf", array("Attachment" => false));
exit(0);
?>
        