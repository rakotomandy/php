<?php
// Define the directory you want to check
$directory = "myfolder"; // Make sure this folder exists

// Define the file you want to check/create inside that folder
$filenameToCheck = "myfile.txt";

// Build the full file path
$fullFilePath = $directory . DIRECTORY_SEPARATOR . $filenameToCheck;

// Step 1: Check if the directory exists
if (is_dir($directory)) {
    echo "✅ Directory '$directory' exists.\n";

    // Step 2: Open the directory and loop through its contents
    $found = false;

    $files = scandir($directory); // returns an array of filenames

    foreach ($files as $file) {
        if ($file === $filenameToCheck) {
            $found = true;
            break;
        }
    }

    // Step 3: If the file is not found, create it
    if (!$found) {
        // Create the file with default content
        file_put_contents($fullFilePath, "This file was created automatically.");
        echo "📁 File '$filenameToCheck' has been created inside '$directory'.\n";
    } else {
        echo "📂 File '$filenameToCheck' already exists in '$directory'.\n";
    }

} else {
    echo "❌ Directory '$directory' does not exist.\n";
}
?>
