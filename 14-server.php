<?php
// ===========================
// PHP $_SERVER Superglobal
// ===========================

// $_SERVER is an array containing information such as headers, paths, and script locations.
// The entries in this array are created by the web server.
// Below are the most commonly used $_SERVER elements with their purposes and outputs.

// Get the filename of the currently executing script
echo "SCRIPT_FILENAME: " . $_SERVER['SCRIPT_FILENAME'] . "\\n";
// Output: Full path to the current script file

// Get the name of the script
echo "SCRIPT_NAME: " . $_SERVER['SCRIPT_NAME'] . "\\n";
// Output: Path of the current script relative to the document root

// Get the current page URI
echo "REQUEST_URI: " . $_SERVER['REQUEST_URI'] . "\\n";
// Output: The URI used to access this page (e.g., /index.php?id=123)

// Get the name of the host server
echo "SERVER_NAME: " . $_SERVER['SERVER_NAME'] . "\\n";
// Output: The name of the server host (e.g., localhost or www.example.com)

// Get server software
echo "SERVER_SOFTWARE: " . $_SERVER['SERVER_SOFTWARE'] . "\\n";
// Output: Server identification string (e.g., Apache/2.4.41 (Unix))

// Get the server protocol
echo "SERVER_PROTOCOL: " . $_SERVER['SERVER_PROTOCOL'] . "\\n";
// Output: Name and revision of the info protocol (e.g., HTTP/1.1)

// Get the request method
echo "REQUEST_METHOD: " . $_SERVER['REQUEST_METHOD'] . "\\n";
// Output: GET or POST (or other HTTP methods)

// Get the script's path relative to the root
echo "PHP_SELF: " . $_SERVER['PHP_SELF'] . "\\n";
// Output: Relative path to the script being executed

// Get the query string (the part after ? in URL)
echo "QUERY_STRING: " . $_SERVER['QUERY_STRING'] . "\\n";
// Output: id=123&page=2

// Get the document root directory
echo "DOCUMENT_ROOT: " . $_SERVER['DOCUMENT_ROOT'] . "\\n";
// Output: Full path to the root directory for the web documents

// Get the remote IP address (of the user/client)
echo "REMOTE_ADDR: " . $_SERVER['REMOTE_ADDR'] . "\\n";
// Output: IP address of the client machine

// Get the remote port used
echo "REMOTE_PORT: " . $_SERVER['REMOTE_PORT'] . "\\n";
// Output: Port number used on the client machine to connect

// Get the server IP address
echo "SERVER_ADDR: " . $_SERVER['SERVER_ADDR'] . "\\n";
// Output: IP address of the server

// Get the port being used on the server
echo "SERVER_PORT: " . $_SERVER['SERVER_PORT'] . "\\n";
// Output: Server port (e.g., 80 or 443)

// Get the user agent string (browser, OS)
echo "HTTP_USER_AGENT: " . $_SERVER['HTTP_USER_AGENT'] . "\\n";
// Output: Details about user's browser and operating system

// Get the referring page
echo "HTTP_REFERER: " . (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "Not available") . "\\n";
// Output: URL of the page that referred the user to the current page (might not always be available)

// Get the request time
echo "REQUEST_TIME: " . $_SERVER['REQUEST_TIME'] . "\\n";
// Output: Unix timestamp of the request start time

// Get the accepted content types
echo "HTTP_ACCEPT: " . $_SERVER['HTTP_ACCEPT'] . "\\n";
// Output: Content types accepted by the browser (e.g., text/html,application/xhtml+xml)

// Get accepted languages
echo "HTTP_ACCEPT_LANGUAGE: " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "\\n";
// Output: Languages the client accepts (e.g., en-US,en;q=0.9)

// Check if the connection is secure (via HTTPS)
echo "HTTPS: " . (isset($_SERVER['HTTPS']) ? $_SERVER['HTTPS'] : "Not using HTTPS") . "\\n";
// Output: 'on' if HTTPS is used

// More values can be checked using:
// print_r($_SERVER); // Shows all available keys and values
?>