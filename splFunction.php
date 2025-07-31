# Create a .php file containing all SPL functions with definitions, examples, and outputs

spl_functions_php = """<?php
/*
========================================================
      PHP SPL (Standard PHP Library) FUNCTIONS
========================================================
Each section includes:
- Function/class definition
- Description
- Example usage
- Expected output
*/

// ========================================================
// 1. spl_autoload_register()
// --------------------------------------------------------
/*
Registers a function as __autoload() implementation. Used to load classes automatically.
*/
function myAutoloader($class) {
    include $class . '.php';
}
spl_autoload_register('myAutoloader');
// When you instantiate a class, PHP will now call myAutoloader($class)

// ========================================================
// 2. spl_autoload_unregister()
// --------------------------------------------------------
/*
Unregisters a previously registered autoload function.
*/
spl_autoload_unregister('myAutoloader');

// ========================================================
// 3. spl_autoload_functions()
// --------------------------------------------------------
/*
Returns all registered __autoload functions.
*/
print_r(spl_autoload_functions()); // Output: Array of current autoloaders

// ========================================================
// 4. spl_autoload_call()
// --------------------------------------------------------
/*
Tries to load a class using all registered __autoload functions.
*/
// Example: spl_autoload_call('MyClass');

// ========================================================
// 5. class_parents()
// --------------------------------------------------------
/*
Returns an array containing the names of all parent classes of a class.
*/
class A {}
class B extends A {}
print_r(class_parents(new B)); // Output: Array ( [A] => A )

// ========================================================
// 6. class_implements()
// --------------------------------------------------------
/*
Returns all interfaces implemented by a class or object.
*/
interface TestInterface {}
class C implements TestInterface {}
print_r(class_implements(new C)); // Output: Array ( [TestInterface] => TestInterface )

// ========================================================
// 7. class_uses()
// --------------------------------------------------------
/*
Returns traits used by a class.
*/
trait T {}
class D {
    use T;
}
print_r(class_uses('D')); // Output: Array ( [T] => T )

// ========================================================
// 8. iterator_to_array()
// --------------------------------------------------------
/*
Copies the elements of an iterator into an array.
*/
$iterator = new ArrayIterator(["a" => 1, "b" => 2]);
print_r(iterator_to_array($iterator)); // Output: Array ( [a] => 1 [b] => 2 )

// ========================================================
// 9. iterator_count()
// --------------------------------------------------------
/*
Counts the elements in an iterator.
*/
$iterator = new ArrayIterator([10, 20, 30]);
echo iterator_count($iterator); // Output: 3

// ========================================================
// 10. iterator_apply()
// --------------------------------------------------------
/*
Calls a function on each element of an iterator.
*/
function printValue($iterator) {
    echo $iterator->current() . " ";
    return true;
}
$iterator = new ArrayIterator([1, 2, 3]);
iterator_apply($iterator, 'printValue', [$iterator]); // Output: 1 2 3

// ========================================================
// 11. spl_object_hash()
// --------------------------------------------------------
/*
Returns a unique identifier for the object.
*/
$obj = new stdClass();
echo spl_object_hash($obj); // Output: unique hash like 00000000446c0b450000000059d2ed23

// ========================================================
// 12. spl_object_id()
// --------------------------------------------------------
/*
Returns the unique ID for an object (PHP 7.2+).
*/
$obj = new stdClass();
echo spl_object_id($obj); // Output: e.g. 1, 2, etc.

?>