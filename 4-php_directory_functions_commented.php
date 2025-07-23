<?php
// ===============================
// 📘 LESSON: PHP DIRECTORY FUNCTIONS (With Line-by-Line Comments)
// ===============================

// ✅ 1. opendir($path): Opens a directory handle
$dirPath = "example_dir"; // Define the directory to work with

if (is_dir($dirPath)) { // Check if the path is a valid directory
    $handle = opendir($dirPath); // Open the directory and get the handle

    if ($handle) { // If the directory opened successfully
        echo "🔓 Directory opened: $dirPath\n";

        // ✅ 2. readdir($handle): Reads one entry (file or folder) from the directory
        while (($entry = readdir($handle)) !== false) {
            echo "📁 Entry: $entry\n"; // Print each entry in the directory
        }

        // ✅ 3. closedir($handle): Closes the opened directory
        closedir($handle); // Close the directory handle
    } else {
        echo "❌ Failed to open directory.\n";
    }
} else {
    echo "⚠️ Directory does not exist: $dirPath\n";
}


// ✅ 4. scandir($path): Returns array of files/directories in the given directory
$entries = scandir($dirPath); // Get all entries in the directory as an array
echo "\n📚 scandir result:\n";
print_r($entries); // Print the array of file and folder names


// ✅ 5. mkdir($path): Creates a new directory
$newFolder = "new_dir"; // Define the name of the folder to create
if (!is_dir($newFolder)) { // Check if the directory already exists
    mkdir($newFolder); // Create the directory if it doesn't exist
    echo "✅ Folder '$newFolder' created.\n";
} else {
    echo "ℹ️ Folder '$newFolder' already exists.\n";
}


// ✅ 6. rmdir($path): Removes an empty directory
$emptyDir = "to_delete"; // Name of the folder to delete
mkdir($emptyDir); // Ensure it exists by creating it (must be empty)
if (rmdir($emptyDir)) { // Attempt to remove it
    echo "🗑️ Folder '$emptyDir' removed.\n";
} else {
    echo "❌ Could not remove '$emptyDir'. Make sure it is empty.\n";
}


// ✅ 7. dir($path): Object-oriented way to handle directories
echo "\n📦 Using dir() object:\n";
$d = dir($dirPath); // Create a dir object for the directory

echo "Handle: " . $d->handle . "\n"; // Output the directory handle
echo "Path: " . $d->path . "\n";     // Output the path of the directory

while (false !== ($entry = $d->read())) { // Read each entry using object method
    echo "📄 File: $entry\n"; // Print file or directory name
}
$d->close(); // Close the directory handle with object method


// ✅ 8. getcwd(): Gets the current working directory
echo "\n📍 Current working directory: " . getcwd() . "\n"; // Show where PHP is currently operating


// ✅ 9. chdir($path): Changes current working directory
echo "➡️ Changing to '$dirPath'\n";
if (chdir($dirPath)) { // Try changing to the new directory
    echo "✅ Now in directory: " . getcwd() . "\n"; // Confirm current location
    chdir(".."); // Return to previous (parent) directory
}


// ✅ 10. glob(): Returns array of filenames matching a pattern
echo "\n🔍 All PHP files in current folder:\n";
$phpFiles = glob("*.php"); // Match all files ending in .php
print_r($phpFiles); // Print matched files


// ✅ 11. is_dir($path): Checks whether a path is a directory
echo is_dir($dirPath) ? "✔️ '$dirPath' is a directory\n" : "❌ Not a directory\n";

// ✅ 12. is_file($path): Checks whether a path is a file
$sampleFile = __FILE__; // Get the current script file path
echo is_file($sampleFile) ? "📄 '$sampleFile' is a file\n" : "❌ Not a file\n";

?>
