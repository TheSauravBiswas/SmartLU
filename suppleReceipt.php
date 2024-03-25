<?php
// include autoloader
require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
include 'config.php';
$id = $_GET['id'];
$select = " SELECT * FROM supplement WHERE id = '$id' ";
$results = mysqli_query($conn, $select);
$row = mysqli_fetch_array($results);
$invoice = substr(str_shuffle("1234567890"), 0, 6);
$html = '<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap.min.css" rel="stylesheet">

    <title>Supplementary Receipt</title>

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
        hr {
            border: 1px dashed black;
            border-style: none none dashed; 
            color: #fff; 
            background-color: #fff;
            padding-top: 4px;
            padding-bottom: 4px;
        }
    </style>
  </head>
  <body>
    <div class="container">
    <p style="text-align:right;">Invoice: <strong>'.$invoice.'</strong></p>
    <div style="text-align:center;>
    <h1 style="text-align:center;"><b>Leading University</b></h1>
    <p style="text-align:center;font-size:13px;">ADVICE FOR DEPOSIT ON ACCOUNT OF TUITION & OTHER FEES</p>
    <p style="display:inline-block;color:white;background-color:blue;padding:5px;" class="copy"><b>Student Copy</b></p>
    <p style="text-align:center;">Account No. <strong>1008002026087</strong></p>
    <p style="text-align:center;"><b>National Bank Ltd. Laldighirpar Branch, Sylhet</b></p>
    </div>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">Student Name</th>
                <td>'.$row['name'].'</td>
            </tr>
            <tr>
                <th scope="row">Program</th>
                <td>'.$row['program'].'</td>
            </tr>
            <tr>
                <th scope="row">Semester</th>
                <td>'.$row['semester'].'</td>
            </tr>
            <tr>
                <th scope="row">Student ID</th>
                <td>'.$row['sid'].'</td>
            </tr>
            <tr>
                <th scope="row">Supplementary Examinations Fee</th>
                <td>'.$row['totalfee'].' TK</td>
            </tr>
            <tr>
                <th scope="row">Total Amount Payable</th>
                <td>'.$row['totalfee'].' TK</td>
            </tr>
        </tbody>
    </table>
    </div>
    <hr>
    <div class="container">
    <p style="text-align:right;">Invoice: <strong>'.$invoice.'</strong></p>
    <div style="text-align:center;>
    <h1 style="text-align:center;"><b>Leading University</b></h1>
    <p style="text-align:center;font-size:13px;">ADVICE FOR DEPOSIT ON ACCOUNT OF TUITION & OTHER FEES</p>
    <p style="display:inline-block;color:white;background-color:blue;padding:5px;" class="copy"><b>University (Accounts) Copy</b></p>
    <p style="text-align:center;">Account No. <strong>1008002026087</strong></p>
    <p style="text-align:center;"><b>National Bank Ltd. Laldighirpar Branch, Sylhet</b></p>
    </div>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">Student Name</th>
                <td>'.$row['name'].'</td>
            </tr>
            <tr>
                <th scope="row">Program</th>
                <td>'.$row['program'].'</td>
            </tr>
            <tr>
                <th scope="row">Semester</th>
                <td>'.$row['semester'].'</td>
            </tr>
            <tr>
                <th scope="row">Student ID</th>
                <td>'.$row['sid'].'</td>
            </tr>
            <tr>
                <th scope="row">Supplementary Examinations Fee</th>
                <td>'.$row['totalfee'].' TK</td>
            </tr>
            <tr>
                <th scope="row">Total Amount Payable</th>
                <td>'.$row['totalfee'].' TK</td>
            </tr>
        </tbody>
    </table>
    </div>
    <hr>
    <div class="container">
    <p style="text-align:right;">Invoice: <strong>'.$invoice.'</strong></p>
    <div style="text-align:center;>
    <h1 style="text-align:center;"><b>Leading University</b></h1>
    <p style="text-align:center;font-size:13px;">ADVICE FOR DEPOSIT ON ACCOUNT OF TUITION & OTHER FEES</p>
    <p style="display:inline-block;color:white;background-color:blue;padding:5px;" class="copy"><b>Bank Copy</b></p>
    <p style="text-align:center;">Account No. <strong>1008002026087</strong></p>
    <p style="text-align:center;"><b>National Bank Ltd. Laldighirpar Branch, Sylhet</b></p>
    </div>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">Student Name</th>
                <td>'.$row['name'].'</td>
            </tr>
            <tr>
                <th scope="row">Program</th>
                <td>'.$row['program'].'</td>
            </tr>
            <tr>
                <th scope="row">Semester</th>
                <td>'.$row['semester'].'</td>
            </tr>
            <tr>
                <th scope="row">Student ID</th>
                <td>'.$row['sid'].'</td>
            </tr>
            <tr>
                <th scope="row">Supplementary Examinations Fee</th>
                <td>'.$row['totalfee'].' TK</td>
            </tr>
            <tr>
                <th scope="row">Total Amount Payable</th>
                <td>'.$row['totalfee'].' TK</td>
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
$dompdf->stream("supple_fees.pdf", array("Attachment" => false));
exit(0);
?>