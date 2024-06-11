<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "project_akhir";

$con = mysqli_connect("$host","$username","$password","$database");

if(!$con)
{
    header("Location: ../dberor/dberor.php");
    die();
}


?>