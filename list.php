<?php

include "entry.inc";

$storage_path = getenv('STORAGE_PATH');

$entries_file = $storage_path . "entries-3.json";

$entries_handle = fopen($entries_file, "r");

$entries_array = array();

while ($entry_line = fgets($entries_handle)) {
    $entry = json_decode($entry_line);
    array_push($entries_array, $entry);
}

fclose($entries_handle);

echo json_encode($entries_array);