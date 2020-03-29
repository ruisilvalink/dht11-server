<?php

include "entry.inc";

$API_TOKEN = getenv('API_TOKEN');
$STORAGE_ROOT = getenv('STORAGE_PATH');

$token = $_POST['token'];
if ($token != $API_TOKEN) {
	header('HTTP/1.0 401 Unauthorized');
	exit;
}

$ENTRIES_FILE = $STORAGE_PATH . "entries.json";

$entries_data = file_get_contents($ENTRIES_FILE);

$entries = json_decode($entries_data);

if (!isset($entries)) {
	$entries = array();
}

$entry = new Entry();
$entry->created_on = new DateTime("now", new DateTimeZone("UTC"));
$entry->humidity = $_POST['humidity'];
$entry->temperature = $_POST['temperature'];

array_push($entries, $entry);

//error_log("Entry: " . json_encode($entry));

file_put_contents($ENTRIES_FILE, json_encode($entries));

