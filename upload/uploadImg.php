<?php
// ===============================
// PHP: 4 Methods for File Upload Checking with Avatar Fallback
// ===============================

// ---------- 1. Method using UPLOAD_ERR_NO_FILE ----------
/*
 * Checks if no file was uploaded based on error code.
 * Most reliable method.
 */
if ($_FILES['imaga']['error'] === UPLOAD_ERR_NO_FILE) {
    // If no file is uploaded, use a default avatar
    $img = "avatar.png";
} else {
    // Otherwise, store the uploaded file and use its name
    $img = $_FILES['imaga']['name'];
    move_uploaded_file($_FILES["imaga"]["tmp_name"], "uploads/" . $img);
}


// ---------- 2. Method using is_uploaded_file() ----------
/*
 * Checks whether the uploaded file was really uploaded via HTTP POST.
 * Reliable for verifying the legitimacy of the upload.
 */
if (isset($_FILES['imaga']) && is_uploaded_file($_FILES['imaga']['tmp_name'])) {
    // If a valid uploaded file is found, move it and use its name
    $img = $_FILES['imaga']['name'];
    move_uploaded_file($_FILES["imaga"]["tmp_name"], "uploads/" . $img);
} else {
    // Fallback to avatar if no file
    $img = "avatar.png";
}


// ---------- 3. Method using null coalescing and trim ----------
/*
 * Uses ?? operator to provide a fallback, and trim() to avoid blank strings.
 * Acceptable but less secure compared to previous methods.
 */
$img = $_FILES['imaga']['name'] ?? ""; // Get name or empty string if not set
$img = trim($img) !== "" ? $img : "avatar.png"; // Use avatar if blank


// ---------- 4. Helper function method ----------
/*
 * Encapsulates the logic in a reusable function for cleanliness and consistency.
 * Checks for all safe conditions before moving the file.
 * Most maintainable and clean solution.
 */
function getUploadedImageOrDefault($fileKey, $default = "avatar.png") {
    // Check if file key exists, no upload error, and has a non-empty name
    if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] === UPLOAD_ERR_OK && $_FILES[$fileKey]['name'] !== "") {
        // Move the uploaded file to destination
        move_uploaded_file($_FILES[$fileKey]['tmp_name'], "uploads/" . $_FILES[$fileKey]['name']);
        return $_FILES[$fileKey]['name'];
    }
    // Return default avatar if upload is not valid
    return $default;
}

// Use the helper function to assign the image
$img = getUploadedImageOrDefault("imaga");

?>
