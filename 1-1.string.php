
// Different ways to create strings
$str1 = "Double quoted string"; // Supports variable interpolation and escape sequences
$str2 = 'Single quoted string'; // Does NOT support variable interpolation
$str3 = <<<EOD
This is a heredoc string
that spans multiple lines.
EOD;

$str4 = <<<'EOD'
This is a nowdoc string
that spans multiple lines.
EOD;

echo "Double quoted: $str1\\n";
echo "Single quoted: $str2\\n";
echo "Heredoc: $str3\\n";
echo "Nowdoc: $str4\\n";