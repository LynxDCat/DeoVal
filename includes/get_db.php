<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Records</title>
    <link rel="stylesheet" href="../admin.css" />
</head>
<body>

<div class="container">
    <h1>List of Contacts</h1>

    <?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "db_deoval";

   
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

 
    $sql = "SELECT id_no, first_name, last_name, phone_no, email_add, msg, timestamp FROM table_lgit";
    $result = mysqli_query($conn, $sql);

  
    if (mysqli_num_rows($result) > 0) {
  
        echo '<table>';
        echo '<tr><th>ID No.</th><th>First Name</th><th>Last Name</th><th>Phone</th><th>Email</th><th>Message</th><th>Timestamp</th></tr>';


        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id_no']) . "</td>";
            echo "<td>" . htmlspecialchars($row['first_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['last_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['phone_no']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email_add']) . "</td>";
            echo "<td>" . htmlspecialchars($row['msg']) . "</td>";
            echo "<td>" . htmlspecialchars($row['timestamp']) . "</td>";
            echo "</tr>";
        }

        echo '</table>';
    } else {
        echo '<p class="message">No records found.</p>';
    }

    mysqli_close($conn);
    ?>

</div>

</body>
</html>
