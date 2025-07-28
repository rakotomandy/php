<?php
// ===============================
// PHP PDO DATABASE CLASS WITH CONSTRUCTOR
// Handling database creation, table creation, alteration, and dropping
// ===============================

class DatabaseManager
{
    private $host;
    private $user;
    private $pass;
    private $charset;
    private $pdo;      // PDO connection without DB (server-level)
    private $pdoDb;    // PDO connection with DB

    // Constructor to initialize DB credentials and connect to server
    public function __construct($host, $user, $pass, $charset = 'utf8mb4')
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->charset = $charset;

        // DSN without database
        $dsn = "mysql:host=$this->host;charset=$this->charset";

        try {
            // Connect to MySQL server (no DB specified)
            $this->pdo = new PDO($dsn, $this->user, $this->pass);

            // Set error mode to exceptions
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Connected to MySQL server successfully.\n";
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    // Create a database if it doesn't exist
    public function createDatabase($dbname)
    {
        try {
            $sql = "CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET $this->charset COLLATE {$this->charset}_unicode_ci";
            $this->pdo->exec($sql);
            echo "Database '$dbname' created or already exists.\n";
        } catch (PDOException $e) {
            die("Database creation failed: " . $e->getMessage());
        }
    }

    // Connect to a specific database
    public function connectDatabase($dbname)
    {
        $dsnDb = "mysql:host=$this->host;dbname=$dbname;charset=$this->charset";

        try {
            $this->pdoDb = new PDO($dsnDb, $this->user, $this->pass);
            $this->pdoDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected to database '$dbname' successfully.\n";
        } catch (PDOException $e) {
            die("Connection to $dbname failed: " . $e->getMessage());
        }
    }

    // Create a table if it doesn't exist
    public function createTable()
    {
        try {
            $sql = "
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(50) NOT NULL,
                email VARCHAR(100) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=$this->charset;
            ";
            $this->pdoDb->exec($sql);
            echo "Table 'users' created or already exists.\n";
        } catch (PDOException $e) {
            die("Table creation failed: " . $e->getMessage());
        }
    }

    // Alter the 'users' table to add an 'age' column
    public function alterTable()
    {
        try {
            $sql = "ALTER TABLE users ADD COLUMN age INT DEFAULT NULL AFTER email;";
            $this->pdoDb->exec($sql);
            echo "Table 'users' altered: 'age' column added.\n";
        } catch (PDOException $e) {
            echo "Table alteration failed (possibly column exists): " . $e->getMessage() . "\n";
        }
    }

    // Drop the 'users' table
    public function dropTable()
    {
        try {
            $sql = "DROP TABLE IF EXISTS users";
            $this->pdoDb->exec($sql);
            echo "Table 'users' dropped successfully.\n";
        } catch (PDOException $e) {
            die("Dropping table failed: " . $e->getMessage());
        }
    }

    // Drop a database
    public function dropDatabase($dbname)
    {
        try {
            $sql = "DROP DATABASE IF EXISTS `$dbname`";
            $this->pdo->exec($sql);
            echo "Database '$dbname' dropped successfully.\n";
        } catch (PDOException $e) {
            die("Dropping database failed: " . $e->getMessage());
        }
    }
}


// ======= USAGE EXAMPLE =======

// Set your DB credentials
$host = '127.0.0.1';
$user = 'root';
$pass = '';

// Create instance and connect to server
$dbManager = new DatabaseManager($host, $user, $pass);

// Create database named 'testdb'
$dbManager->createDatabase('testdb');

// Connect to 'testdb' database
$dbManager->connectDatabase('testdb');

// Create 'users' table
$dbManager->createTable();

// Alter 'users' table to add 'age' column
$dbManager->alterTable();

// Uncomment below to drop the 'users' table
// $dbManager->dropTable();

// Uncomment below to drop the 'testdb' database
// $dbManager->dropDatabase('testdb');
?>
