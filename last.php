<?php

include "entry.inc";

$storage_path = getenv('STORAGE_PATH');

$entry_file = $storage_path . "entry.json";

$entry_array = array();

$entry_line = file_get_contents($entry_file);
$entry = json_decode($entry_line);
array_push($entry_array, $entry);

echo json_encode($entry_array);