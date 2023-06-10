<?php
include_once "./functions.php";
$event_array = ganglia_events_get(intval($_GET['start']), intval($_GET['end']));
header("Content-type: application/json");
print json_encode($event_array, JSON_THROW_ON_ERROR);
exit(0);
?>
