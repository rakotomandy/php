<?php
// =====================================================
// LESSON: PHP DATA TYPES & TYPE CASTING (TYPE CONVERSION)
// =====================================================


// ----------------------------------------
// 1. SCALAR DATA TYPES
// ----------------------------------------

// STRING — A sequence of characters
$name = "Alice";
echo "String: $name\n";

// INTEGER — Whole numbers (no decimal)
$age = 25;
echo "Integer: $age\n";

// FLOAT (or DOUBLE) — Decimal numbers
$height = 5.7;
echo "Float: $height\n";

// BOOLEAN — True or false
$isMarried = false;
echo "Boolean: " . ($isMarried ? "Yes" : "No") . "\n";



// ----------------------------------------
// 2. COMPOUND DATA TYPES
// ----------------------------------------

// ARRAY — Collection of values (indexed or associative)
$colors = ["Red", "Green", "Blue"];
echo "Array:\n";
print_r($colors);

// ASSOCIATIVE ARRAY — Key-value pairs
$user = ["name" => "Bob", "email" => "bob@example.com"];
echo "Associative Array:\n";
print_r($user);

// OBJECT — Instance of a class
class Person {
    public $name = "John";
    public $age = 40;
}
$p = new Person();
echo "Object:\n";
print_r($p);

// NULL — Represents no value
$unknown = null;
echo "NULL value: ";
var_dump($unknown);



// ----------------------------------------
// 3. SPECIAL DATA TYPES
// ----------------------------------------

// RESOURCE — Special variable for file, DB, etc.
$file = fopen("php://memory", "r"); // Temporary file stream
echo "Resource: ";
var_dump($file);
fclose($file);



// ----------------------------------------
// 4. TYPE CASTING (CONVERTING TYPES)
// ----------------------------------------

// PHP can automatically convert types (type juggling),
// but you can also manually cast (type casting)

// Example 1: String to Integer
$val = "100 apples";
$intVal = (int)$val; // Stops reading at first non-numeric character
echo "String to Integer: $intVal\n"; // Outputs 100

// Example 2: Float to Integer
$floatVal = 9.99;
$intCast = (int)$floatVal; // Drops the decimal part
echo "Float to Integer: $intCast\n"; // Outputs 9

// Example 3: Boolean to String
$bool = true;
$strBool = (string)$bool; // true becomes "1", false becomes ""
echo "Boolean to String: '$strBool'\n"; // Outputs '1'

// Example 4: Integer to Boolean
$num = 0;
$boolCast = (bool)$num; // 0 becomes false, anything else is true
echo "Integer to Boolean: " . ($boolCast ? "true" : "false") . "\n";

// Example 5: Array to Object
$arr = ["x" => 1, "y" => 2];
$obj = (object)$arr;
echo "Array to Object:\n";
print_r($obj);

// Example 6: Object to Array
$arrayAgain = (array)$obj;
echo "Object to Array:\n";
print_r($arrayAgain);



// ----------------------------------------
// 5. GETTING VARIABLE TYPE
// ----------------------------------------

// Use gettype() to get the data type of a variable
echo "Type of \$height: " . gettype($height) . "\n"; // float
echo "Type of \$colors: " . gettype($colors) . "\n"; // array



// ----------------------------------------
// 6. TYPE CHECKING FUNCTIONS
// ----------------------------------------

// These functions return true or false depending on the type
echo "Is \$name a string? " . (is_string($name) ? "Yes" : "No") . "\n";
echo "Is \$age an integer? " . (is_int($age) ? "Yes" : "No") . "\n";
echo "Is \$height a float? " . (is_float($height) ? "Yes" : "No") . "\n";
echo "Is \$colors an array? " . (is_array($colors) ? "Yes" : "No") . "\n";
echo "Is \$p an object? " . (is_object($p) ? "Yes" : "No") . "\n";
echo "Is \$unknown null? " . (is_null($unknown) ? "Yes" : "No") . "\n";



// ----------------------------------------
// 7. PHP WEAK TYPING (TYPE JUGGLING)
// ----------------------------------------

// PHP automatically changes types when needed

$sum = "5" + 10; // string "5" becomes integer 5
echo "Auto type conversion (string + int): $sum\n"; // Outputs 15

$logic = "0" == false; // string "0" is equal to false
echo "Is '0' == false? " . ($logic ? "Yes" : "No") . "\n"; // Yes

// Use === to avoid type juggling (strict comparison)
echo "Is '0' === false? " . ("0" === false ? "Yes" : "No") . "\n"; // No



// ----------------------------------------
// 8. PHP 7+ SCALAR TYPE HINTS (STRICT TYPING)
// ----------------------------------------

// You can optionally use type declarations in PHP 7+
// Note: Use declare(strict_types=1); at the top for strict mode

function multiply(int $a, int $b): int {
    return $a * $b;
}

$result = multiply(3, 4);
echo "Multiply Result: $result\n"; // 12

?>
