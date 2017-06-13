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
# Now let's use the connection for something silly just to prove it works:
//$result = pg_query($pg_conn, "INSERT INTO accelerometer (x, y, z) VALUES ('$acc[0]','$acc[1]','$acc[2]')");
$query = "INSERT INTO accelerometer(x, y, z) VALUES(1, 2, 3)";
$result = pg_query($pg_conn, $query);
print "<h1>TEST<h1/>"
//    header( 'Location: /index.html' ) ;
?>