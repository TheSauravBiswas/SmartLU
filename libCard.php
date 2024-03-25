<?php
// include autoloader
require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
include 'config.php';
$sid = $_GET['sid'];
$select = " SELECT * FROM login WHERE uid = '$sid' ";
$results = mysqli_query($conn, $select);
$row = mysqli_fetch_array($results);
$html = '<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap.min.css" rel="stylesheet">

    <title>Library Card</title>

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
            text-align: left;
        }
    </style>
  </head>
  <body>
    <div class="container">
    <h1 class="mt-5" style="text-align:center;">Rabeya Khatun Chowdhury Central Library</h1>
    <p style="text-align:center;">Library Card</p>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">Student Name</th>
                <td>'.$row['name'].'</td>
            </tr>
            <tr>
                <th scope="row">Student ID</th>
                <td>'.$row['uid'].'</td>
            </tr>
            <tr>
                <th scope="row">Program</th>
                <td>'.$row['batch'].'</td>
            </tr>
            <tr>
                <th scope="row">Department</th>
                <td>'.$row['dept'].'</td>
            </tr>
            <tr>
                <th scope="row">Program</th>
                <td>'.$row['program'].'</td>
            </tr>
            <tr>
                <th scope="row">Valid Until</th>
                <td>'.$row['validity'].'</td>
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
$dompdf->stream("library_card.pdf", array("Attachment" => false));
exit(0);
?>

<!--doctype html http://localhost/SmartLU/makeupAdmit.php >
<html>
    <head-->
        