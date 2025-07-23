<?php
// ------------------------------------------
// LESSON: Understanding $_POST in PHP
// ------------------------------------------

// ✅ DEFINITION:
// The $_POST superglobal is an associative array in PHP used to collect form data
// sent with the HTTP POST method. Unlike $_GET, the data is NOT visible in the URL.

// ✅ When to Use:
// Use $_POST when sending sensitive information (like passwords), or large data (like messages).

// 🧪 EXAMPLE FORM:
// Let's first define a form. Save this file and open in your browser.
// The form will send data to the same file using POST method.
?>

<!-- 🧾 HTML FORM that sends data using POST method -->
<form method="post" action="">
    <label>Name: <input type="text" name="name" /></label><br><br>
    <label>Age: <input type="number" name="age" /></label><br><br>
    <label>Password: <input type="password" name="password" /></label><br><br>
    <input type="submit" value="Send" />
</form>

<?php
// ✅ Check if the form has been submitted using POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // 🔍 Check if 'name' field is set
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        echo "Name: " . htmlspecialchars($name) . "<br>"; 
        // ➜ Example Output: Name: Eric
    }

    // 🔍 Check if 'age' field is set
    if (isset($_POST['age'])) {
        $age = $_POST['age'];
        echo "Age: " . htmlspecialchars($age) . "<br>"; 
        // ➜ Example Output: Age: 25
    }

    // 🔍 Check if 'password' field is set
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        echo "Password: " . str_repeat("*", strlen($password)) . "<br>"; 
        // ➜ Example Output: Password: ********
        // This masks the password in the output for security
    }

    // 📦 Loop through the $_POST array to list all submitted values
    echo "<h3>All POST Data:</h3>";
    foreach ($_POST as $key => $value) {
        echo $key . " = " . htmlspecialchars($value) . "<br>";
        // ➜ Outputs each key-value pair like:
        // name = Eric
        // age = 25
    }

} else {
    // This message appears before submitting the form
    echo "<p>Please fill out the form above and submit it.</p>";
}
?>
