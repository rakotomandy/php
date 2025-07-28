<?php
// ===============================
// PHP PDO DATABASE LESSON
// Creating databases, tables, dropping and altering tables using PDO
// ===============================

// --- What is PDO? ---
// PDO (PHP Data Objects) is a database access layer providing a uniform method
// of access to multiple databases. It supports prepared statements, transactions,
// and more secure and flexible database interactions.

// ---------- 1. Connect to the Database Server ----------

// Database server credentials
$host = '127.0.0.1';     // Database server address (localhost or IP)
$user = 'root';          // Database username
$pass = '';              // Database password (empty in this example)
$charset = 'utf8mb4';    // Character set to use

// Data Source Name (DSN) string for MySQL
$dsn = "mysql:host=$host;charset=$charset";

try {
    // Create PDO instance to connect to the MySQL server (without specifying DB)
    $pdo = new PDO($dsn, $user, $pass);

    // Set error mode to exception to allow catching errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected to MySQL server successfully.\n";
} catch (PDOException $e) {
    // Handle connection errors gracefully
    die("Connection failed: " . $e->getMessage());
}


// ---------- 2. Create a New Database ----------

try {
    // SQL query to create a database named 'testdb' if it does not exist
    $sqlCreateDb = "CREATE DATABASE IF NOT EXISTS testdb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";

    // Execute the SQL query
    $pdo->exec($sqlCreateDb);

    echo "Database 'testdb' created or already exists.\n";
} catch (PDOException $e) {
    die("Database creation failed: " . $e->getMessage());
}


// ---------- 3. Connect to the Newly Created Database ----------

try {
    // Update DSN to include database name 'testdb'
    $dsnDb = "mysql:host=$host;dbname=testdb;charset=$charset";

    // Create new PDO instance connected to 'testdb'
    $pdoDb = new PDO($dsnDb, $user, $pass);

    // Set error mode to exception
    $pdoDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected to database 'testdb' successfully.\n";
} catch (PDOException $e) {
    die("Connection to testdb failed: " . $e->getMessage());
}


// ---------- 4. Create a Table ----------

try {
    // SQL query to create a 'users' table if it does not exist
    $sqlCreateTable = "
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,  -- Unique user ID, auto-incremented
            username VARCHAR(50) NOT NULL,      -- Username, max 50 chars, cannot be null
            email VARCHAR(100) NOT NULL,        -- User email
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- Timestamp of creation
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";

    // Execute the SQL query
    $pdoDb->exec($sqlCreateTable);

    echo "Table 'users' created or already exists.\n";
} catch (PDOException $e) {
    die("Table creation failed: " . $e->getMessage());
}


// ---------- 5. Alter a Table ----------

try {
    // SQL query to add a new column 'age' to the 'users' table
    $sqlAlterTable = "
        ALTER TABLE users 
        ADD COLUMN age INT DEFAULT NULL AFTER email;
    ";

    // Execute the SQL query
    $pdoDb->exec($sqlAlterTable);

    echo "Table 'users' altered: 'age' column added.\n";
} catch (PDOException $e) {
    // Handle error if column already exists or other issues
    echo "Table alteration failed (possibly column already exists): " . $e->getMessage() . "\n";
}


// ---------- 6. Drop a Table ----------

// Uncomment the code below if you want to drop the table

/*
try {
    // SQL query to drop 'users' table if it exists
    $sqlDropTable = "DROP TABLE IF EXISTS users";

    // Execute the SQL query
    $pdoDb->exec($sqlDropTable);

    echo "Table 'users' dropped successfully.\n";
} catch (PDOException $e) {
    die("Dropping table failed: " . $e->getMessage());
}
*/


// ---------- 7. Drop the Database ----------

// Uncomment the code below if you want to drop the database

/*
try {
    // SQL query to drop database 'testdb' if it exists
    $pdo->exec("DROP DATABASE IF EXISTS testdb");

    echo "Database 'testdb' dropped successfully.\n";
} catch (PDOException $e) {
    die("Dropping database failed: " . $e->getMessage());
}
*/

?>
