<?php
// ===============================
// PHP COOKIES LESSON
// What are cookies, how to set, get, and delete cookies with examples
// ===============================

// --- What is a Cookie? ---
// A cookie is a small piece of data stored on the client's browser.
// Cookies are used to remember information between page requests,
// like user preferences, login sessions, shopping carts, etc.

// ------------------------------
// 1. Setting a Cookie
// ------------------------------
// Use setcookie() function before any output is sent to the browser!

// Syntax:
// bool setcookie(string $name, string $value = "", int $expires = 0, string $path = "", string $domain = "", bool $secure = false, bool $httponly = false);

// Example: Set a cookie named "user" with value "John Doe" that expires in 1 hour
setcookie("user", "John Doe", time() + 3600);

// Explanation:
// - "user" is the cookie name
// - "John Doe" is the value stored in the cookie
// - time() + 3600 sets the expiration time to 1 hour from now
// - By default, the cookie is available on the entire domain

// You must call setcookie() BEFORE any HTML or echo output, otherwise it will fail.


// ------------------------------
// 2. Accessing (Reading) a Cookie
// ------------------------------
// Cookies are available in the superglobal $_COOKIE array.

// Example: Read the "user" cookie value if set
if (isset($_COOKIE["user"])) {
    echo "User cookie value: " . $_COOKIE["user"];
} else {
    echo "User cookie is not set.";
}


// ------------------------------
// 3. Deleting a Cookie
// ------------------------------
// To delete a cookie, set its expiration date to a past time

// Example: Delete the "user" cookie by setting expiration in the past
setcookie("user", "", time() - 3600);

// Important: Deleting cookies also requires the same path and domain parameters 
// as when they were set, if those were specified.


// ------------------------------
// 4. Additional Parameters in setcookie()
// ------------------------------

// Example with more parameters:
setcookie(
    "session_id",         // Cookie name
    "abc123xyz",          // Cookie value
    time() + 86400,       // Expire in 1 day (86400 seconds)
    "/",                  // Available throughout the entire domain
    "example.com",        // Domain - cookie available only for example.com
    true,                 // Secure - cookie only sent over HTTPS
    true                  // HttpOnly - cookie not accessible via JavaScript (helps prevent XSS)
);


// ------------------------------
// 5. Checking if Cookies are Enabled
// ------------------------------
// Since cookies require the client to accept them, you can test like this:

if (count($_COOKIE) > 0) {
    echo "Cookies are enabled";
} else {
    echo "Cookies might be disabled";
}
// Note: This only checks if cookies are currently set, not if the browser accepts them.

// ------------------------------
// 6. Practical Example: Remember User Preference
// ------------------------------

// Check if user submitted a form to change background color preference
if (isset($_POST['bgcolor'])) {
    $bgcolor = $_POST['bgcolor'];
    // Set cookie for 30 days
    setcookie('bgcolor', $bgcolor, time() + (30 * 24 * 60 * 60));
} else {
    // Use cookie value or default
    $bgcolor = isset($_COOKIE['bgcolor']) ? $_COOKIE['bgcolor'] : 'white';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cookie Preference Example</title>
</head>
<body style="background-color: <?php echo htmlspecialchars($bgcolor); ?>;">

<h2>Choose Background Color:</h2>
<form method="post" action="">
    <select name="bgcolor">
        <option value="white" <?php if($bgcolor == 'white') echo 'selected'; ?>>White</option>
        <option value="lightblue" <?php if($bgcolor == 'lightblue') echo 'selected'; ?>>Light Blue</option>
        <option value="lightgreen" <?php if($bgcolor == 'lightgreen') echo 'selected'; ?>>Light Green</option>
        <option value="yellow" <?php if($bgcolor == 'yellow') echo 'selected'; ?>>Yellow</option>
    </select>
    <input type="submit" value="Save Preference">
</form>

</body>
</html>
