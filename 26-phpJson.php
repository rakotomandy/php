<?php
// ============================================
// PHP JSON LESSON WITH COMMENTED EXPLANATIONS
// ============================================

// JSON stands for JavaScript Object Notation.
// It is a lightweight data format used for data exchange between server and client (often JavaScript).

// ==============================
// 1. Convert PHP array to JSON
// ==============================

$data = [
    "name" => "John",
    "age" => 30,
    "email" => "john@example.com"
];

// json_encode() converts PHP array/object to JSON string
$json = json_encode($data);

// Output JSON string
echo "JSON encoded: " . $json . "\n";
// Output: {"name":"John","age":30,"email":"john@example.com"}


// =======================================
// 2. Convert JSON string to PHP variable
// =======================================

$jsonString = '{"name":"Alice","age":25,"email":"alice@example.com"}';

// json_decode() converts JSON string to PHP array or object
// 2nd parameter TRUE means return associative array
$arrayData = json_decode($jsonString, true);
echo "Decoded name: " . $arrayData["name"] . "\n"; // Output: Alice

// Without 2nd parameter, json_decode returns object
$objectData = json_decode($jsonString);
echo "Decoded age (object): " . $objectData->age . "\n"; // Output: 25


// ==================================================
// 3. REAL-WORLD EXAMPLE: Sending JSON to JavaScript
// ==================================================

// Simulate PHP sending JSON to frontend (JavaScript expects this format)
$products = [
    ["id" => 1, "name" => "Laptop", "price" => 1000],
    ["id" => 2, "name" => "Phone", "price" => 500],
];

header('Content-Type: application/json'); // Set correct header
echo json_encode($products); // Frontend JS can fetch this via AJAX or fetch()


// ==========================================================
// 4. REAL-WORLD EXAMPLE: Receiving JSON from a POST request
// ==========================================================

// In real API (like from JavaScript), client sends raw JSON.
// PHP receives it using: file_get_contents("php://input")

// Simulate receiving JSON input (use this in POST endpoint)
$input = '{"username":"admin","password":"1234"}';

// Decode input
$login = json_decode($input, true); // decode as array

// Check login (example logic)
if ($login["username"] === "admin" && $login["password"] === "1234") {
    echo "Login successful!\n";
} else {
    echo "Login failed!\n";
}


// ===================================================
// 5. JSON with PHP OBJECTS (convert object to JSON)
// ===================================================

class User {
    public $name;
    public $email;

    // Constructor to initialize
    public function __construct($name, $email){
        $this->name = $name;
        $this->email = $email;
    }
}

// Create object
$user = new User("Bob", "bob@example.com");

// Convert object to JSON string
$jsonUser = json_encode($user);
echo "User in JSON: " . $jsonUser . "\n";
// Output: {"name":"Bob","email":"bob@example.com"}


// ==================================================
// 6. Handling JSON Errors
// ==================================================

$badJson = '{"name": "Eric", "email": "eric@example.com"'; // Missing closing }

// Try decoding
$result = json_decode($badJson, true);

// Check if error happened
if (json_last_error() !== JSON_ERROR_NONE) {
    echo "JSON Error: " . json_last_error_msg() . "\n";
    // Output: JSON Error: Syntax error
}

?>
