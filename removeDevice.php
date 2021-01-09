<?php

include_once('config.php');

$ip = $_GET['ip'];
$port = $_GET['port'];
$community = $_GET['community'];
$version = $_GET['version'];

if(empty($ip) || empty($port)||empty($community) || empty($version)) {
    echo "FALSE";
}

else {
    $removeDevice = $db->exec("DELETE FROM networkdevices WHERE IP='$ip' AND PORT='$port'AND COMMUNITY='$community' AND VERSION='$version'");
    if(!$removeDevice){
        echo "FALSE";
    }
    else {
        echo "OK";
    }

}

$db->close();

?>
