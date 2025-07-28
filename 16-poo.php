<?php
/*
|--------------------------------------------------------------------------
| PHP Object-Oriented Programming (OOP) - Full Lesson
|--------------------------------------------------------------------------
| This lesson covers the basics of OOP in PHP with detailed comments.
| Definitions and examples are included for: class, object, property,
| method, constructor, visibility, inheritance, etc.
*/

/*
|------------------------------------------------------------------------------
| CLASS
|------------------------------------------------------------------------------
| A class is a blueprint for creating objects. It defines properties (variables)
| and methods (functions) that its objects will have.
*/
class Car {
    // Property: a variable that belongs to the class
    public $brand;
    public $color;

    /*
    |------------------------------------------------------------------------------
    | CONSTRUCTOR METHOD
    |------------------------------------------------------------------------------
    | A special method called automatically when an object is created.
    | It is defined using the __construct() magic method.
    */
    public function __construct($brand, $color) {
        $this->brand = $brand; // $this refers to the current object
        $this->color = $color;
    }

    /*
    |------------------------------------------------------------------------------
    | METHOD
    |------------------------------------------------------------------------------
    | A method is a function defined inside a class.
    */
    public function start() {
        return "The {$this->color} {$this->brand} is starting.";
    }

    /*
    |------------------------------------------------------------------------------
    | GETTER METHOD
    |------------------------------------------------------------------------------
    | Used to get the value of a private or protected property.
    */
    public function getBrand() {
        return $this->brand;
    }

    /*
    |------------------------------------------------------------------------------
    | SETTER METHOD
    |------------------------------------------------------------------------------
    | Used to set the value of a private or protected property.
    */
    public function setBrand($brand) {
        $this->brand = $brand;
    }
}

// Creating an object (instance of the class)
$myCar = new Car("Toyota", "Red");

// Accessing method
echo $myCar->start(); // Output: The Red Toyota is starting.

echo "\\nBrand: " . $myCar->getBrand(); // Output: Brand: Toyota

/*
|------------------------------------------------------------------------------
| INHERITANCE
|------------------------------------------------------------------------------
| A class can inherit properties and methods from another class using 'extends'.
*/
class ElectricCar extends Car {
    public $batteryCapacity;

    public function __construct($brand, $color, $batteryCapacity) {
        parent::__construct($brand, $color); // Call parent constructor
        $this->batteryCapacity = $batteryCapacity;
    }

    public function charge() {
        return "Charging {$this->brand} with {$this->batteryCapacity} kWh battery.";
    }
}

$tesla = new ElectricCar("Tesla", "Blue", 85);
echo "\\n" . $tesla->start(); // Output: The Blue Tesla is starting.
echo "\\n" . $tesla->charge(); // Output: Charging Tesla with 85 kWh battery.

/*
|------------------------------------------------------------------------------
| VISIBILITY
|------------------------------------------------------------------------------
| Controls access to class members:
| - public: accessible from anywhere
| - protected: accessible from within the class and its children
| - private: accessible only within the class
*/
class BankAccount {
    private $balance;

    public function __construct($initialAmount) {
        $this->balance = $initialAmount;
    }

    public function deposit($amount) {
        $this->balance += $amount;
    }

    public function getBalance() {
        return $this->balance;
    }
}

$account = new BankAccount(100);
$account->deposit(50);
echo "\\nBalance: $" . $account->getBalance(); // Output: Balance: $150

/*
|------------------------------------------------------------------------------
| STATIC PROPERTIES & METHODS
|------------------------------------------------------------------------------
| Belong to the class rather than to any object. Accessed using :: syntax.
*/
class MathUtil {
    public static $PI = 3.14159;

    public static function square($num) {
        return $num * $num;
    }
}

echo "\\nPI: " . MathUtil::$PI; // Output: PI: 3.14159
echo "\\nSquare of 4: " . MathUtil::square(4); // Output: Square of 4: 16

/*
|------------------------------------------------------------------------------
| FINAL KEYWORD
|------------------------------------------------------------------------------
| Prevents a class from being inherited or a method from being overridden.
*/
final class FinalExample {
    public function show() {
        return "This class cannot be extended.";
    }
}

// class Test extends FinalExample {} // This would cause an error

/*
|------------------------------------------------------------------------------
| INTERFACES
|------------------------------------------------------------------------------
| An interface defines a contract. Classes that implement it must define its methods.
*/
interface Vehicle {
    public function move();
}

class Bike implements Vehicle {
    public function move() {
        return "The bike is moving.";
    }
}

$bike = new Bike();
echo "\\n" . $bike->move(); // Output: The bike is moving.

?>
