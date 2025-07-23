<?php
/**
 * 📘 PHP Lesson: Date and Time in PHP
 *
 * This lesson covers:
 * - Getting current date and time
 * - Formatting dates
 * - Using timestamps
 * - Date manipulation
 * - Common date/time functions
 *
 * Each example includes comments and expected output.
 */

// ===============================
// 1. Get current date and time
// ===============================

// The date() function formats a local date/time and returns a string.
// Format characters are case-sensitive, e.g., Y = 4-digit year, m = 2-digit month.

// Get current date in YYYY-MM-DD format
$currentDate = date("Y-m-d");
echo "Current Date (Y-m-d): $currentDate\n"; 
// Output example: Current Date (Y-m-d): 2025-07-23

// Get current time in HH:MM:SS format (24-hour)
$currentTime = date("H:i:s");
echo "Current Time (H:i:s): $currentTime\n"; 
// Output example: Current Time (H:i:s): 14:35:20

// Get full date and time string
$fullDateTime = date("Y-m-d H:i:s");
echo "Full DateTime: $fullDateTime\n";
// Output example: Full DateTime: 2025-07-23 14:35:20

// ===============================
// 2. Common date format characters
// ===============================
// Y = 4-digit year (e.g., 2025)
// y = 2-digit year (e.g., 25)
// m = 2-digit month (01 to 12)
// n = month without leading zeros (1 to 12)
// d = day of the month with leading zeros (01 to 31)
// j = day of the month without leading zeros (1 to 31)
// l (lowercase L) = full textual day of the week (Monday to Sunday)
// D = short textual day (Mon to Sun)
// F = full textual month (January to December)
// M = short textual month (Jan to Dec)
// H = 24-hour format (00 to 23)
// h = 12-hour format (01 to 12)
// i = minutes with leading zeros (00 to 59)
// s = seconds with leading zeros (00 to 59)
// a = am or pm lowercase
// A = AM or PM uppercase

echo "\nDate formatted with different characters:\n";
echo date("l, F j, Y") . "\n"; // e.g., Wednesday, July 23, 2025
echo date("D, M j, y") . "\n"; // e.g., Wed, Jul 23, 25
echo date("h:i A") . "\n";     // e.g., 02:35 PM

// ===============================
// 3. Working with Unix Timestamps
// ===============================
// Unix timestamp = number of seconds since January 1, 1970 (UTC)

// Get current Unix timestamp
$timestamp = time();
echo "\nCurrent Unix Timestamp: $timestamp\n"; // e.g., 1750734920

// Convert timestamp back to formatted date
echo "Date from timestamp: " . date("Y-m-d H:i:s", $timestamp) . "\n";

// Create a timestamp for a specific date/time using mktime(hour, min, sec, month, day, year)
$customTimestamp = mktime(14, 30, 0, 12, 25, 2025);
echo "Custom Timestamp for 2025-12-25 14:30:00: $customTimestamp\n";
echo "Formatted custom date: " . date("Y-m-d H:i:s", $customTimestamp) . "\n";

// ===============================
// 4. strtotime() - Parse English textual date/time into timestamp
// ===============================

$dateString = "next Monday";
$nextMondayTimestamp = strtotime($dateString);
echo "\nTimestamp for '$dateString': $nextMondayTimestamp\n";
echo "Date for '$dateString': " . date("Y-m-d", $nextMondayTimestamp) . "\n";

$dateString2 = "+1 week 2 days 4 hours 2 seconds";
$futureTimestamp = strtotime($dateString2);
echo "Date for '$dateString2': " . date("Y-m-d H:i:s", $futureTimestamp) . "\n";

// ===============================
// 5. DateTime class (object-oriented way to handle date/time)
// ===============================

echo "\nUsing DateTime class:\n";

$dateObj = new DateTime(); // current date/time
echo "Now: " . $dateObj->format("Y-m-d H:i:s") . "\n";

// Modify date (add 1 day)
$dateObj->modify("+1 day");
echo "Tomorrow: " . $dateObj->format("Y-m-d H:i:s") . "\n";

// Set specific date
$dateObj->setDate(2025, 12, 31);
echo "Set Date: " . $dateObj->format("Y-m-d") . "\n";

// Difference between two dates
$start = new DateTime("2025-01-01");
$end = new DateTime("2025-12-31");
$diff = $start->diff($end);

echo "Difference between " . $start->format("Y-m-d") . " and " . $end->format("Y-m-d") . ": ";
echo $diff->days . " days\n"; // Output: 364 days

// ===============================
// 6. Timezones
// ===============================

echo "\nTimezones example:\n";

$dateUtc = new DateTime("now", new DateTimeZone("UTC"));
echo "Current time UTC: " . $dateUtc->format("Y-m-d H:i:s") . "\n";

$dateParis = new DateTime("now", new DateTimeZone("Europe/Paris"));
echo "Current time Paris: " . $dateParis->format("Y-m-d H:i:s") . "\n";

// ===============================
// 7. Set default timezone (affects date/time functions)
// ===============================

date_default_timezone_set("America/New_York");
echo "\nDefault timezone set to America/New_York\n";
echo "Current time: " . date("Y-m-d H:i:s") . "\n";

// ===============================
// 8. Miscellaneous useful functions
// ===============================

// Get day of week (1=Monday, 7=Sunday)
$dayOfWeek = date("N");
echo "\nToday is day number $dayOfWeek of the week\n";

// Get day of year (0-365)
$dayOfYear = date("z");
echo "Today is the $dayOfYear day of the year (starting from 0)\n";

// Check if a year is a leap year (returns 1 if leap year, else 0)
$year = 2024;
$isLeap = date("L", mktime(0, 0, 0, 1, 1, $year));
echo "$year is a leap year? " . ($isLeap ? "Yes" : "No") . "\n";

?>
