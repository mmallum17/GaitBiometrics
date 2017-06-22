<?php
//$uniqid()
header( 'Location: /LayoutApp/Instructions.html' ) ;
function pg_connection_string_from_database_url() {
    $user = "fnfgduxoqaonjm";
    $pass = "3a5ef4d082610ea1f9f88d557ae503cb2cb7d5dd5eb97f5c9c0c23a7c0ddf15a";
    $host = "ec2-23-21-220-48.compute-1.amazonaws.com";
    $dbname = "d5vthvev6u48e9";
    extract(parse_url($_ENV["DATABASE_URL"]));
    return "user=$user password=$pass host=$host dbname=$dbname"; # <- you may want to add sslmode=require there too
}

# Here we establish the connection. Yes, that's all.
$pg_conn = pg_connect(pg_connection_string_from_database_url());

$age = $_POST["Age"];
$weight = $_POST["Weight"];
$height = $_POST["Height"];
$gender = $_POST["gender"];
$cname = $_POST["UserName"];

//print $name . " " . $age . " " . $weight . " " . $height . " " . $gender;

$query = "INSERT INTO user_info(age, weight, height, gender,user_name) VALUES($age, $weight, $height, '$gender','$cname')";
$result = pg_query($pg_conn, $query);
if (!$result) {
    $errormessage = pg_last_error();
    echo "Error with query: " . $errormessage;
    exit();
}
?>