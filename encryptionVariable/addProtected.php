<?php
// ===================================================
// PHP OOP ACCESS MODIFIERS LESSON
// ===================================================
// We will learn about: public, private, protected, and static
// Each access modifier determines how properties/methods can be accessed

// Declare a class to demonstrate the access modifiers
class Animal {
    // PUBLIC PROPERTY
    // Can be accessed anywhere — inside or outside the class
    public $name = "Unknown Animal";

    // PROTECTED PROPERTY
    // Can be accessed inside this class and any subclass (child)
    protected $species = "Unknown Species";

    // PRIVATE PROPERTY
    // Can only be accessed within this class, NOT from child classes
    private $secretCode = "X123";

    // STATIC PROPERTY
    // Belongs to the class itself, not to any instance (object)
    // Accessed using ClassName::$propertyName
    public static $kingdom = "Animalia";

    // PUBLIC METHOD
    public function showDetails() {
        // Accessing all properties within the class (this is allowed)
        echo "Name: " . $this->name . "<br>";
        echo "Species: " . $this->species . "<br>";
        echo "Secret Code: " . $this->secretCode . "<br>";
    }

    // PROTECTED METHOD
    // Only accessible within this class and subclasses
    protected function showProtectedMessage() {
        echo "This is a protected message.<br>";
    }

    // PRIVATE METHOD
    // Only accessible within this class
    private function showPrivateMessage() {
        echo "This is a private message.<br>";
    }

    // PUBLIC method to call the private method internally
    public function callPrivateMethod() {
        // Allowed because it's called inside the same class
        $this->showPrivateMessage();
    }

    // STATIC METHOD
    // Can be called without creating an object
    public static function showKingdom() {
        echo "Kingdom: " . self::$kingdom . "<br>"; // use self:: inside class
    }
}

// =============== OBJECT INSTANTIATION ===============
$animal = new Animal();

// Accessing public property
echo $animal->name . "<br>"; // Allowed: public

// Calling a public method that accesses all properties
$animal->showDetails(); // Allowed: calls internal public method

// Calling a method that accesses private method inside
$animal->callPrivateMethod(); // Allowed

// Accessing static property directly from the class
echo Animal::$kingdom . "<br>"; // Allowed

// Calling static method
Animal::showKingdom(); // Allowed

// ================== EXTENDING THE CLASS ==================
class Dog extends Animal {
    public function showDogDetails() {
        // $this->name => public, accessible
        echo "Dog's Name: " . $this->name . "<br>"; // Allowed

        // $this->species => protected, accessible in subclass
        echo "Dog's Species: " . $this->species . "<br>"; // Allowed

        // $this->secretCode => private, NOT accessible in subclass
        // echo $this->secretCode; // ❌ This will cause a fatal error

        // $this->showProtectedMessage(); => Allowed in subclass
        $this->showProtectedMessage();

        // $this->showPrivateMessage(); => ❌ Not allowed in subclass
        // $this->showPrivateMessage(); // ❌ Fatal error
    }
}

// Create a new Dog object
$dog = new Dog();
$dog->showDogDetails();

// =================== SUMMARY ===================
/*
Access Modifier Rules:

1. public:
   - Accessible from anywhere (inside class, outside class, subclasses)
2. protected:
   - Accessible inside the class and subclasses
   - NOT accessible from outside the class
3. private:
   - Accessible only inside the class where it's declared
   - NOT accessible in subclasses or outside
4. static:
   - Belongs to the class itself, not to instances
   - Use ClassName::$property or ClassName::method()
   - Use self::$property or self::method() inside the class

*/

?>
