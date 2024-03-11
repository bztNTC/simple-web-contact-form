<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <title>Contact Form Confirmation</title>

    <!-- Custom CSS -->
    <link href="styles.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <!-- Heading -->
        <h1>Contact Form Confirmation</h1>
        <?php
        // Check if the form was submitted using GET method
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            // Retrieve form data from the query parameters
            $name = isset($_GET["name"]) ? $_GET["name"] : '';
            $email = isset($_GET["email"]) ? $_GET["email"] : '';
            $issue = isset($_GET["issue"]) ? $_GET["issue"] : '';
            $comment = isset($_GET["comment"]) ? $_GET["comment"] : '';

            // Remove HTML tags from the comment
            $comment = strip_tags($comment);

            // Connect to the database
            $conn = new mysqli("localhost", "root", "", "contact_form_db");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare and execute the SQL statement to insert data into the table
            $stmt = $conn->prepare("INSERT INTO responses (name, email, issue, comment) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $issue, $comment);

            // Execute the SQL statement
            if ($stmt->execute()) {
                echo "<p>Form data saved to database successfully.</p>";
            } else {
                echo "<p>Error: " . $stmt->error . "</p>";
            }

            // Close the statement and database connection
            $stmt->close();
            $conn->close();
        } else {
            // Display error message if the request method is not GET
            echo "<p>Invalid request. Please submit the form.</p>";
        }
        ?>

        <!-- Home button -->
        <a href="index.html" class="btn-home">Home</a>
    </div>
</body>

</html>
