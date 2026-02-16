<?php
include 'link.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $msg = mysqli_real_escape_string($conn, $_POST['msg']);

    $sql = "INSERT INTO contact_data (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$msg')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success", "message" => "Message sent successfully!"]);
    }
    else {
        echo json_encode(["status" => "error", "message" => "Error: " . $sql . "<br>" . mysqli_error($conn)]);
    }
    mysqli_close($conn);
}
else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>
