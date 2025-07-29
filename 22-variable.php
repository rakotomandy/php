<?php
// ==================================================
// LESSON: PHP VARIABLES AND ACCESSIBILITY (SCOPE)
// ==================================================

// -----------------------------------------
// 1. DECLARING VARIABLES
// -----------------------------------------

// This is a string variable
$name = "Alice";

// This is an integer variable
$age = 30;

// This is a float (decimal) variable
$height = 5.6;

// This is a boolean variable (true or false)
$isStudent = true;

// This is an array variable
$skills = ["PHP", "JavaScript", "HTML"];

// Display all variables using echo or print_r
echo "Name: $name\n";
echo "Age: $age\n";
echo "Height: $height\n";
echo "Is Student: " . ($isStudent ? "Yes" : "No") . "\n";

// Use print_r to show an array
print_r($skills);



// -----------------------------------------
// 2. VARIABLE SCOPE (ACCESSIBILITY)
// -----------------------------------------

// Scope means where a variable is accessible in your program
// PHP has three main scopes: LOCAL, GLOBAL, and STATIC


// ------------------------
// LOCAL SCOPE
// ------------------------

function localExample() {
    // This variable exists only inside this function
    $message = "Hello from inside the function";
    echo $message . "\n";
}

localExample(); // Call the function

// Uncommenting the next line will cause an error because $message is not accessible here
// echo $message;



// ------------------------
// GLOBAL SCOPE
// ------------------------

// This variable is declared in the global scope (outside any function)
$site = "ChatGPT";

function showSite() {
    // Trying to access $site directly will not work (scope is local here)
    // echo $site; // ❌ This would cause an "undefined variable" error

    // Use the 'global' keyword to access global variables
    global $site;
    echo "Welcome to $site\n"; // ✅ Now it works
}

showSite();



// ------------------------
// GLOBALS ARRAY (alternative to global keyword)
// ------------------------

$country = "Madagascar";

function showCountry() {
    // Access global variable using $GLOBALS superglobal array
    echo "Country: " . $GLOBALS['country'] . "\n";
}

showCountry();



// ------------------------
// STATIC SCOPE
// ------------------------

function counter() {
    // Static variable keeps its value between function calls
    static $count = 0;

    // Increment the counter each time the function is called
    $count++;
    echo "Count is $count\n";
}

// Call function multiple times
counter(); // Count is 1
counter(); // Count is 2
counter(); // Count is 3



// -----------------------------------------
// 3. VARIABLE VARIABLES
// -----------------------------------------

// You can use a variable to name another variable
$animal = "dog";
$dog = "Bark bark!";

// Now access $dog using $$animal
echo $$animal . "\n"; // Outputs "Bark bark!"



// -----------------------------------------
// 4. CONSTANTS (not variables, but fixed values)
// -----------------------------------------

// Define a constant using define()
define("PI", 3.1416);

// Constants do not use $ and cannot be changed
echo "The value of PI is " . PI . "\n";

// define() can also protect you from re-defining
define("SITE_NAME", "MyWebsite");

// Uncommenting this would give an error
// define("SITE_NAME", "AnotherWebsite"); ❌



// -----------------------------------------
// 5. SUMMARY
// -----------------------------------------

/*
VARIABLE TYPES:
- $var = "string";
- $var = 123;         // integer
- $var = 12.5;        // float
- $var = true/false;  // boolean
- $var = [..];        // array

SCOPE TYPES:
- LOCAL: Only inside function
- GLOBAL: Declared outside function
- STATIC: Persists across function calls

KEYWORDS:
- global $var;       // access global inside function
- static $var;       // persistent variable inside function
- $GLOBALS['var'];   // global access alternative
*/

?>
