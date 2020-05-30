<?php
include_once('config.php');

if (empty($_GET)) {
    echo "False and database not created";
    }
else {
    $my_search_is = htmlspecialchars($_GET["mac"]);
    $sql = <<<EOF
              SELECT * FROM List WHERE MACS LIKE "%$my_search_is%" ORDER BY MACS;
EOF;
    $my_output_is = $db->query($sql);
    $data = array(); 
    while($row = $my_output_is->fetchArray(SQLITE3_ASSOC) ){
         #echo $of rows
         $data[] = $row['IP']. " | " . $row['VLANs'] . " | " . $row['PORT'] . " | " . "$my_search_is";
     
    }

$flag = count($data);
if($flag ==0){
    $count = $db->query('SELECT count(*) FROM info');
    while($check = $count->fetchArray(SQLITE3_ASSOC)) {
        $number_of_devices = $check['count(*)'];
        echo "No match in $number_of_devices devices"."\n";
     }
}

$my_result_is = array_unique($data);
$total = count($my_result_is);
$i=0;
while($i<$total){
    echo $my_result_is[$i]. "\n";
    $i++;
    }
}
$db->close();

?>