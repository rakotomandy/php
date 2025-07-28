<?php
// ===============================
// VIDEO UPLOAD HANDLING IN PHP
// ===============================

// Set the folder where uploaded videos will be stored
$uploadDir = "uploads/videos/";

// Check if the upload directory exists
if (!is_dir($uploadDir)) {
    // If not, create the directory with 0777 permission and allow nested folders
    mkdir($uploadDir, 0777, true);
}

// Check if a file was uploaded with the name 'video'
if (isset($_FILES['video'])) {

    // ===============================
    // 1. Get file details
    // ===============================

    $fileName = $_FILES['video']['name'];        // Original filename, e.g. "myvideo.mp4"
    $tmpName = $_FILES['video']['tmp_name'];     // Temporary filename stored on the server
    $fileSize = $_FILES['video']['size'];        // Size of the file in bytes
    $fileError = $_FILES['video']['error'];      // Any upload error (0 = no error)
    $fileType = $_FILES['video']['type'];        // MIME type (e.g. video/mp4)

    // ===============================
    // 2. Get the file extension in lowercase
    // ===============================

    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // e.g. "mp4"

    // ===============================
    // 3. Allowed file extensions for video
    // ===============================

    $allowedExt = ['mp4', 'webm', 'ogg', 'mov', 'avi'];

    // ===============================
    // 4. Validate uploaded video file
    // ===============================

    if ($fileError === UPLOAD_ERR_NO_FILE) {
        // No file was selected by the user
        echo "No video selected.";
    } elseif (!in_array($fileExt, $allowedExt)) {
        // File extension is not among allowed video types
        echo "Only video files (mp4, webm, ogg, mov, avi) are allowed.";
    } elseif ($fileSize > 100 * 1024 * 1024) {
        // File exceeds 100MB
        echo "Video file is too large. Max allowed: 100MB.";
    } elseif (is_uploaded_file($tmpName)) {
        // File is a valid uploaded file

        // ===============================
        // 5. Move the uploaded video to the final destination
        // ===============================

        $newName = uniqid("video_") . "." . $fileExt; // e.g. video_64cffe2e8a09d.mp4
        $destination = $uploadDir . $newName;         // Final path: uploads/videos/video_*.mp4

        if (move_uploaded_file($tmpName, $destination)) {
            // Upload success
            echo "Video uploaded successfully: $newName";
        } else {
            // move_uploaded_file failed
            echo "Failed to upload video.";
        }
    } else {
        // The uploaded file is not valid
        echo "Invalid upload.";
    }

} else {
    // No video file sent at all
    echo "No video file received.";
}
?>
