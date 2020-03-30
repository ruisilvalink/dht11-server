<?php

include "entry.inc";

$api_token = getenv('API_TOKEN');
$storage_path = getenv('STORAGE_PATH');

$token = $_POST['token'];
if ($token != $api_token) {
	header('HTTP/1.0 401 Unauthorized');
	exit;
}

$entry = new Entry();
$entry->created_on = new DateTime("now", new DateTimeZone("UTC"));
$entry->humidity = $_POST['humidity'];
$entry->temperature = $_POST['temperature'];
$entry_json = json_encode($entry);

$entries_file = $storage_path . "entries-2.json";
file_put_contents($entries_file, $entry_json, FILE_APPEND);

$entry_file = $storage_path . "entry.json";
file_put_contents($entry_file, $entry_json);
