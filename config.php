<?php
class track_a_mac_db extends SQLite3 {
      function __construct() {
         $this->open('track-a-mac.db');
      }
}
$db = new track_a_mac_db();


$result = $db->exec('CREATE TABLE IF NOT EXISTS results(IP varchar not null, VLANs varchar not null, PORT varchar, MACS varchar)');
if(!$result){
   echo $db->lastErrorMsg(); 
}


$result = $db->exec('CREATE TABLE IF NOT EXISTS networkdevices(IP varchar not null,PORT varchar not null,COMMUNITY string not null ,VERSION varchar not null, FIRST_PROBE varchar, LATEST_PROBE varchar null, FAILED_ATTEMPTS int default 0 not null)');
if(!$result)
{
      echo $db->lastErrorMsg();
}

?>
