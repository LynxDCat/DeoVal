<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_deoval";

// Establish database connection
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
    $username = $conn->real_escape_string($_POST['user_name']);
    $password = $conn->real_escape_string($_POST['pass']);

    // Prepare the SELECT statement to check credentials
    $stmt = $conn->prepare("SELECT * FROM tb_admins WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any row matches the credentials
    if ($result->num_rows > 0) {
        header("Location: ../includes/get_db.php");
    } else {
        echo "Wrong credentials";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
mysqli_close($conn);
?>
