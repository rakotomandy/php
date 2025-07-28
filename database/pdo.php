<?php
// ===============================
// PDO Constants and Their Meanings
// ===============================

// ---- 1. Error Handling Modes (PDO::ATTR_ERRMODE) ----

/*
Controls how PDO reports errors.

PDO::ERRMODE_SILENT (default) :
  - PDO sets error codes but does NOT raise warnings or exceptions.
  - You must manually check errors.

PDO::ERRMODE_WARNING :
  - Emits PHP warnings for errors.
  - Useful for debugging but not recommended in production.

PDO::ERRMODE_EXCEPTION :
  - Throws PDOException exceptions on errors.
  - Recommended for robust error handling.
*/

// Example:
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// ---- 2. Default Fetch Modes (PDO::ATTR_DEFAULT_FETCH_MODE) ----

/*
Controls how fetch() and fetchAll() return data.

PDO::FETCH_ASSOC :
  - Returns results as associative arrays indexed by column names.
  - Example: $row['username']

PDO::FETCH_NUM :
  - Returns results as numeric arrays indexed by column numbers.
  - Example: $row[0]

PDO::FETCH_BOTH (default) :
  - Returns results with both numeric and associative keys.

PDO::FETCH_OBJ :
  - Returns results as anonymous PHP objects.
  - Access properties with $row->username

PDO::FETCH_CLASS :
  - Fetches results into instances of a specified class.

PDO::FETCH_LAZY :
  - Combines PDO::FETCH_BOTH and PDO::FETCH_OBJ, delays data loading.

PDO::FETCH_BOUND :
  - Binds columns to PHP variables (used with bindColumn()).
*/

// Example:
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


// ---- 3. Emulate Prepares (PDO::ATTR_EMULATE_PREPARES) ----

/*
Controls whether PDO emulates prepared statements (true) or uses native prepared statements (false).

- true: Prepares queries in PHP; might not protect fully against SQL injection for some drivers.
- false: Uses native DB server prepared statements (more secure and efficient).

Recommended to set false if supported.
*/

// Example:
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


// ---- 4. Case Folding (PDO::ATTR_CASE) ----

/*
Controls the case of column names in result sets.

PDO::CASE_NATURAL (default) :
  - Leaves column names as returned by the driver.

PDO::CASE_LOWER :
  - Converts column names to lowercase.

PDO::CASE_UPPER :
  - Converts column names to uppercase.
*/

// Example:
$pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);


// ---- 5. Cursor Types (PDO::ATTR_CURSOR) ----

/*
Controls the type of cursor used for queries.

PDO::CURSOR_FWDONLY (default) :
  - Forward-only cursor; cannot scroll backwards.

PDO::CURSOR_SCROLL :
  - Scrollable cursor; can move forward and backward through result set.
  - Not supported by all drivers.
*/

// Example:
$stmt = $pdo->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);


// ---- 6. Parameter Types for Binding (PDO::PARAM_*) ----

/*
Constants to specify parameter data types in prepared statements.

PDO::PARAM_BOOL :
  - Boolean data type.

PDO::PARAM_NULL :
  - SQL NULL value.

PDO::PARAM_INT :
  - Integer data type.

PDO::PARAM_STR :
  - String data type.

PDO::PARAM_LOB :
  - Large object (e.g., BLOB or CLOB).

PDO::PARAM_STMT :
  - Represents a recordset type. Rarely used.

PDO::PARAM_INPUT_OUTPUT :
  - For output parameters and input/output parameters. Requires length parameter.
*/

// Example:
$stmt->bindValue(':id', $id, PDO::PARAM_INT);


// ---- 7. Fetch Orientation Constants (for fetchAll() with FETCH_ORI_NEXT etc.) ----

/*
Control fetching direction and orientation.

PDO::FETCH_ORI_NEXT (default) :
  - Fetch the next row.

PDO::FETCH_ORI_PRIOR :
  - Fetch the previous row.

PDO::FETCH_ORI_FIRST :
  - Fetch the first row.

PDO::FETCH_ORI_LAST :
  - Fetch the last row.

PDO::FETCH_ORI_ABS :
  - Fetch the row at an absolute position.

PDO::FETCH_ORI_REL :
  - Fetch the row relative to the current position.
*/

// Usage example with scrollable cursor.


// ---- 8. Transaction Isolation Levels (PDO::ATTR_TXN_ISOLATION) ----

/*
Defines transaction isolation level for the connection.

Not universally supported.

Examples include:
- 'READ UNCOMMITTED'
- 'READ COMMITTED'
- 'REPEATABLE READ'
- 'SERIALIZABLE'
*/

// Example setting isolation level (if driver supports):
// $pdo->setAttribute(PDO::ATTR_TXN_ISOLATION, 'SERIALIZABLE');


// ---- 9. Miscellaneous Attributes ----

// PDO::ATTR_TIMEOUT : Timeout in seconds for connecting to the database.

// PDO::ATTR_AUTOCOMMIT : Controls autocommit mode on some drivers.

// PDO::MYSQL_ATTR_INIT_COMMAND : Command to execute when connecting to MySQL.

// PDO::SQLSRV_ATTR_QUERY_TIMEOUT : Timeout for SQL Server queries.

// PDO::SQLSRV_ATTR_DIRECT_QUERY : Whether to send queries directly or prepare them.

// PDO::ATTR_STATEMENT_CLASS : Class name of statement class to use.


// === Summary Table ===
// Constant                     | Meaning / Usage
// -----------------------------|-------------------------------
// PDO::ATTR_ERRMODE            | Controls error reporting mode
// PDO::ERRMODE_SILENT          | Silent error mode (default)
// PDO::ERRMODE_WARNING         | Raise PHP warnings on errors
// PDO::ERRMODE_EXCEPTION       | Throw exceptions on errors
// PDO::ATTR_DEFAULT_FETCH_MODE | Default fetch style for results
// PDO::FETCH_ASSOC             | Fetch as associative array
// PDO::FETCH_NUM               | Fetch as numeric array
// PDO::FETCH_BOTH              | Both numeric and assoc array keys
// PDO::FETCH_OBJ               | Fetch as object
// PDO::ATTR_EMULATE_PREPARES   | Emulate prepares (true/false)
// PDO::PARAM_INT               | Bind param as integer
// PDO::PARAM_STR               | Bind param as string
// PDO::PARAM_BOOL              | Bind param as boolean
// PDO::PARAM_NULL              | Bind param as NULL
// PDO::PARAM_LOB               | Bind param as large object (blob)
// PDO::ATTR_CASE               | Case folding of column names
// PDO::CASE_NATURAL            | Natural case (default)
// PDO::CASE_LOWER              | Convert column names to lowercase
// PDO::CASE_UPPER              | Convert column names to uppercase
// PDO::ATTR_CURSOR             | Cursor type for statements
// PDO::CURSOR_FWDONLY          | Forward-only cursor (default)
// PDO::CURSOR_SCROLL           | Scrollable cursor
// PDO::FETCH_ORI_*             | Fetch orientation (next, prior, first...)
// PDO::ATTR_TXN_ISOLATION      | Transaction isolation level (if supported)

?>
