from pathlib import Path

php_code = """<?php
// PHP SESSION LESSON
// -------------------
// A session is a way to store information (in variables) to be used across multiple pages.
// Unlike a cookie, the information is not stored on the user's computer.

// Start the session. This must be called at the beginning of the script before any HTML output.
session_start(); 

// -------------------
// STORING SESSION VARIABLES
// -------------------
// We use the global $_SESSION array to store session variables.
$_SESSION["username"] = "Eric";
$_SESSION["role"] = "Admin";

// -------------------
// ACCESSING SESSION VARIABLES
// -------------------
// We access them like regular array values.
echo "Username: " . $_SESSION["username"] . "\\n"; // Output: Eric
echo "Role: " . $_SESSION["role"] . "\\n";         // Output: Admin

// -------------------
// CHECK IF A SESSION VARIABLE IS SET
// -------------------
if (isset($_SESSION["username"])) {
    echo "Session for username is set.\\n"; // Will output this message
}

// -------------------
// UNSET A SPECIFIC SESSION VARIABLE
// -------------------
unset($_SESSION["role"]); // Removes only the 'role' session variable

// -------------------
// DESTROY THE WHOLE SESSION
// -------------------
// This deletes all session variables and ends the session.
session_destroy(); // Usually called during logout

// -------------------
// SESSION CONFIGURATION (OPTIONAL)
// -------------------
// You can configure session behavior using session configuration functions.

// Change session name (must be before session_start)
session_name("MY_SESSION_ID");

// Set a custom session save path (before session_start)
session_save_path("/tmp/my_sessions");

// -------------------
// SESSION ID
// -------------------
// Each session has a unique ID used to link the session to the user.
echo "Session ID: " . session_id() . "\\n"; // Outputs current session ID

// -------------------
// REGENERATE SESSION ID
// -------------------
// Helps prevent session fixation attacks by generating a new ID.
session_regenerate_id(true); // true deletes old session

// -------------------
// SESSION STATUS CHECK
// -------------------
$status = session_status(); // Returns the current session status
if ($status == PHP_SESSION_ACTIVE) {
    echo "Session is active.\\n";
} elseif ($status == PHP_SESSION_NONE) {
    echo "Sessions are disabled.\\n";
} elseif ($status == PHP_SESSION_DISABLED) {
    echo "No session exists yet.\\n";
}
?>
