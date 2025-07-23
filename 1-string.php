<?php
/*
====================================
PHP STRING LESSON - FULLY COMMENTED
====================================

Definition:
-----------
In PHP, a string is a sequence of characters, enclosed in either single quotes (' ') or double quotes (" ").
Strings can hold letters, numbers, symbols, or a combination, and are used for text manipulation.

Below are all major PHP string functions with detailed explanations.
*/

// 1. strlen(string $string): int
// Returns the length of the given string.
$text = "Hello, PHP!";
echo strlen($text); // Output: 10

// 2. str_word_count(string $string, int $format = 0, string $characters = ""): mixed
// Counts the number of words in a string.
echo str_word_count("PHP is awesome"); // Output: 3

// 3. strrev(string $string): string
// Reverses a string.
echo strrev("PHP"); // Output: PHP → P H P → P H P

// 4. strpos(string $haystack, string $needle, int $offset = 0): int|false
// Finds the position of the first occurrence of a substring.
echo strpos("I love PHP", "PHP"); // Output: 7

// 5. stripos(string $haystack, string $needle, int $offset = 0): int|false
// Like strpos() but case-insensitive.
echo stripos("I love php", "PHP"); // Output: 7

// 6. str_replace(array|string $search, array|string $replace, string|array $subject, int &$count = null): string|array
// Replaces all occurrences of a search string with a replacement string.
echo str_replace("world", "PHP", "Hello world"); // Output: Hello PHP

// 7. str_ireplace() — Same as str_replace(), but case-insensitive
echo str_ireplace("WORLD", "PHP", "Hello world"); // Output: Hello PHP

// 8. strtolower(string $string): string
// Converts a string to lowercase.
echo strtolower("HELLO"); // Output: hello

// 9. strtoupper(string $string): string
// Converts a string to uppercase.
echo strtoupper("hello"); // Output: HELLO

// 10. ucfirst(string $string): string
// Capitalizes the first character of a string.
echo ucfirst("php is great"); // Output: Php is great

// 11. lcfirst(string $string): string
// Converts the first character to lowercase.
echo lcfirst("PHP is great"); // Output: pHP is great

// 12. ucwords(string $string): string
// Capitalizes the first letter of each word.
echo ucwords("php is fun"); // Output: Php Is Fun

// 13. trim(string $string, string $characters = " \n\r\t\v\0"): string
// Removes whitespace (or other characters) from both sides of a string.
echo trim("  Hello PHP!  "); // Output: Hello PHP!

// 14. ltrim(string $string, string $characters = " \n\r\t\v\0"): string
// Removes whitespace from the beginning of a string.
echo ltrim("  Hello"); // Output: Hello

// 15. rtrim(string $string, string $characters = " \n\r\t\v\0"): string
// Removes whitespace from the end of a string.
echo rtrim("Hello   "); // Output: Hello

// 16. substr(string $string, int $start, ?int $length = null): string
// Returns part of a string.
echo substr("abcdef", 1, 3); // Output: bcd

// 17. str_repeat(string $string, int $times): string
// Repeats a string multiple times.
echo str_repeat("ha", 3); // Output: hahaha

// 18. str_split(string $string, int $length = 1): array
// Splits a string into an array.
print_r(str_split("Hello")); // Output: ['H','e','l','l','o']

// 19. explode(string $separator, string $string, int $limit = PHP_INT_MAX): array
// Splits a string by a string into an array.
print_r(explode(" ", "PHP is cool")); // Output: ['PHP', 'is', 'cool']

// 20. implode(array $array, string $separator = ""): string
// Joins array elements into a single string.
$arr = ['Hello', 'World'];
echo implode(" ", $arr); // Output: Hello World

// 21. number_format(float $number, int $decimals = 0, string $decimal_separator = ".", string $thousands_separator = ","): string
// Formats a number with grouped thousands.
echo number_format(1234567.89, 2); // Output: 1,234,567.89

// 22. strcmp(string $string1, string $string2): int
// Binary-safe string comparison.
echo strcmp("apple", "banana"); // Output: -1 (less than)

// 23. strcasecmp(string $string1, string $string2): int
// Case-insensitive comparison.
echo strcasecmp("HELLO", "hello"); // Output: 0

// 24. substr_count(string $haystack, string $needle, int $offset = 0, ?int $length = null): int
// Counts how many times a substring occurs in a string.
echo substr_count("abc abc abc", "abc"); // Output: 3

// 25. str_pad(string $string, int $length, string $pad_string = " ", int $pad_type = STR_PAD_RIGHT): string
// Pads a string to a new length.
echo str_pad("Hi", 5, "-"); // Output: Hi---

// 26. str_shuffle(string $string): string
// Randomly shuffles all characters in a string.
echo str_shuffle("abcdef"); // Output: a random version like 'fbecad'

// 27. md5(string $string, bool $binary = false): string
// Calculates the MD5 hash of a string.
echo md5("secret"); // Output: a hashed string like '5ebe2294ecd0e0f08eab7690d2a6ee69'

// 28. sha1(string $string, bool $binary = false): string
// Calculates the SHA-1 hash of a string.
echo sha1("secret"); // Output: a hash like 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4'

// 29. addslashes(string $string): string
// Escapes characters with backslashes.
echo addslashes("It's good"); // Output: It\'s good

// 30. stripslashes(string $string): string
// Removes backslashes.
echo stripslashes("It\'s good"); // Output: It's good

// 31. htmlspecialchars(string $string, int $flags = ENT_QUOTES | ENT_SUBSTITUTE, string $encoding = "UTF-8", bool $double_encode = true): string
// Converts special characters to HTML entities.
echo htmlspecialchars("<a>"); // Output: &lt;a&gt;

// 32. html_entity_decode(string $string, int $flags = ENT_QUOTES | ENT_HTML401, string $encoding = "UTF-8"): string
// Converts HTML entities back to characters.
echo html_entity_decode("&lt;a&gt;"); // Output: <a>

// 33. nl2br(string $string, bool $use_xhtml = true): string
// Inserts HTML line breaks before all newlines in a string.
echo nl2br("Line1\nLine2"); // Output: Line1<br />Line2

?>
