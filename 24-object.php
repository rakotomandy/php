<?php
// ==========================================
// PHP OBJECTS LESSON — FULLY COMMENTED FILE
// ==========================================


// -----------------------------------------------------
// 1. DEFINE A CLASS — A template for creating objects
// -----------------------------------------------------

class Person {
    // ------------------------------
    // Public properties (attributes)
    // ------------------------------
    public $name;   // Will hold the person's name
    public $age;    // Will hold the person's age

    // ------------------------------
    // Method to set the properties
    // ------------------------------
    public function setData($personName, $personAge) {
        // Use $this to refer to the current object
        $this->name = $personName;
        $this->age = $personAge;
    }

    // ------------------------------
    // Method to return a greeting
    // ------------------------------
    public function greet() {
        return "Hello, my name is $this->name and I am $this->age years old.";
    }
}



// -----------------------------------------------------
// 2. CREATE OBJECTS FROM THE CLASS
// -----------------------------------------------------

// Create a new Person object called $p1
$p1 = new Person();

// Call the setData method to assign values
$p1->setData("Alice", 28);

// Call the greet method and display the result
echo $p1->greet() . "\n"; // Output: Hello, my name is Alice and I am 28 years old.


// Create another object from the same class
$p2 = new Person();
$p2->setData("Bob", 35);
echo $p2->greet() . "\n"; // Output: Hello, my name is Bob and I am 35 years old.



// -----------------------------------------------------
// 3. OBJECT VISIBILITY — public, private, protected
// -----------------------------------------------------

class BankAccount {
    public $owner;           // Can be accessed anywhere
    private $balance = 0;    // Only accessible inside this class

    // Method to set the owner name
    public function setOwner($name) {
        $this->owner = $name;
    }

    // Method to deposit money into account
    public function deposit($amount) {
        // Add the amount to the balance (private)
        $this->balance += $amount;
    }

    // Method to get the current balance
    public function getBalance() {
        return $this->balance;
    }
}

// Create an account
$account = new BankAccount();
$account->setOwner("Janet");
$account->deposit(100);

// Show balance using a method (because balance is private)
echo $account->owner . " has $" . $account->getBalance() . " in the bank.\n";

// Direct access to private property would cause an error:
// echo $account->balance; ❌ Not allowed



// -----------------------------------------------------
// 4. CONSTRUCTOR METHOD — Automatic setup on creation
// -----------------------------------------------------

class Product {
    public $name;
    public $price;

    // Constructor runs automatically when the object is created
    public function __construct($n, $p) {
        $this->name = $n;
        $this->price = $p;
    }

    public function display() {
        return "$this->name costs $$this->price";
    }
}

// Create a new Product object with constructor
$phone = new Product("iPhone", 999);
echo $phone->display() . "\n"; // Output: iPhone costs $999



// -----------------------------------------------------
// 5. OBJECTS ARE PASSED BY REFERENCE
// -----------------------------------------------------

function changeName($obj) {
    // Modifies the original object's property
    $obj->name = "Changed Name";
}

$p = new Person();
$p->setData("Original Name", 20);
changeName($p);
echo $p->greet() . "\n"; // Output: Hello, my name is Changed Name and I am 20 years old.



// -----------------------------------------------------
// 6. TYPE CHECKING & CONVERTING
// -----------------------------------------------------

// Check if a variable is an object
if (is_object($p)) {
    echo "Yes, \$p is an object.\n";
}

// Convert an array to an object
$arr = ["a" => 1, "b" => 2];
$obj = (object)$arr;
echo $obj->a . "\n"; // Output: 1

// Convert an object to an array
$arrayAgain = (array)$obj;
print_r($arrayAgain); // Shows array format



// -----------------------------------------------------
// 7. OBJECT SUMMARY
// -----------------------------------------------------

/*
An object is a variable based on a class.
A class is a blueprint with:

- Properties (variables) => public, private, protected
- Methods (functions inside the class)
- Use $this to refer to the current object's property/method
- Use -> to access methods and properties
- Objects are passed by reference, not copied
- You can convert between arrays and objects using (object) and (array)
*/

?>
