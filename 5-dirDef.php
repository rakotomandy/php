<?php
/**
 * 📚 PHP Lesson: Directory Definition and Overview
 *
 * This lesson explains what a directory is in PHP,
 * how it's used, and which functions relate to directory handling.
 */

/**
 * 🗂️ What is a Directory?
 *
 * A directory is a folder in the filesystem used to store files or other directories.
 * PHP provides many built-in functions and classes to manage directories.
 */

/**
 * ✅ Why Directories Are Important:
 * - Organize files (e.g., images, documents)
 * - Perform bulk operations (e.g., log cleanup)
 * - Handle file uploads
 * - Build dynamic file managers
 */

/**
 * 🔧 Ways to Handle Directories in PHP:
 * 1. Procedural Style - using functions like opendir(), readdir(), etc.
 * 2. Object-Oriented Style - using the Dir class (dir()).
 */

/**
 * 🧰 Common Directory Functions in PHP:
 *
 * | Function         | Purpose                                  |
 * |------------------|------------------------------------------|
 * | opendir()        | Opens a directory handle                 |
 * | readdir()        | Reads entry from opened directory        |
 * | closedir()       | Closes an opened directory               |
 * | is_dir()         | Checks if a path is a directory          |
 * | mkdir()          | Creates a new directory                  |
 * | rmdir()          | Removes an empty directory               |
 * | scandir()        | Returns array of files/directories       |
 * | chdir()          | Changes the current directory            |
 * | getcwd()         | Gets current working directory           |
 * | dir()            | OOP-style directory handler              |
 */

// Example usage:
echo "Current Directory: " . getcwd() . PHP_EOL;

$folder = "exampleDir";

// Check if directory exists
if (!is_dir($folder)) {
    // Create the directory
    mkdir($folder);
    echo "Directory created: $folder" . PHP_EOL;
} else {
    echo "Directory already exists: $folder" . PHP_EOL;
}

// List files using scandir
$files = scandir($folder);
echo "Contents of $folder:" . PHP_EOL;
print_r($files);
?>
