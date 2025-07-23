<?php
/**
 * 📘 PHP Lesson: Namespaces
 *
 * This lesson explains what namespaces are, why we use them,
 * how to declare and use namespaces, and includes examples.
 */

// -------------------------------
// What is a Namespace?
// -------------------------------
// A namespace is like a container for classes, functions, and constants
// that allows us to group code and avoid name collisions.

// Example: Define a namespace
namespace MyProject\Models;

class User {
    public function sayHello() {
        return "Hello from User class inside namespace: " . __NAMESPACE__;
    }
}

// To use the above class outside this namespace, we would refer to it as:
// $user = new \MyProject\Models\User();
// echo $user->sayHello();


// ---------------------------------
// Using Namespace Outside This File
// ---------------------------------

// For demonstration, we simulate usage outside the namespace with fully qualified name:
echo "Using fully qualified class name:\n";
$user = new \MyProject\Models\User();
echo $user->sayHello() . "\n\n";


// -------------------------------
// Using 'use' to Import Namespace
// -------------------------------

// We can import the class using 'use' to avoid typing full namespace each time:
use MyProject\Models\User;

echo "Using 'use' to import class:\n";
$user2 = new User();
echo $user2->sayHello() . "\n\n";


// -------------------------------
// Namespaces with Functions and Constants
// -------------------------------

namespace MyProject\Utils;

function sayHi() {
    // __NAMESPACE__ returns current namespace name
    echo "Hello from function inside namespace: " . __NAMESPACE__ . "\n";
}

const VERSION = '1.0.0';

sayHi();
echo "Version constant: " . VERSION . "\n\n";


// -------------------------------
// Global Namespace
// -------------------------------

// We can access global namespace elements by prefixing with a backslash '\'

namespace {
    echo "Back to global namespace\n";
    // Use fully qualified name to call function inside MyProject\Utils
    \MyProject\Utils\sayHi();

    // Use fully qualified name to access constant inside MyProject\Utils
    echo "Version from global: " . \MyProject\Utils\VERSION . "\n";
}

?>
