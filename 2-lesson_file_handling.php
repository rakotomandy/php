<?php
/*
==============================
 PHP LESSON: FILE HANDLING AND FILE CREATION
==============================

This lesson covers how to handle files in PHP.
We will look at opening, reading, writing, appending, and closing files,
as well as checking if a file exists, creating new files, and deleting files.
*/

echo "=== PHP File Handling Lesson ===\n";

// --------------------------
// Check if File Exists
// --------------------------
$filename = "example.txt";
if (file_exists($filename)) {
    echo "File exists: $filename\n";
} else {
    echo "File does not exist.\n";
}

// --------------------------
// Create or Open a File (write mode)
// --------------------------
// fopen() opens a file or URL
// Modes: 'w' - write, 'r' - read, 'a' - append, 'x' - create new
$file = fopen("example.txt", "w"); // 'w' will truncate the file or create it
if ($file) {
    echo "File opened successfully in write mode.\n";
} else {
    echo "Failed to open the file.\n";
}

// --------------------------
// Write to File
// --------------------------
// fwrite(resource $file, string $string) writes to the file
fwrite($file, "This is a new line written to the file.\n");
fwrite($file, "Another line of content.\n");

// --------------------------
// Close File
// --------------------------
// fclose(resource $file) closes the file
fclose($file);
echo "File closed after writing.\n";

// --------------------------
// Read File Contents
// --------------------------
// file_get_contents(string $filename) returns file content as string
$content = file_get_contents("example.txt");
echo "Content of the file:\n$content";

// --------------------------
// Append to File
// --------------------------
// Open file in append mode with 'a'
$file = fopen("example.txt", "a");
fwrite($file, "Appended line.\n");
fclose($file);
echo "Line appended.\n";

// --------------------------
// Read File Line by Line
// --------------------------
$file = fopen("example.txt", "r");
if ($file) {
    echo "Reading file line by line:\n";
    while (!feof($file)) {
        // fgets(resource $file) gets a line from file
        $line = fgets($file);
        echo $line;
    }
    fclose($file);
}

// --------------------------
// Delete a File
// --------------------------
// unlink(string $filename) deletes a file
if (file_exists("to_delete.txt")) {
    unlink("to_delete.txt");
    echo "File deleted.\n";
} else {
    echo "No file to delete.\n";
}

?>
