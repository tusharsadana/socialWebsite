<?php
ob_start(); //Turns on output buffering
session_start();

$timezone = date_default_timezone_set("Indian/Maldives");
$con = mysqli_connect("localhost", "root", "", "social"); //connection variable

if(mysqli_connect_errno())
{
    echo "failed to connect" . mysqli_connect_errno();
}

?> 
