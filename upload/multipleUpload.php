# Rewriting the PHP code file with full commented explanation on each line
php_code = '''<?php
// =============================
// MULTIPLE FILE UPLOAD WITH DATABASE STORAGE (FULLY COMMENTED)
// =============================

// ---------- STEP 1: DATABASE CONNECTION USING PDO ----------
try {
    // Create a new PDO connection to a MySQL database called 'file_db' on localhost with root user and no password
    $pdo = new PDO("mysql:host=localhost;dbname=file_db", "root", "");
    // Set the error mode to throw exceptions in case of errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If connection fails, display the error message and stop the script
    die("Database connection failed: " . $e->getMessage());
}

// ---------- STEP 2: HANDLE THE FORM SUBMISSION ----------
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Define the directory where files will be uploaded
    $uploadDir = "uploads/";

    // If the upload directory does not exist, create it with permissions 0755
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Loop through each uploaded file from the input name "files[]"
    foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {

        // Get original file name, temporary path, file size and error code
        $fileName = basename($_FILES["files"]["name"][$key]);
        $fileTmp = $_FILES["files"]["tmp_name"][$key];
        $fileSize = $_FILES["files"]["size"][$key];
        $fileError = $_FILES["files"]["error"][$key];

        // Check for upload errors
        if ($fileError === UPLOAD_ERR_OK) {

            // Generate a unique name to prevent overwriting
            $uniqueName = uniqid("file_", true) . "_" . $fileName;

            // Set the full path for the uploaded file
            $filePath = $uploadDir . $uniqueName;

            // Move the uploaded file from temp to the target directory
            if (move_uploaded_file($fileTmp, $filePath)) {

                // Prepare the SQL insert query for storing in the database
                $stmt = $pdo->prepare("INSERT INTO uploaded_files (filename, filepath, size) VALUES (?, ?, ?)");

                // Execute the query with values
                $stmt->execute([$fileName, $filePath, $fileSize]);

                // Success message (can be customized further)
                echo "Uploaded and saved: " . htmlspecialchars($fileName) . "<br>";
            } else {
                // If file move fails
                echo "Failed to move file: " . htmlspecialchars($fileName) . "<br>";
            }
        } else {
            // Display the upload error code if any
            echo "Error uploading file: " . htmlspecialchars($fileName) . " (Error code: $fileError)<br>";
        }
    }
}
?>

<!-- HTML FORM FOR MULTIPLE FILE UPLOAD -->
<!DOCTYPE html>
<html>
<head>
    <title>Upload Multiple Files</title>
</head>
<body>
    <h2>Select multiple files to upload</h2>
    <!-- Form uses POST method and multipart/form-data enctype for file uploads -->
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="files[]" multiple><br><br>
        <input type="submit" value="Upload Files">
    </form>
</body>
</html>
