<?php
// ==================================================
// PHP REGULAR EXPRESSIONS - COMPLETE LESSON
// ==================================================
// Regex allows searching, replacing, and pattern-matching text.
// PHP uses PCRE (Perl Compatible Regular Expressions) via functions like:
// preg_match(), preg_match_all(), preg_replace(), preg_split(), preg_grep()

// ---------------------------------------------
// 1. preg_match() — Checks if a pattern exists
// ---------------------------------------------
$pattern = "/cat/"; // Pattern to match the word "cat"
$string = "The cat is on the roof."; // The string we're checking

if (preg_match($pattern, $string)) {
    echo "✅ Match found!\n"; // Output if pattern is found
} else {
    echo "❌ No match found.\n";
}

// ---------------------------------------------
// 2. preg_match_all() — Finds all pattern matches
// ---------------------------------------------
$pattern = "/\\d+/"; // \d+ matches one or more digits
$string = "There are 3 cats, 4 dogs, and 12 mice.";

preg_match_all($pattern, $string, $matches); // Finds all digits
print_r($matches);
// Output: Array ( [0] => Array ( [0] => 3 [1] => 4 [2] => 12 ) )

// ---------------------------------------------
// 3. preg_replace() — Replace pattern with string
// ---------------------------------------------
$pattern = "/dog/"; // Find "dog"
$replacement = "hamster"; // Replace it with "hamster"
$string = "My dog is cute.";
echo preg_replace($pattern, $replacement, $string); // Output: My hamster is cute.

// ---------------------------------------------
// 4. preg_split() — Splits a string by a regex
// ---------------------------------------------
$pattern = "/,\\s*/"; // Split by comma and optional space
$string = "apple, banana, cherry";
$parts = preg_split($pattern, $string);
print_r($parts);
// Output: Array ( [0] => apple [1] => banana [2] => cherry )

// ---------------------------------------------
// 5. preg_grep() — Filters array with regex
// ---------------------------------------------
$pattern = "/^a/"; // Match values that start with 'a'
$fruits = ["apple", "banana", "apricot", "cherry"];
$result = preg_grep($pattern, $fruits);
print_r($result);
// Output: Array ( [0] => apple [2] => apricot )

// ---------------------------------------------
// 6. REGEX SPECIAL CHARACTERS — EXAMPLES
// ---------------------------------------------

// .  (dot) — Matches any character except newline
echo preg_match("/c.t/", "cat") ? "Match\n" : "No\n"; // Matches: 'c' + any + 't' (yes)

// ^  — Start of string
echo preg_match("/^Hello/", "Hello world") ? "Yes\n" : "No\n"; // Yes

// $  — End of string
echo preg_match("/end$/", "the end") ? "Yes\n" : "No\n"; // Yes

// \d — Any digit
echo preg_match("/\\d/", "Room 9") ? "Yes\n" : "No\n"; // Yes (matches 9)

// \D — Any non-digit
echo preg_match("/\\D/", "9") ? "Yes\n" : "No\n"; // No

// \w — Word character (letter, digit, _)
echo preg_match("/\\w/", "_") ? "Yes\n" : "No\n"; // Yes

// \W — Non-word character
echo preg_match("/\\W/", "!") ? "Yes\n" : "No\n"; // Yes

// \s — Whitespace
echo preg_match("/\\s/", "Hello world") ? "Yes\n" : "No\n"; // Yes

// \S — Non-whitespace
echo preg_match("/\\S/", " ") ? "Yes\n" : "No\n"; // No

// [abc] — Match 'a', 'b', or 'c'
echo preg_match("/[abc]/", "cat") ? "Yes\n" : "No\n"; // Yes

// [a-z] — Match lowercase letters
echo preg_match("/[a-z]/", "G") ? "Yes\n" : "No\n"; // No

// [^a-z] — NOT lowercase letters
echo preg_match("/[^a-z]/", "G") ? "Yes\n" : "No\n"; // Yes

// (x|y) — Match x OR y
echo preg_match("/(dog|cat)/", "My cat") ? "Yes\n" : "No\n"; // Yes

// * — 0 or more times
echo preg_match("/lo*/", "looong") ? "Yes\n" : "No\n"; // Yes

// + — 1 or more times
echo preg_match("/lo+/", "long") ? "Yes\n" : "No\n"; // Yes

// ? — 0 or 1 time
echo preg_match("/colou?r/", "color") ? "Yes\n" : "No\n"; // Yes

// {n} — Exactly n times
echo preg_match("/a{3}/", "caaat") ? "Yes\n" : "No\n"; // Yes

// {n,} — At least n times
echo preg_match("/a{2,}/", "aaaa") ? "Yes\n" : "No\n"; // Yes

// {n,m} — Between n and m times
echo preg_match("/a{2,4}/", "aaaaa") ? "Yes\n" : "No\n"; // Yes (matches first 4 'a')

// ---------------------------------------------
// 7. VALIDATING STRINGS
// ---------------------------------------------

// Email validation (simple)
$email = "john.doe@example.com";
$pattern = "/^[\\w.-]+@[\\w.-]+\\.\\w+$/";
echo preg_match($pattern, $email) ? "Valid email\n" : "Invalid email\n";

// Phone number format: 123-456-7890
$phone = "123-456-7890";
$pattern = "/^\\d{3}-\\d{3}-\\d{4}$/";
echo preg_match($pattern, $phone) ? "Valid phone\n" : "Invalid phone\n";

// ---------------------------------------------
// 8. CLEANING STRINGS WITH REGEX
// ---------------------------------------------

$dirty = "This !@# is %^a *() test.";
$clean = preg_replace("/[^a-zA-Z0-9 ]/", "", $dirty); // Keep only alphanumerics and space
echo $clean . "\n"; // Output: This is a test

// ---------------------------------------------
// 9. ESCAPING SPECIAL CHARACTERS
// ---------------------------------------------

$text = "Go to example.com now!";
$pattern = "/\\.com/"; // Must escape the dot to match ".com" literally
echo preg_replace($pattern, ".org", $text); // Output: Go to example.org now!

?>
