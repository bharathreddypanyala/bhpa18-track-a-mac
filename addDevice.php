<?php

include('config.php');

$ip = $_GET['ip'];
$port = $_GET['port'];
$community = $_GET['community'];
$version = $_GET['version'];

if(empty($ip) || empty($port) || empty($community) || empty($version)) {
    echo "provide valid input" ;   
}
else {

    $db->exec("INSERT INTO networkdevices (IP,PORT,COMMUNITY,VERSION) VALUES ('$ip','$port','$community','$version')");
        echo "OK";
    }
$db->close();

?>


