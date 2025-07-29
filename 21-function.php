<?php
// =============================
// PHP FUNCTION & SCOPE LESSON
// =============================

// -----------------------------
// 1. Defining and Calling a Function
// -----------------------------

// This defines a function named greet
function greet() {
    // This line outputs a greeting message when the function is called
    echo "Hello! Welcome to PHP functions.<br>";
}

// This calls the greet function
greet();


// -----------------------------
// 2. Function with Parameters
// -----------------------------

// Define a function that accepts parameters
function greetUser($name) {
    // This outputs a personalized greeting using the parameter
    echo "Hello, $name!<br>";
}

// Call the function with an argument
greetUser("Eric");
greetUser("Janet");


// -----------------------------
// 3. Function with Return Value
// -----------------------------

// Define a function that returns a value
function add($a, $b) {
    // Returns the sum of the two arguments
    return $a + $b;
}

// Store the result in a variable
$sum = add(5, 7);

// Output the result
echo "The sum of 5 and 7 is: $sum<br>";


// -----------------------------
// 4. Default Parameter Values
// -----------------------------

// Define a function with a default parameter
function greetWithTime($name, $time = "day") {
    echo "Good $time, $name!<br>";
}

// Call with both arguments
greetWithTime("Paul", "morning");

// Call with only one argument; time defaults to "day"
greetWithTime("Alice");


// -----------------------------
// 5. Variable Scope
// -----------------------------

// Global variable
$globalVar = "I am global";

// Define a function to show local vs global scope
function checkScope() {
    // Local variable (only accessible within this function)
    $localVar = "I am local";

    // This will cause an error if we try to access $globalVar directly
    // echo $globalVar;

    // To access a global variable, use the global keyword
    global $globalVar;

    echo "$globalVar (accessed inside function using 'global')<br>";
    echo "$localVar (local inside function)<br>";
}

checkScope();

// Trying to access $localVar here will cause an error because it's out of scope
// echo $localVar;


// -----------------------------
// 6. Static Variable
// -----------------------------

function countCalls() {
    // Static variable retains its value between function calls
    static $count = 0;

    // Increment the static variable
    $count++;

    // Output the number of times the function has been called
    echo "Function has been called $count time(s).<br>";
}

// Call the function multiple times
countCalls();
countCalls();
countCalls();


// -----------------------------
// 7. Anonymous Functions (Closures)
// -----------------------------

// Assign an anonymous function to a variable
$greetAnonymous = function($name) {
    echo "Hello from anonymous function, $name!<br>";
};

// Call the anonymous function
$greetAnonymous("Charlie");


// -----------------------------
// 8. Arrow Functions (PHP 7.4+)
// -----------------------------

// Arrow functions have a simpler syntax and inherit variables from parent scope
$square = fn($n) => $n * $n;

echo "Square of 4 is " . $square(4) . "<br>";
?>
