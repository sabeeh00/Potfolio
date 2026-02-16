<?php
include 'link.php';

header('Content-Type: text/plain');

echo "Checking Database Connection...\n";

if ($conn) {
    echo "Database Connected Successfully!\n";

    echo "Checking for 'contact_data' table...\n";
    $result = mysqli_query($conn, "SHOW TABLES LIKE 'contact_data'");

    if (mysqli_num_rows($result) > 0) {
        echo "Table 'contact_data' exists.\n";

        $result = mysqli_query($conn, "DESCRIBE contact_data");
        echo "Table Structure:\n";
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['Field'] . " - " . $row['Type'] . "\n";
        }
    }
    else {
        echo "ERROR: Table 'contact_data' does NOT exist.\n";
        echo "Attempting to create table...\n";

        $sql = "CREATE TABLE contact_data (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            email VARCHAR(50) NOT NULL,
            phone VARCHAR(20) NOT NULL,
            message TEXT NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if (mysqli_query($conn, $sql)) {
            echo "Table 'contact_data' created successfully.\n";
        }
        else {
            echo "Error creating table: " . mysqli_error($conn) . "\n";
        }
    }
}
else {
    echo "Connection Failed: " . mysqli_connect_error() . "\n";
}

mysqli_close($conn);
?>
