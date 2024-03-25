<?php
// include autoloader
require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
include 'config.php';
$id = $_GET['id'];
$select = " SELECT * FROM makeup WHERE id = '$id' ";
$results = mysqli_query($conn, $select);
$row = mysqli_fetch_array($results);
if($row['exam']=="Mid-Term" && $row['fees']<2000){
    header("location:makeupStatus.php?error=Payment of Semester Mid-Term Makeup Examinations fees is incomplete!");
    exit;
}elseif($row['exam']=="Final" && $row['fees']<3000){
    header("location:makeupStatus.php?error=Payment of Semester Final Makeup Examinations fees is incomplete!");
    exit;
}
$html = '<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap.min.css" rel="stylesheet">

    <title>Makeup Admit Card</title>

    <style>
        h2{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            text-align; center;
        }
        table{
            font-family; Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th{
            border: 1px solid #444;
            padding: 8px;
        }
    </style>
  </head>
  <body>
    <div class="container">
    <h1 class="mt-5" style="text-align:center;">Leading University</h1>
    <p style="text-align:center;">Admit Card For Make-up Examination</p>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">Student ID</th>
                <td>'.$row['sid'].'</td>
                <th scope="row">Student Name</th>
                <td>'.$row['name'].'</td>
            </tr>
            <tr>
                <th scope="row">Date</th>
                <td>'.$row['date'].'</td>
                <th scope="row">Time</th>
                <td>'.$row['time'].'</td>
            </tr>
            <tr>
                <th scope="row">Course Teacher</th>
                <td colspan="3">'.$row['cteacher'].'</td>
            </tr>
            <tr>
                <th scope="row">Course Code</th>
                <td>'.$row['ccode'].'</td>
                <th scope="row">Course Title</th>
                <td>'.$row['ctitle'].'</td>
            </tr>
            <tr>
                <th scope="row">Semester</th>
                <td>'.$row['semester'].'</td>
                <th scope="row">Exam</th>
                <td>'.$row['exam'].'</td>
            </tr>
        </tbody>
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
$dompdf->stream("admit_makeup.pdf", array("Attachment" => false));
exit(0);
?>

<!--doctype html http://localhost/SmartLU/makeupAdmit.php >
<html>
    <head-->
        