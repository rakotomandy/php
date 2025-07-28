<?php
// ===============================
// PDO Constants with Usage Examples
// ===============================

// ----------- 1. Error Handling Modes (PDO::ATTR_ERRMODE) -----------

/*
Controls how PDO reports errors.
*/

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);  
// Errors are silent; you must check manually.

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
// Errors generate PHP warnings.

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Errors throw PDOException exceptions (recommended).

// Example usage:
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error mode setup failed: " . $e->getMessage();
}


// ----------- 2. Default Fetch Modes (PDO::ATTR_DEFAULT_FETCH_MODE) -----------

/*
Controls how fetched rows are returned by default.
*/

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
// Rows returned as associative arrays with column names as keys.

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_NUM); 
// Rows returned as numeric arrays (0-based index).

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_BOTH); 
// Rows returned as both assoc and numeric arrays.

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
// Rows returned as objects.

// Example:
$stmt = $pdo->query("SELECT * FROM users");
while ($row = $stmt->fetch()) {
    // If FETCH_ASSOC, access as $row['username']
    // If FETCH_OBJ, access as $row->username
    echo $row['username'] ?? $row->username;
}


// ----------- 3. Emulate Prepares (PDO::ATTR_EMULATE_PREPARES) -----------

/*
Use native prepared statements or emulate them in PHP.
*/

$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);  
// Emulate prepares (PHP-side).

$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
// Use database's native prepared statements (recommended).

// Example:
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


// ----------- 4. Case Folding (PDO::ATTR_CASE) -----------

/*
Change case of column names in fetched results.
*/

$pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL); // No case change
$pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);   // All lowercase keys
$pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);   // All uppercase keys

// Example:
$pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
$stmt = $pdo->query("SELECT id, USERNAME FROM users");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo $row['username']; // 'username' lowercase because of CASE_LOWER


// ----------- 5. Cursor Types (PDO::ATTR_CURSOR) -----------

/*
Control how the statement's cursor behaves.
*/

$stmt = $pdo->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
// Forward-only cursor (default)

$stmt = $pdo->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
// Scrollable cursor (if driver supports it)

// Example:
$sql = "SELECT * FROM users";
$stmt = $pdo->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);


// ----------- 6. Parameter Types for Binding (PDO::PARAM_*) -----------

/*
Specify data type when binding parameters in prepared statements.
*/

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");

$id = 10;
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  // Bind integer value
$stmt->execute();

// Other param types examples:
$stmt->bindValue(':flag', true, PDO::PARAM_BOOL);    // Boolean
$stmt->bindValue(':name', null, PDO::PARAM_NULL);    // NULL value
$stmt->bindValue(':data', $blobData, PDO::PARAM_LOB); // Large object (blob)

// Example usage:
$stmt = $pdo->prepare("INSERT INTO users (username, active) VALUES (:username, :active)");
$stmt->bindValue(':username', 'JohnDoe', PDO::PARAM_STR);
$stmt->bindValue(':active', true, PDO::PARAM_BOOL);
$stmt->execute();


// ----------- 7. Fetch Orientation Constants (PDO::FETCH_ORI_*) -----------

/*
Used with scrollable cursors to fetch rows in different orders.
*/

$stmt = $pdo->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
$stmt->execute();

$row1 = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT);  // Next row
$row2 = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_PRIOR); // Previous row
$row3 = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_FIRST); // First row
$row4 = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_LAST);  // Last row

// Example usage (scrolling through results):
$stmt = $pdo->prepare("SELECT * FROM users", [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
    echo $row['username'] . "\n";
}


// ----------- 8. Transaction Isolation Levels (PDO::ATTR_TXN_ISOLATION) -----------

/*
Set isolation level for transactions (driver-dependent).
*/

// Example:
try {
    $pdo->setAttribute(PDO::ATTR_TXN_ISOLATION, 'SERIALIZABLE');
} catch (PDOException $e) {
    echo "Transaction isolation not supported: " . $e->getMessage();
}


// ----------- 9. Miscellaneous Attributes -----------

// Timeout for connecting to the database (seconds)
$pdo->setAttribute(PDO::ATTR_TIMEOUT, 5);

// Automatically commit queries? (Driver dependent)
$pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, true);

// For MySQL: run an init command when connecting
$pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8mb4");

// Set the statement class to use for returned statements
$pdo->setAttribute(PDO::ATTR_STATEMENT_CLASS, [MyCustomPDOStatement::class]);

// ... and many more driver-specific options

?>
