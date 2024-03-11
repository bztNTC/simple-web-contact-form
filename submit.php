<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <title>Contact Form Submission</title>

    <!-- Custom CSS -->
    <link href="styles.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <!-- Heading -->
        <h1>Contact Form Submission</h1>
        <?php
        // Check if the form was submitted using POST method
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Retrieve form data
            $name = $_POST["name"];
            $email = $_POST["email"];
            $issue = $_POST["issue"];
            $comment = $_POST["comment"];

            // Display form data
            echo "<p><strong>Name:</strong> $name</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Issue:</strong> $issue</p>";
            echo "<p><strong>Comment:</strong> $comment</p>";

            // Edit button form
            echo "<form action='index.html' method='get'>";
            echo "<input type='hidden' name='name' value='$name'>";
            echo "<input type='hidden' name='email' value='$email'>";
            echo "<input type='hidden' name='issue' value='$issue'>";
            echo "<input type='hidden' name='comment' value='$comment'>";
            echo "<input type='submit' value='Edit'>";
            echo "</form>";

            // Save button form
            echo "<form action='save.php' method='get'>";
            echo "<input type='hidden' name='name' value='$name'>";
            echo "<input type='hidden' name='email' value='$email'>";
            echo "<input type='hidden' name='issue' value='$issue'>";
            echo "<input type='hidden' name='comment' value='$comment'>";
            echo "<input type='submit' value='Save'>";
            echo "</form>";
        } else {
            // Display error message if the request method is not POST
            echo "<p>Invalid request. Please submit the form.</p>";
        }
        ?>
    </div>
</body>

</html>
