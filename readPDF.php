<?php

//$docp = "files/makeup/1932020001Spring-2024Mid-TermCSE-2234.pdf";
$docp = $_GET['docp'];
$pdffile = $docp;
$pdffilename = $docp;

header('Content-type: application/pdf');
header('Content-Desposition:inline;filename="'.$pdffilename.'"');
header("Content-Transfer-Encoding:binary");
header('Accept-Range:bytes');
@readfile($pdffile);
?>