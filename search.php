<?php

include_once('config.php');

if (empty($_GET)) {
    echo "FALSE";
    }
else {
    $mac_addr = htmlspecialchars($_GET["mac"]);
    $sql = <<<EOF
              SELECT * FROM results WHERE macs LIKE "%$mac_addr%" ORDER BY MACS;
EOF;
    $find = $db->query($sql);
    $arr = array(); 
    while($row = $find->fetchArray(SQLITE3_ASSOC) ){
         #echo $row[1]. "|" . $row[2] . "|" . $row[3] . "|" . $row[4] . "\n";
         $arr[] = $row['IP']. " | " . $row['VLANS'] . " | " . $row['PORT'] . " | " . "$mac_addr";
     
    }

$totnum = count($arr);
if ($totnum ==0){
    $count = $db->query('SELECT count(*) FROM networkdevices');
    while($row1 = $count->fetchArray(SQLITE3_ASSOC)) {
        $noDevices = $row1['count(*)'];
        echo "Not Found in $noDevices devices"."\n";
     }
}

$res = array_unique($arr);
$len = count($res);
for($i = 0; $i < $len; $i++){
    echo $res[$i]. "\n";
    }
}
$db->close();

?>
