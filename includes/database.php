<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "db_deoval";

    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST["submit"])) {
        $fname = $conn->real_escape_string($_POST['first_name']);
        $lname = $conn->real_escape_string($_POST['last_name']);
        $phone = $conn->real_escape_string($_POST['phone']);
        $email = $conn->real_escape_string($_POST['email']);
        $message = $conn->real_escape_string($_POST['message']);

        $stmt = $conn->prepare("INSERT INTO table_lgit (first_name, last_name, phone_no, email_add, msg) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $fname, $lname, $phone, $email, $message);

        if ($stmt->execute()) {
            header("Location: ../index.php?page=Contact#lgit");
            exit();
        } else {
            die("Error Saving to Database: " . $stmt->error);
        }

        $stmt->close();
    }

    mysqli_close($conn);
?>
