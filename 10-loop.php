<?php
/**
 * 📘 PHP Lesson: Looping in PHP
 *
 * PHP offers several ways to loop through code blocks multiple times.
 * This lesson covers:
 * - for loops
 * - while loops
 * - do-while loops
 * - foreach loops (especially for arrays)
 * - break and continue statements
 *
 * Each example includes comments and expected output.
 */

// ===============================
// 1. for Loop
// ===============================
// Repeats a block of code a specified number of times.

echo "1. for Loop:\n";

for ($i = 1; $i <= 5; $i++) {
    echo "Iteration $i\n";
}
/*
Output:
1. for Loop:
Iteration 1
Iteration 2
Iteration 3
Iteration 4
Iteration 5
*/

// ===============================
// 2. while Loop
// ===============================
// Executes the block while the condition is true.

echo "\n2. while Loop:\n";

$j = 1;
while ($j <= 5) {
    echo "Count $j\n";
    $j++;
}
/*
Output:
2. while Loop:
Count 1
Count 2
Count 3
Count 4
Count 5
*/

// ===============================
// 3. do-while Loop
// ===============================
// Executes the block once, then repeats while condition is true.

echo "\n3. do-while Loop:\n";

$k = 1;
do {
    echo "Value $k\n";
    $k++;
} while ($k <= 5);
/*
Output:
3. do-while Loop:
Value 1
Value 2
Value 3
Value 4
Value 5
*/

// ===============================
// 4. foreach Loop (for arrays)
// ===============================
// Special loop to iterate over arrays easily.

echo "\n4. foreach Loop (Indexed Array):\n";

$colors = ["Red", "Green", "Blue"];

foreach ($colors as $color) {
    echo "Color: $color\n";
}
/*
Output:
4. foreach Loop (Indexed Array):
Color: Red
Color: Green
Color: Blue
*/

// Foreach with keys and values for associative arrays
echo "\n4b. foreach Loop (Associative Array):\n";

$person = [
    "name" => "Alice",
    "age" => 28,
    "city" => "Paris"
];

foreach ($person as $key => $value) {
    echo "$key: $value\n";
}
/*
Output:
4b. foreach Loop (Associative Array):
name: Alice
age: 28
city: Paris
*/

// ===============================
// 5. break Statement
// ===============================
// Exits the current loop immediately.

echo "\n5. break Statement:\n";

for ($i = 1; $i <= 10; $i++) {
    if ($i == 4) {
        echo "Breaking at $i\n";
        break; // Exit the loop
    }
    echo "Number: $i\n";
}
/*
Output:
5. break Statement:
Number: 1
Number: 2
Number: 3
Breaking at 4
*/

// ===============================
// 6. continue Statement
// ===============================
// Skips the current iteration and continues with the next.

echo "\n6. continue Statement:\n";

for ($i = 1; $i <= 5; $i++) {
    if ($i == 3) {
        echo "Skipping $i\n";
        continue; // Skip the rest of this iteration
    }
    echo "Processing $i\n";
}
/*
Output:
6. continue Statement:
Processing 1
Processing 2
Skipping 3
Processing 4
Processing 5
*/

// ===============================
// 7. Nested Loops
// ===============================
// Loops inside loops.

echo "\n7. Nested Loops (Multiplication Table 1-3):\n";

for ($a = 1; $a <= 3; $a++) {
    for ($b = 1; $b <= 3; $b++) {
        $product = $a * $b;
        echo "$a x $b = $product\n";
    }
}
/*
Output:
7. Nested Loops (Multiplication Table 1-3):
1 x 1 = 1
1 x 2 = 2
1 x 3 = 3
2 x 1 = 2
2 x 2 = 4
2 x 3 = 6
3 x 1 = 3
3 x 2 = 6
3 x 3 = 9
*/

?>
