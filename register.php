<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dbmy";  // Define the database name

// Create connection (this includes the database)
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully<br>";
} else {
  echo "Error creating database: " . $conn->error;
}

// Select the created database
$conn->select_db($dbname);

// Create table if not exists
$tableCreation = "
CREATE TABLE IF NOT EXISTS userid (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($tableCreation) === TRUE) {
    echo "Table 'userid' exists or created successfully<br>";
} else {
    die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data and sanitize inputs
    $user = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $pass = $_POST['password']; // You should hash this before storing

    // Validate input data (You can add more validation here)
    if (!empty($user) && !empty($email) && !empty($pass)) {

        // Hash the password before inserting into the database
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        // Prepare SQL query to insert data into `userid` table
        $sql = "INSERT INTO userid (username, email, password) VALUES (?, ?, ?)";

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $user, $email, $hashed_password);

        // Execute the query and check for success
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "All fields are required!";
    }
}

$conn->close();
?>
