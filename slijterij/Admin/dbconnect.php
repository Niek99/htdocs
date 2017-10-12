<?php
$servername = "127.0.0.1";
$username ="root";
$password="";
$database="slijterij";

//connectie maken
$con = mysqli_connect("127.0.0.1", "root", "", "slijterij")
or die ("Error " . mysqli_error($con));
