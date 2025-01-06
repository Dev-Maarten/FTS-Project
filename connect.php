<?php
$host="localhost";
$users="root";
$password="";
$db="";
$_conn=new mysqli($host,$users,$password,$db);

if($_conn->connect_error){
    echo "error connecting";
}


