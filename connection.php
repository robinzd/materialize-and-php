<?php


$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$dbhost =$cleardb_url["host"];
$dbuser =$cleardb_url["user"];
$dbpass = $cleardb_url["pass"];
$dbname =substr($cleardb_url["path"],1);

$active_group = 'default';
$query_builder = TRUE;




if(!$con= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))

{

    die("failed to connect!");
}