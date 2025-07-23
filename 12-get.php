<?php
// ------------------------------------------
// LESSON: Understanding $_GET in PHP
// ------------------------------------------

// ✅ Definition:
// $_GET is a PHP superglobal array used to collect values sent in the URL via HTTP GET method.
// The data is visible in the URL and useful for search queries, filters, or pagination.

// Example URL: 
// http://yourdomain.com/lesson.php?name=Eric&age=25

// Let's create a simulation by checking if the 'name' and 'age' parameters exist

// 🔍 Check if 'name' is passed in the URL
if (isset($_GET['name'])) {
    // Access and store the 'name' from URL
    $name = $_GET['name'];
    echo "Name: " . $name . "<br>"; // ➜ Outputs: Name: Eric
} else {
    echo "Name not provided in URL<br>";
}

// 🔍 Check if 'age' is passed in the URL
if (isset($_GET['age'])) {
    // Access and store the 'age' from URL
    $age = $_GET['age'];
    echo "Age: " . $age . "<br>"; // ➜ Outputs: Age: 25
} else {
    echo "Age not provided in URL<br>";
}

// 📌 You can also loop through the entire $_GET array
echo "<h3>All parameters received via GET:</h3>";
foreach ($_GET as $key => $value) {
    echo $key . " = " . htmlspecialchars($value) . "<br>"; 
    // ➜ e.g., name = Eric
}

// 🔒 Important:
// Always sanitize $_GET data using htmlspecialchars() or other methods before displaying or using it.
// This helps prevent Cross-Site Scripting (XSS) attacks.

// 🧪 Try This:
// In your browser, type:
// http://localhost/yourfile.php?city=Antananarivo&country=Madagascar
// You will see: 
// city = Antananarivo
// country = Madagascar

?>
