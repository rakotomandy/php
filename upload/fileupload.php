# Updating the PHP code to include a commented explanation for every single line

php_code = """<?php
// ===============================================================
// COMPLETE PHP $_FILES LESSON — EVERY LINE FULLY COMMENTED
// ===============================================================

// Check if a file has been submitted and it is not empty
if (isset($_FILES['myfile']) && $_FILES['myfile']['error'] !== UPLOAD_ERR_NO_FILE) {

    // Extract the original name of the uploaded file
    $originalName = $_FILES['myfile']['name']; // Example: image.png

    // Temporary path where PHP stores the uploaded file
    $tmpName = $_FILES['myfile']['tmp_name']; // Example: /tmp/php123.tmp

    // Size of the uploaded file in bytes
    $fileSize = $_FILES['myfile']['size']; // Example: 1048576 (1MB)

    // MIME type of the file as reported by the browser (unreliable)
    $fileType = $_FILES['myfile']['type']; // Example: image/png

    // Upload error code; 0 means no error
    $fileError = $_FILES['myfile']['error']; // 0 = UPLOAD_ERR_OK

    // Get file extension in lowercase (secure method)
    $fileExt = strtolower(pathinfo($originalName, PATHINFO_EXTENSION)); // Example: png

    // Define a whitelist of allowed file extensions
    $allowedExt = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'docx', 'zip', 'txt'];

    // Check if the file's extension is allowed
    if (!in_array($fileExt, $allowedExt)) {
        echo "❌ Invalid file type. Only: " . implode(', ', $allowedExt); // Show allowed types
        exit; // Stop script
    }

    // Check for upload error using predefined constant
    if ($fileError !== UPLOAD_ERR_OK) {
        echo "❌ Upload error: " . uploadErrorMessage($fileError); // Translate error
        exit;
    }

    // Limit upload size to 5MB
    if ($fileSize > 5 * 1024 * 1024) {
        echo "❌ File too large. Max size is 5MB.";
        exit;
    }

    // Confirm file was uploaded using HTTP POST for security
    if (!is_uploaded_file($tmpName)) {
        echo "❌ Possible file upload attack!";
        exit;
    }

    // Set upload directory path
    $uploadDir = 'uploads/';

    // Create upload directory if it does not exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true); // Create with permissions
    }

    // Generate a unique file name to avoid overwriting
    $newFileName = uniqid('upload_', true) . '.' . $fileExt; // Example: upload_abc123.png

    // Build the full destination path
    $destination = $uploadDir . basename($newFileName); // Example: uploads/upload_abc123.png

    // Move the uploaded file from temp location to destination
    if (move_uploaded_file($tmpName, $destination)) {
        echo "✅ File uploaded successfully!<br>"; // Notify success
        echo "📎 Original Name: $originalName<br>"; // Show original name
        echo "📁 Stored As: $destination<br>"; // Show saved path
        echo "📦 Size: " . formatBytes($fileSize) . "<br>"; // Show readable size
        echo "🧾 MIME Type: $fileType<br>"; // Show reported MIME

        // Additional verification of MIME using PHP's fileinfo functions
        if (function_exists('finfo_open')) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE); // Open finfo handler
            $realMime = finfo_file($finfo, $destination); // Detect MIME type
            finfo_close($finfo); // Close handler
            echo "🔍 Verified MIME Type: $realMime<br>"; // Show actual MIME
        }

    } else {
        echo "❌ Failed to save uploaded file."; // move_uploaded_file failed
    }

} else {
    echo "No file uploaded yet."; // User did not submit a file
}

// Format byte size into KB, MB, etc.
function formatBytes($bytes, $precision = 2) {
    $units = ['B', 'KB', 'MB', 'GB']; // Define units
    $i = floor(log($bytes, 1024)); // Calculate unit
    return round($bytes / pow(1024, $i), $precision) . ' ' . $units[$i]; // Return formatted size
}

// Convert upload error code into readable message
function uploadErrorMessage($code) {
    return match ($code) {
        UPLOAD_ERR_OK         => "No error (UPLOAD_ERR_OK).",
        UPLOAD_ERR_INI_SIZE   => "File exceeds upload_max_filesize (UPLOAD_ERR_INI_SIZE).",
        UPLOAD_ERR_FORM_SIZE  => "File exceeds MAX_FILE_SIZE in HTML form (UPLOAD_ERR_FORM_SIZE).",
        UPLOAD_ERR_PARTIAL    => "File only partially uploaded (UPLOAD_ERR_PARTIAL).",
        UPLOAD_ERR_NO_FILE    => "No file was uploaded (UPLOAD_ERR_NO_FILE).",
        UPLOAD_ERR_NO_TMP_DIR => "Missing temporary folder (UPLOAD_ERR_NO_TMP_DIR).",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk (UPLOAD_ERR_CANT_WRITE).",
        UPLOAD_ERR_EXTENSION  => "File upload stopped by extension (UPLOAD_ERR_EXTENSION).",
        default               => "Unknown error code $code." // Fallback
    };
}
?>

<!-- ===================== -->
<!-- HTML Upload Form -->
<!-- This form submits a file to the current script -->
<form action="" method="post" enctype="multipart/form-data">
    <label>Select a file to upload:</label><br> <!-- Label for file input -->
    <input type="file" name="myfile"><br><br> <!-- File input field -->
    <input type="submit" value="Upload File"> <!-- Submit button -->
</form>
