<?php
// ===================
// 📚 PHP Math Functions Full Lesson
// ===================

// ✅ 1. Arithmetic Operations
echo "1. Arithmetic operations:\n";

$a = 10;
$b = 3;

echo "Addition: \$a + \$b = " . ($a + $b) . "\n";             // 13
echo "Subtraction: \$a - \$b = " . ($a - $b) . "\n";         // 7
echo "Multiplication: \$a * \$b = " . ($a * $b) . "\n";      // 30
echo "Division: \$a / \$b = " . ($a / $b) . "\n";            // 3.333...
echo "Modulus: \$a % \$b = " . ($a % $b) . "\n";             // 1
echo "Power: pow(\$a, \$b) = " . pow($a, $b) . "\n";         // 1000

// ✅ 2. Absolute Value
echo "\n2. Absolute value:\n";
echo "abs(-5) = " . abs(-5) . "\n";   // 5

// ✅ 3. Rounding Functions
echo "\n3. Rounding:\n";
echo "round(3.456) = " . round(3.456) . "\n";                    // 3
echo "round(3.456, 2) = " . round(3.456, 2) . "\n";              // 3.46
echo "ceil(3.1) = " . ceil(3.1) . "\n";                          // 4 (round up)
echo "floor(3.9) = " . floor(3.9) . "\n";                        // 3 (round down)

// ✅ 4. Max / Min
echo "\n4. Max / Min:\n";
echo "max(1, 3, 2) = " . max(1, 3, 2) . "\n";                    // 3
echo "min(1, 3, 2) = " . min(1, 3, 2) . "\n";                    // 1

// ✅ 5. Square Root
echo "\n5. Square root:\n";
echo "sqrt(16) = " . sqrt(16) . "\n";                           // 4

// ✅ 6. Exponentials and Logs
echo "\n6. Exponentials and logs:\n";
echo "exp(1) = " . exp(1) . "\n";                               // e ≈ 2.718...
echo "log(2.7183) = " . log(2.7183) . "\n";                     // 1 (natural log)
echo "log10(1000) = " . log10(1000) . "\n";                     // 3 (base-10 log)

// ✅ 7. Trigonometry (radians)
echo "\n7. Trigonometry:\n";
echo "sin(0) = " . sin(0) . "\n";                               // 0
echo "cos(0) = " . cos(0) . "\n";                               // 1
echo "tan(0) = " . tan(0) . "\n";                               // 0

// ✅ 8. Angle Conversion
echo "\n8. Angle conversion:\n";
echo "deg2rad(180) = " . deg2rad(180) . "\n";                   // 3.1415...
echo "rad2deg(3.1415) = " . rad2deg(3.1415) . "\n";             // ~180

// ✅ 9. Random Numbers
echo "\n9. Random numbers:\n";
echo "rand() = " . rand() . "\n";                               // random int
echo "rand(1, 100) = " . rand(1, 100) . "\n";                   // random between 1 and 100
echo "mt_rand(1, 100) = " . mt_rand(1, 100) . "\n";             // faster random

// ✅ 10. Base Conversion
echo "\n10. Base conversion:\n";
echo "bindec('1010') = " . bindec('1010') . "\n";               // binary to decimal (10)
echo "decbin(10) = " . decbin(10) . "\n";                       // decimal to binary (1010)
echo "dechex(255) = " . dechex(255) . "\n";                     // 255 to hex (ff)
echo "hexdec('ff') = " . hexdec('ff') . "\n";                   // ff to decimal (255)
echo "decoct(8) = " . decoct(8) . "\n";                         // 10
echo "octdec('10') = " . octdec('10') . "\n";                   // 8

// ✅ 11. Constants
echo "\n11. Constants:\n";
echo "M_PI = " . M_PI . "\n";                                   // 3.1415...
echo "M_E = " . M_E . "\n";                                     // 2.7182...
echo "PHP_INT_MAX = " . PHP_INT_MAX . "\n";                     // Max int

// ✅ 12. Floating Point Checks
echo "\n12. Checks:\n";
echo "is_finite(2) = " . (is_finite(2) ? 'true' : 'false') . "\n";     // true
echo "is_nan(acos(8)) = " . (is_nan(acos(8)) ? 'true' : 'false') . "\n"; // true, because acos(8) is invalid

// ✅ 13. Hypotenuse (Pythagorean)
echo "\n13. Hypotenuse:\n";
echo "hypot(3, 4) = " . hypot(3, 4) . "\n";                             // 5

// ✅ 14. Number formatting
echo "\n14. Formatting:\n";
echo "number_format(1234567.8912, 2) = " . number_format(1234567.8912, 2) . "\n"; // 1,234,567.89
?>
