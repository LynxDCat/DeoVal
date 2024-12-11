<?php
// Database configuration
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_deoval";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    // Establish database connection
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Securely handle form data
    $fname = $conn->real_escape_string($_POST['first_name']);
    $lname = $conn->real_escape_string($_POST['last_name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // Prepare SQL query
    $stmt = $conn->prepare("INSERT INTO table_lgit (first_name, last_name, phone_no, email_add, msg) VALUES (?, ?, ?, ?, ?)");
    
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("sssss", $fname, $lname, $phone, $email, $message);

    // Execute the statement
    if ($stmt->execute()) {
        // Forward data to Web3Forms
        $web3forms_data = [
            'access_key' => '0f8a394c-c9bb-4600-a640-41f05512dc12',
            'first_name' => $fname,
            'last_name' => $lname,
            'phone' => $phone,
            'email' => $email,
            'message' => $message,
        ];

        $url = "https://api.web3forms.com/submit";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($web3forms_data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $curl_error = curl_error($ch);
        curl_close($ch);

        if ($curl_error) {
            die("Error forwarding to Web3Forms: " . $curl_error);
        }

        // Redirect to a success page
        header("Location: ../index.php?page=Contact#lgit");
        exit();
    } else {
        // Handle execution error
        die("Error executing statement: " . $stmt->error);
    }

    // Close the statement and connection
    $stmt->close();
    mysqli_close($conn);
}
?>