<?php

$micro_date = microtime();
$date_array = explode(" ",$micro_date);
$date_dd = explode(".", $date_array[0]);
$ms = explode("00", $date_dd[1])[0];
$data = date("Y-m-d H:i:s.$ms");
//echo "Date: $date." . $date_aa[0]."<br>";
echo $data;
?>
