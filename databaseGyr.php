<?php

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
#$accX = json_decode($_GET['acc']);

//Accelerometer
$x = $_GET['accX'];
$y = $_GET['accY'];
$z = $_GET['accZ'];
//GyroscopeAcc
$alphaAcc = $_GET['alphaAcc'];
$betaAcc = $_GET['betaAcc'];
$gammaAcc = $_GET['gammaAcc'];
//GyroscopeOri
$alphaOri = $_GET['alphaOri'];
$betaOri = $_GET['betaOri'];
$gammaOri = $_GET['gammaOri'];
//Name
$fName = $_GET['fName'];
$time_data = $_GET['time'];
$pos = $_GET['position'];
# Now let's use the connection for something silly just to prove it works:
//$result = pg_query($pg_conn, "INSERT INTO accelerometer (x, y, z) VALUES ('$acc[0]','$acc[1]','$acc[2]')");
//print $fName;
$query = "INSERT INTO sensors(acc_x, acc_y, acc_z, gry_x, gry_y, gry_z, gry_g_x, gry_g_y, gry_g_z, user_id, time_data, pos ) VALUES($x, $y, $z, $alphaAcc, $betaAcc, $gammaAcc, $alphaOri, $betaOri, $gammaOri, '$fName', $time_data, $pos)";
$result = pg_query($pg_conn, $query);
if (!$result) {
    $errormessage = pg_last_error();
    echo "Error with query: " . $errormessage;
    print "<h2>SENSOR ERROR</h2>";
    exit();
}
else{
    print "<h2>No error</h2>";
}

?>