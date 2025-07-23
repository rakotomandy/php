<?php
/**
 * 📘 PHP Lesson: Arrays in PHP with Full Comments and Outputs
 *
 * Arrays in PHP are variables that can hold multiple values.
 * They can be indexed arrays (numeric keys), associative arrays (string keys),
 * or multidimensional arrays (arrays inside arrays).
 *
 * This lesson shows examples of all types and common array functions,
 * with comments explaining each line and the expected output.
 */

// ===============================
// 1. Indexed Arrays
// ===============================
// Indexed arrays use numeric keys starting from 0 by default.

$fruits = ["Apple", "Banana", "Cherry"]; // Define an indexed array
// Equivalent using old array() syntax:
// $fruits = array("Apple", "Banana", "Cherry");

// Access elements by index
echo "First fruit: " . $fruits[0] . "\n"; // Output: First fruit: Apple

// Add element at the end by using empty brackets []
$fruits[] = "Date"; // Adds "Date" at index 3

// Print the whole array to see all elements
echo "Fruits array:\n";
print_r($fruits);
/*
Output:
Fruits array:
Array
(
    [0] => Apple
    [1] => Banana
    [2] => Cherry
    [3] => Date
)
*/

// ===============================
// 2. Associative Arrays
// ===============================
// Associative arrays use named keys (strings).

$person = [
    "name" => "John",
    "age" => 30,
    "city" => "New York"
];

// Access by key
echo "Person's name: " . $person["name"] . "\n"; // Output: Person's name: John

// Add a new key-value pair
$person["email"] = "john@example.com";

// Print whole associative array
echo "Person array:\n";
print_r($person);
/*
Output:
Person array:
Array
(
    [name] => John
    [age] => 30
    [city] => New York
    [email] => john@example.com
)
*/

// ===============================
// 3. Multidimensional Arrays
// ===============================
// Arrays that contain other arrays (nested arrays).

$users = [
    ["name" => "Alice", "age" => 25],
    ["name" => "Bob", "age" => 28],
    ["name" => "Charlie", "age" => 32]
];

// Access nested array values by chaining keys
echo "Second user's name: " . $users[1]["name"] . "\n"; // Output: Second user's name: Bob

// Loop through multidimensional array
echo "All users:\n";
foreach ($users as $user) {
    echo $user["name"] . " is " . $user["age"] . " years old.\n";
}
/*
Output:
All users:
Alice is 25 years old.
Bob is 28 years old.
Charlie is 32 years old.
*/

// ===============================
// 4. Common Array Functions
// ===============================

// Count elements in an array
echo "Total fruits: " . count($fruits) . "\n"; // Output: Total fruits: 4

// Check if a key exists in an array
if (array_key_exists("age", $person)) {
    echo "Key 'age' exists in person array\n"; // Output: Key 'age' exists in person array
}

// Check if a value exists in an array
if (in_array("Banana", $fruits)) {
    echo "Banana found in fruits array\n"; // Output: Banana found in fruits array
}

// Get all keys of an associative array
$keys = array_keys($person);
echo "Keys in person array:\n";
print_r($keys);
/*
Output:
Keys in person array:
Array
(
    [0] => name
    [1] => age
    [2] => city
    [3] => email
)
*/

// Get all values of an array
$values = array_values($person);
echo "Values in person array:\n";
print_r($values);
/*
Output:
Values in person array:
Array
(
    [0] => John
    [1] => 30
    [2] => New York
    [3] => john@example.com
)
*/

// Merge two arrays
$moreFruits = ["Elderberry", "Fig"];
$allFruits = array_merge($fruits, $moreFruits);
echo "All fruits after merge:\n";
print_r($allFruits);
/*
Output:
All fruits after merge:
Array
(
    [0] => Apple
    [1] => Banana
    [2] => Cherry
    [3] => Date
    [4] => Elderberry
    [5] => Fig
)
*/

// Sort an indexed array (ascending order)
sort($fruits);
echo "Fruits after sort():\n";
print_r($fruits);
/*
Output:
Fruits after sort():
Array
(
    [0] => Apple
    [1] => Banana
    [2] => Cherry
    [3] => Date
)
*/

// Reverse an array
$reversedFruits = array_reverse($fruits);
echo "Fruits after array_reverse():\n";
print_r($reversedFruits);
/*
Output:
Fruits after array_reverse():
Array
(
    [0] => Date
    [1] => Cherry
    [2] => Banana
    [3] => Apple
)
*/

// ===============================
// 5. Looping Through Arrays
// ===============================

// Loop through associative array with keys and values
echo "Person array elements:\n";
foreach ($person as $key => $value) {
    echo "$key => $value\n";
}
/*
Output:
Person array elements:
name => John
age => 30
city => New York
email => john@example.com
*/

// ===============================
// 6. Removing Elements from Arrays
// ===============================

// Remove last element from array and return it
$lastFruit = array_pop($fruits);
echo "Removed last fruit: $lastFruit\n"; // Output: Removed last fruit: Date
echo "Fruits now:\n";
print_r($fruits);
/*
Output:
Fruits now:
Array
(
    [0] => Apple
    [1] => Banana
    [2] => Cherry
)
*/

// Remove first element from array and return it
$firstFruit = array_shift($fruits);
echo "Removed first fruit: $firstFruit\n"; // Output: Removed first fruit: Apple
echo "Fruits now:\n";
print_r($fruits);
/*
Output:
Fruits now:
Array
(
    [0] => Banana
    [1] => Cherry
)
*/

// ===============================
// 7. Adding Elements at Beginning or End
// ===============================

// Add element at the beginning
array_unshift($fruits, "Apricot");
echo "Fruits after adding 'Apricot' at start:\n";
print_r($fruits);
/*
Output:
Fruits after adding 'Apricot' at start:
Array
(
    [0] => Apricot
    [1] => Banana
    [2] => Cherry
)
*/

// Add element at the end
array_push($fruits, "Grape");
echo "Fruits after adding 'Grape' at end:\n";
print_r($fruits);
/*
Output:
Fruits after adding 'Grape' at end:
Array
(
    [0] => Apricot
    [1] => Banana
    [2] => Cherry
    [3] => Grape
)
*/

// ===============================
// 8. Explode and Implode Functions
// ===============================

// Explode: split string into array by delimiter
$colorString = "red,green,blue";
$colors = explode(",", $colorString);
echo "Colors array from explode():\n";
print_r($colors);
/*
Output:
Colors array from explode():
Array
(
    [0] => red
    [1] => green
    [2] => blue
)
*/

// Implode: join array elements into a string with glue
$joinedColors = implode(" | ", $colors);
echo "Joined colors string from implode(): $joinedColors\n"; // Output: Joined colors string from implode(): red | green | blue

// ===============================
// 9. Associative Array Sorting
// ===============================

// Sort associative array by values, maintaining key association
asort($person);
echo "Person array sorted by values (asort):\n";
print_r($person);
/*
Output:
Person array sorted by values (asort):
Array
(
    [age] => 30
    [city] => New York
    [email] => john@example.com
    [name] => John
)
*/

// Sort associative array by keys
ksort($person);
echo "Person array sorted by keys (ksort):\n";
print_r($person);
/*
Output:
Person array sorted by keys (ksort):
Array
(
    [age] => 30
    [city] => New York
    [email] => john@example.com
    [name] => John
)
*/

// ===============================
// 10. Filtering Arrays
// ===============================

// Filter numbers array for even values using callback function
$numbers = [1, 2, 3, 4, 5, 6];
$evenNumbers = array_filter($numbers, function($num) {
    return $num % 2 === 0; // Keep only even numbers
});
echo "Even numbers after array_filter():\n";
print_r($evenNumbers);
/*
Output:
Even numbers after array_filter():
Array
(
    [1] => 2
    [3] => 4
    [5] => 6
)
*/

// ===============================
// 11. Mapping Arrays
// ===============================

// Apply a function to each array element
$squares = array_map(function($num) {
    return $num * $num;
}, $numbers);
echo "Squares of numbers using array_map():\n";
print_r($squares);
/*
Output:
Squares of numbers using array_map():
Array
(
    [0] => 1
    [1] => 4
    [2] => 9
    [3] => 16
    [4] => 25
    [5] => 36
)
*/

// ===============================
// 12. Reducing Arrays
// ===============================

// Reduce array to a single value (sum in this case)
$sum = array_reduce($numbers, function($carry, $item) {
    return $carry + $item;
}, 0);
echo "Sum of numbers using array_reduce(): $sum\n"; // Output: Sum of numbers using array_reduce(): 21

?>
