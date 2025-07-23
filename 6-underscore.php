# Creating a PHP lesson file that explains underscore-prefixed and double-underscore-prefixed functions
php_lesson = """<?php
/**
 * 📘 PHP Lesson: Underscore (_) and Double Underscore (__) Functions
 *
 * This file explains functions in PHP that begin with _ and __,
 * including their meanings, examples, and when to use them.
 */

// ------------------------------------
// 1. _() Function (Single Underscore)
// ------------------------------------
// ✅ Alias of gettext() — used for translation/localization.
// It returns the translated string if set up properly.
echo _("Hello"); // Output: "Hello" unless translation is set

// ------------------------------------
// 2. __construct() Method (Double Underscore)
// ------------------------------------
// ✅ Called when an object is instantiated (constructor).
class Car {
    public function __construct() {
        echo "Car created!\\n";
    }
}
$car = new Car(); // Output: "Car created!"

// ------------------------------------
// 3. __destruct() Method
// ------------------------------------
// ✅ Called when the object is destroyed or script ends.
class Test {
    public function __destruct() {
        echo "Object destroyed.\\n";
    }
}
$obj = new Test(); // Output will appear at script end

// ------------------------------------
// 4. __call() Method
// ------------------------------------
// ✅ Triggered when calling inaccessible or non-existent method.
class Magic {
    public function __call($name, $arguments) {
        echo "Method '$name' does not exist.\\n";
    }
}
$m = new Magic();
$m->foo(); // Output: Method 'foo' does not exist.

// ------------------------------------
// 5. __callStatic() Method
// ------------------------------------
// ✅ Triggered on inaccessible/non-existent static method.
class StaticMagic {
    public static function __callStatic($name, $args) {
        echo "Static method '$name' is not defined.\\n";
    }
}
StaticMagic::bar(); // Output: Static method 'bar' is not defined.

// ------------------------------------
// 6. __get() and __set() Methods
// ------------------------------------
// ✅ Used to get/set inaccessible properties dynamically.
class Person {
    private $data = [];
    public function __get($name) {
        return $this->data[$name] ?? "Not Found";
    }
    public function __set($name, $value) {
        $this->data[$name] = $value;
    }
}
$p = new Person();
$p->name = "John";
echo $p->name; // Output: John

// ------------------------------------
// 7. __isset() and __unset()
// ------------------------------------
// ✅ Handle isset() or unset() on inaccessible properties.
class Book {
    private $props = ['title' => 'PHP Basics'];
    public function __isset($name) {
        return isset($this->props[$name]);
    }
    public function __unset($name) {
        unset($this->props[$name]);
    }
}
$b = new Book();
var_dump(isset($b->title)); // true

// ------------------------------------
// 8. __toString()
// ------------------------------------
// ✅ Defines what happens when an object is used in a string context.
class Stringable {
    public function __toString() {
        return "I am a string now.";
    }
}
$s = new Stringable();
echo $s; // Output: I am a string now.

// ------------------------------------
// 9. __invoke()
// ------------------------------------
// ✅ Triggered when object is called like a function.
class CallableClass {
    public function __invoke($x) {
        return $x * 2;
    }
}
$c = new CallableClass();
echo $c(5); // Output: 10

// ------------------------------------
// 10. __debugInfo()
// ------------------------------------
// ✅ Customizes var_dump() output.
class Debuggable {
    private $secret = "hidden";
    public function __debugInfo() {
        return ["visible" => "shown"];
    }
}
var_dump(new Debuggable()); // Output: array with "visible" key

// ------------------------------------
// 11. __clone()
// ------------------------------------
// ✅ Called when object is cloned.
class Cloneable {
    public function __clone() {
        echo "Object cloned!\\n";
    }
}
$original = new Cloneable();
$copy = clone $original; // Output: Object cloned!

// ------------------------------------
// 12. __sleep() and __wakeup()
// ------------------------------------
// ✅ Used in serialization and unserialization.
class Session {
    public $name = "session";
    public function __sleep() {
        return ['name'];
    }
    public function __wakeup() {
        echo "Waking up\\n";
    }
}
$s = new Session();
$serialized = serialize($s);
$un = unserialize($serialized); // Output: Waking up

// ------------------------------------
// 13. __set_state()
// ------------------------------------
// ✅ Called for var_export() to recreate object.
class Exportable {
    public $x;
    public static function __set_state($array) {
        $obj = new self;
        $obj->x = $array['x'];
        return $obj;
    }
}
eval('$obj = ' . var_export(new Exportable(), true) . ';');

// ------------------------------------
// 14. __autoload() (deprecated)
// ------------------------------------
// ✅ Used to autoload classes before PHP 7.2. Use spl_autoload_register() now.

// ------------------------------------
// 15. __serialize() and __unserialize() (PHP 7.4+)
// ------------------------------------
// ✅ Used for custom serialization logic.
class CustomSerializable {
    private $value = "test";
    public function __serialize(): array {
        return ['value' => $this->value];
    }
    public function __unserialize(array $data): void {
        $this->value = $data['value'];
    }
}
$cs = new CustomSerializable();
$ser = serialize($cs);
unserialize($ser);

?>
"""