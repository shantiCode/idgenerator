<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST["name"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $college = $_POST["college"];
    $course = $_POST["course"];
    $year_semester = $_POST["year_semester"];
    
    // Process the uploaded photo
    $photo = $_FILES["photo"];
    $photoName = $photo["name"];
    $photoTmpName = $photo["tmp_name"];
    $photoError = $photo["error"];
    
    if ($photoError === UPLOAD_ERR_OK) {
        // Move the uploaded photo to a permanent location
        $photoDestination = "uploads/" . $photoName;
        move_uploaded_file($photoTmpName, $photoDestination);

        $conn = new mysqli("localhost", "root","", "id_card");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "INSERT INTO details (name, address, contact, college, course, year_semester, photo) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $name, $address, $contact, $college, $course, $year_semester, $photoDestination);
        
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $conn->error;
        }
        
        $stmt->close();
        $conn->close();
    } else {
        echo "Error uploading photo.";
    }
}
?>
