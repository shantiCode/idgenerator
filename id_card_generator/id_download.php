<!DOCTYPE html>
<html>

<head>
    <title>Student Details</title>
    <script>
        // JavaScript function to toggle between displaying data and the form
        function toggleForm() {
            var dataSection = document.getElementById("data-section");
            var formSection = document.getElementById("form-section");

            if (dataSection.style.display === "block") {
                dataSection.style.display = "none";
                formSection.style.display = "block";
            } else {
                dataSection.style.display = "block";
                formSection.style.display = "none";
            }
        }
    </script>
</head>

<body>
    <h1>Student Details</h1>

    <div id="data-section">
        <?php
   $c = mysqli_connect("localhost", "root", "", "id_card") or die("Connection Error");

   // Retrieve the user data after insertion
   $query = "SELECT * FROM users WHERE Username = '$email'";
   $result = mysqli_query($c, $query);
   $user = mysqli_fetch_assoc($result);

   // Display the inserted user data
   echo "<h2>Registration Successful</h2>";
   echo "<p>Name: " . $user['Name'] . "</p>";
   echo "<p>Gender: " . $user['Gender'] . "</p>";
   echo "<p>Education: " . $user['Education'] . "</p>";
   echo "<p>Email: " . $user['Username'] . "</p>";

   mysqli_close($c);
        ?>
        <button onclick="toggleForm()">Edit Details</button>
    </div>

    <!-- Data Collection Form Section (Initially Hidden) -->
    <div id="form-section" style="display: none;">
        <h2>Edit Details</h2>
        <form action="process_details.php" method="POST">
            <!-- Input fields for collecting additional details -->
            <input type="text" name="contact" placeholder="Enter Contact" required>
            <input type="text" name="college_name" placeholder="Enter College Name" required>
            <input type="file" name="student_photo" accept="image/*" required>
            <input type="checkbox" class="check-box" required>
            <span2>Agree to Terms and Conditions</span2>
            <button type="submit" name="submit_details">Submit Details</button>
            <button type="button" onclick="toggleForm()">Cancel</button>
        </form>
    </div>
</body>

</html>