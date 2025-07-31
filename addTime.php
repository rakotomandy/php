<?php
$time1= "14:30:40"; // Example time in HH:MM:SS format
$time2 = "02:15:30"; // Another example time in HH:MM:SS format

list($hours1, $minutes1, $seconds1) = explode(':', $time1);
list($hours2, $minutes2, $seconds2) = explode(':', $time2);

// Convert both times to seconds
$totalSeconds1 = $hours1 * 3600 + $minutes1 * 60 + $seconds1;
$totalSeconds2 = $hours2 * 3600 + $minutes2 * 60 + $seconds2;   
$timestamp = $totalSeconds1 + $totalSeconds2;

$date= date("H:i:s", $timestamp);

echo "Total Time: $date\n";
// Calculate the difference in seconds

/* $totalSeconds=add($totalSeconds1, $totalSeconds2);

// Convert back to HH:MM:SS format
$hours = floor($totalSeconds / 3600);
$minutes = floor(($totalSeconds % 3600) / 60);
$seconds = $totalSeconds % 60;


echo sprintf("Total Time: %02d:%02d:%02d\n", $hours, $minutes, $seconds);

// Function to add two times in seconds
function add($time1, $time2) {
    return $time1 + $time2;
} */

