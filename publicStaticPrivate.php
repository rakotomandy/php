<?php
// ============================================
// PHP LESSON: public, private, and static
// ============================================

// We define a class called "Person"
class Person {
    
    // --------------------------------------------
    // PUBLIC PROPERTY
    // Accessible from anywhere: inside or outside the class
    // --------------------------------------------
    public $name;

    // --------------------------------------------
    // PRIVATE PROPERTY
    // Accessible only from *within* the class itself
    // Not accessible directly from outside
    // --------------------------------------------
    private $ssn; // Social Security Number (example)

    // --------------------------------------------
    // STATIC PROPERTY
    // Belongs to the class itself, not to any object
    // Shared across all instances
    // Accessed using self::$propertyName or ClassName::$propertyName
    // --------------------------------------------
    public static $species = "Human";

    // --------------------------------------------
    // CONSTRUCTOR
    // This special function is called automatically when the object is created
    // It initializes properties with given values
    // --------------------------------------------
    public function __construct($name, $ssn) {
        $this->name = $name;   // Set public property
        $this->ssn = $ssn;     // Set private property
    }

    // --------------------------------------------
    // PUBLIC METHOD
    // Can be accessed from anywhere
    // This method returns the private SSN securely
    // --------------------------------------------
    public function getSSN() {
        return "The SSN is: " . $this->ssn;
    }

    // --------------------------------------------
    // PRIVATE METHOD
    // Can only be called *within* the class
    // Not accessible directly from an object
    // --------------------------------------------
    private function encryptSSN() {
        return strrev($this->ssn); // Just a fake encryption by reversing string
    }

    // --------------------------------------------
    // PUBLIC METHOD THAT CALLS A PRIVATE METHOD
    // Demonstrates internal access to private members
    // --------------------------------------------
    public function getEncryptedSSN() {
        return "Encrypted SSN is: " . $this->encryptSSN();
    }

    // --------------------------------------------
    // STATIC METHOD
    // Can be called without creating an object
    // Used to perform class-level operations
    // --------------------------------------------
    public static function showSpecies() {
        return "Species: " . self::$species;
    }
}

// ============================================
// OBJECT CREATION AND USAGE
// ============================================

// Create a new Person object
$person1 = new Person("Alice", "123-45-6789");

// Access public property
echo $person1->name . "<br>"; // Output: Alice

// Access public method to get private property
echo $person1->getSSN() . "<br>"; // Output: The SSN is: 123-45-6789

// Call a method that internally uses a private method
echo $person1->getEncryptedSSN() . "<br>"; // Output: Encrypted SSN is: 987-65-321

// Access static method without creating object
echo Person::showSpecies() . "<br>"; // Output: Species: Human

// Attempting direct access to private property (will cause error)
// echo $person1->ssn; // ❌ Fatal Error

// Attempting to call private method from outside (will cause error)
// echo $person1->encryptSSN(); // ❌ Fatal Error

// Access static property directly from class
echo Person::$species . "<br>"; // Output: Human

?>
