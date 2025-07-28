<?php
// PHP Math Functions - Full Lesson with Commented Explanation

// 1. abs() - Returns the absolute (positive) value of a number
$negative = -42;
echo "abs(-42): " . abs($negative) . "\\n"; // Output: 42

// 2. ceil() - Rounds a number UP to the nearest integer
$number = 4.3;
echo "ceil(4.3): " . ceil($number) . "\\n"; // Output: 5

// 3. floor() - Rounds a number DOWN to the nearest integer
echo "floor(4.7): " . floor(4.7) . "\\n"; // Output: 4

// 4. round() - Rounds a number to the nearest integer
echo "round(4.5): " . round(4.5) . "\\n"; // Output: 5
echo "round(4.4): " . round(4.4) . "\\n"; // Output: 4

// 5. max() - Returns the highest value
echo "max(1, 5, 9): " . max(1, 5, 9) . "\\n"; // Output: 9

// 6. min() - Returns the lowest value
echo "min(1, 5, 9): " . min(1, 5, 9) . "\\n"; // Output: 1

// 7. sqrt() - Returns the square root
echo "sqrt(16): " . sqrt(16) . "\\n"; // Output: 4

// 8. pow() - Raises a number to the power of another
echo "pow(2, 3): " . pow(2, 3) . "\\n"; // Output: 8

// 9. exp() - Returns e raised to the power of a number
echo "exp(1): " . exp(1) . "\\n"; // Output: 2.718281828459 (approx e)

// 10. log() - Returns the natural logarithm of a number
echo "log(2.7183): " . log(2.7183) . "\\n"; // Output: ~1

// 11. log10() - Returns the base-10 logarithm
echo "log10(100): " . log10(100) . "\\n"; // Output: 2

// 12. deg2rad() - Converts degrees to radians
echo "deg2rad(180): " . deg2rad(180) . "\\n"; // Output: 3.14159...

// 13. rad2deg() - Converts radians to degrees
echo "rad2deg(3.14159): " . rad2deg(3.14159) . "\\n"; // Output: ~180

// 14. bindec() - Binary to decimal
echo "bindec('1101'): " . bindec("1101") . "\\n"; // Output: 13

// 15. decbin() - Decimal to binary
echo "decbin(13): " . decbin(13) . "\\n"; // Output: 1101

// 16. base_convert() - Converts a number between arbitrary bases
echo "base_convert('A37334', 16, 2): " . base_convert('A37334', 16, 2) . "\\n"; // Output: binary of hex

// 17. rand() - Generates a random integer
echo "rand(): " . rand() . "\\n"; // Output: random number
echo "rand(10, 20): " . rand(10, 20) . "\\n"; // Output: random number between 10 and 20

// 18. mt_rand() - Better random number generator
echo "mt_rand(1, 100): " . mt_rand(1, 100) . "\\n"; // Output: better random number

// 19. is_nan() - Checks if value is not a number
$nan = acos(8); // acos of values >1 results in NAN
echo "is_nan(acos(8)): " . (is_nan($nan) ? "true" : "false") . "\\n"; // Output: true

// 20. pi() - Returns the value of pi
echo "pi(): " . pi() . "\\n"; // Output: 3.1415926535898...

// 21. fmod() - Returns remainder of division (modulus for floats)
echo "fmod(5.7, 1.3): " . fmod(5.7, 1.3) . "\\n"; // Output: ~0.5

// 22. intdiv() - Integer division (PHP 7+)
echo "intdiv(10, 3): " . intdiv(10, 3) . "\\n"; // Output: 3
?>
