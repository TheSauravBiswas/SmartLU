<?php
// include autoloader
require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
include 'config.php';
$id = 8;
$select = " SELECT * FROM supplement WHERE id = '$id' ";
$results = mysqli_query($conn, $select);
$row = mysqli_fetch_array($results);
$html = '<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap.min.css" rel="stylesheet">

    <title>Supplementary Admit Card</title>

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
    <p style="text-align:center;font-size:13px;">ADMIT CARD FOR SUPPLEMENTARY EXAMINATIONS</p>
    <p style="text-align:center;">'.$row['semester'].'</p><br>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">Student Name</th>
                <td>'.$row['name'].'</td>
                <th scope="row">Student ID</th>
                <td>'.$row['sid'].'</td>
            </tr>
            <tr>
                <th scope="row">Department</th>
                <td>'.$row['dept'].'</td>
                <th scope="row">Program</th>
                <td>'.$row['program'].'</td>
            </tr>
            <tr>
                <th scope="row">Total Completed Credit</th>
                <td>'.$row['completecr'].'</td>
                <th scope="row">Total Credit taken in current Semester</th>
                <td>'.$row['totalcr'].'</td>
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
        for($i=1; $i<5; $i++){
            if($row['ctitle'.$i]=="none"){
                continue;
            }
            $html .= '<tr>
                <td>'.$row['ccode'.$i].'</td>
                <td>'.$row['ctitle'.$i].'</td>
                <td>'.$row['cr'.$i].'</td>
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
$dompdf->stream("admit_supple.pdf", array("Attachment" => false));
exit(0);
?>
