<?php
// ========================================
// PHP LESSON: MAGIC CONSTANTS
// ========================================
// Magic constants are predefined constants in PHP that change depending on where they are used.
// They are useful for debugging, logging, file tracking, and reflection.
// All magic constants start and end with double underscores __

echo "===========================\n";
echo "PHP MAGIC CONSTANTS DEMO\n";
echo "===========================\n";

// __LINE__ — Returns the current line number in the file
echo "__LINE__ gives the current line number: " . __LINE__ . "\n";

// __FILE__ — Returns the full path and filename of the file
echo "__FILE__ gives the full path of this file: " . __FILE__ . "\n";

// __DIR__ — Returns the directory of the file
echo "__DIR__ gives the directory of this file: " . __DIR__ . "\n";

// __FUNCTION__ — Returns the name of the function
function showFunctionName() {
    echo "Inside function: " . __FUNCTION__ . "\n";
}
showFunctionName(); // Calls the function and prints the function name

// __CLASS__ — Returns the class name (with namespace, if any)
class DemoClass {
    public function displayClassName() {
        // This prints the name of the class
        echo "The class name is: " . __CLASS__ . "\n";
    }

    public function displayMethodName() {
        // __METHOD__ — Returns the class method name (including class)
        echo "The method name is: " . __METHOD__ . "\n";
    }

    public function displayNamespace() {
        // __NAMESPACE__ — Returns the name of the current namespace
        echo "The namespace is: " . __NAMESPACE__ . "\n"; // Empty string if no namespace is used
    }

    public function displayTrait() {
        // __TRAIT__ — Returns the name of the trait used (if any)
        echo "The trait name is: " . __TRAIT__ . "\n"; // Empty string if no trait
    }
}

$demo = new DemoClass();         // Creates an instance of DemoClass
$demo->displayClassName();       // Calls method to print class name
$demo->displayMethodName();      // Calls method to print method name
$demo->displayNamespace();       // Prints the namespace
$demo->displayTrait();           // Prints the trait (if used)

// EXAMPLE WITH NAMESPACE AND TRAIT

namespace MyApp; // Define a namespace

trait MyTrait {
    public function traitFunction() {
        // Inside trait, __TRAIT__ gives the trait name with namespace
        echo "Inside trait function, __TRAIT__ = " . __TRAIT__ . "\n";
    }
}

class MyNamespacedClass {
    use \MyApp\MyTrait; // Use the trait defined above

    public function showMagicConstants() {
        echo "__NAMESPACE__ = " . __NAMESPACE__ . "\n";
        echo "__CLASS__ = " . __CLASS__ . "\n";
        echo "__METHOD__ = " . __METHOD__ . "\n";
        echo "__FUNCTION__ = " . __FUNCTION__ . "\n"; // Returns the actual function name inside class
        $this->traitFunction(); // Call the trait function
    }
}

$obj = new \MyApp\MyNamespacedClass(); // Instantiates the class inside namespace
$obj->showMagicConstants(); // Calls the method to display constants inside namespaced class

?>
