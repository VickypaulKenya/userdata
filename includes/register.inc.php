<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Include the database connection file
    include_once "dbh.inc.php"; // Ensure this contains your PDO connection setup

    // Get the user input and sanitize it
    $username = trim($_POST["username"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $password = trim($_POST["pwd"] ?? '');

    // Input validation
    if (empty($username) || empty($email) || empty($password)) {
        die("Error: All fields are required.");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Error: Invalid email format.");
    }

    try {
        // Prepare SQL query to insert data into the database
        $sql = "INSERT INTO users (username, email, pwd) VALUES (:username, :email, :pwd)";
        $stmt = $pdo->prepare($sql);

        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Execute the statement with user input
        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':pwd' => $hashedPassword,
        ]);

        echo "Registration successful!";
        // Optionally redirect to another page
        header("Location: ../index.php");
        // exit();
    } catch (PDOException $e) {
        // Handle database errors
        die("Error: " . $e->getMessage());
    }
} else {
    // Handle incorrect request methods
    die("Error: Invalid request method.");
}
?>
