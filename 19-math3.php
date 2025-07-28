<?php
// ===============================
// PHP MATH FUNCTIONS - CONTINUED
// Including GMP and BCMath functions for big numbers and precision math
// ===============================

// ---------- 8. BCMath Arbitrary Precision Math ----------

// bcmul() - Multiply two arbitrary precision numbers
echo "bcmul('123456789123456789', '987654321987654321') = " . bcmul('123456789123456789', '987654321987654321') . "\n";

// bcdiv() - Divide two arbitrary precision numbers
echo "bcdiv('123456789123456789', '12345', 10) = " . bcdiv('123456789123456789', '12345', 10) . "\n"; // 10 decimals precision

// bcadd() - Add two arbitrary precision numbers
echo "bcadd('123456789123456789', '987654321987654321') = " . bcadd('123456789123456789', '987654321987654321') . "\n";

// bcsub() - Subtract one arbitrary precision number from another
echo "bcsub('987654321987654321', '123456789123456789') = " . bcsub('987654321987654321', '123456789123456789') . "\n";

// bcpow() - Raise an arbitrary precision number to another number's power
echo "bcpow('5', '3') = " . bcpow('5', '3') . "\n"; // 5^3 = 125

// bcsqrt() - Square root of arbitrary precision number (PHP 7.1+)
echo "bcsqrt('123456789123456789', 10) = " . bcsqrt('123456789123456789', 10) . "\n"; // 10 decimals precision

// bcmod() - Modulus of arbitrary precision numbers
echo "bcmod('123456789123456789', '12345') = " . bcmod('123456789123456789', '12345') . "\n";

// bccomp() - Compare two arbitrary precision numbers (-1 if left < right, 0 if equal, 1 if left > right)
echo "bccomp('12345', '12346') = " . bccomp('12345', '12346') . "\n";

// bcscale() - Set default scale (number of decimal digits) for all bc math functions
bcscale(5); // from now on, default scale is 5 decimals
echo "bcdiv('10', '3') with scale 5 = " . bcdiv('10', '3') . "\n";


// ---------- 9. GMP - GNU Multiple Precision functions ----------

// GMP is for integers of arbitrary size

// gmp_init() - Initialize GMP number from string or integer
$a = gmp_init("123456789123456789123456789");

// gmp_add() - Add two GMP numbers
$b = gmp_init("987654321987654321987654321");
echo "gmp_add = " . gmp_strval(gmp_add($a, $b)) . "\n";

// gmp_sub() - Subtract GMP numbers
echo "gmp_sub = " . gmp_strval(gmp_sub($b, $a)) . "\n";

// gmp_mul() - Multiply GMP numbers
echo "gmp_mul = " . gmp_strval(gmp_mul($a, $b)) . "\n";

// gmp_div_q() - Integer division quotient
echo "gmp_div_q = " . gmp_strval(gmp_div_q($b, $a)) . "\n";

// gmp_div_r() - Integer division remainder
echo "gmp_div_r = " . gmp_strval(gmp_div_r($b, $a)) . "\n";

// gmp_pow() - Raise GMP number to integer power
echo "gmp_pow(5,3) = " . gmp_strval(gmp_pow(gmp_init(5), 3)) . "\n";

// gmp_sqrt() - Integer square root
echo "gmp_sqrt = " . gmp_strval(gmp_sqrt($a)) . "\n";

// gmp_cmp() - Compare two GMP numbers (-1 if less, 0 if equal, 1 if greater)
echo "gmp_cmp = " . gmp_cmp($a, $b) . "\n"; // Should print -1 since $a < $b

// gmp_neg() - Negate a GMP number
echo "gmp_neg = " . gmp_strval(gmp_neg($a)) . "\n";

// gmp_abs() - Absolute value of GMP number
echo "gmp_abs = " . gmp_strval(gmp_abs(gmp_neg($a))) . "\n";


// ---------- 10. Statistics & Geometry Helper Functions ----------

// hypot() - Calculate the hypotenuse (sqrt(x^2 + y^2))
echo "hypot(3,4) = " . hypot(3,4) . "\n"; // Output: 5

// pi() - Return the value of pi
echo "pi() = " . pi() . "\n";

// deg2rad() and rad2deg() were already shown above for angle conversion

// rand() and mt_rand() for random numbers (shown above)

// getrandmax() - Get the largest possible random value
echo "getrandmax() = " . getrandmax() . "\n";

?>
