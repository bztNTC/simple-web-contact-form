<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Form Submission</title>
    <link href="styles.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Contract Form Submission</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $issue = $_POST["issue"];
            $comment = $_POST["comment"];

            $conn = new mysqli("localhost", "root","","contact_form_db");

            if ($conn->connect_error) {
                die("Connection failed: ". $conn->connect_error);
            }

            $stmt = $conn->prepare("INSERT INTO responses (name, email, issue, comment) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $issue, $comment);
            $stmt->execute();

            echo "<p><strong>Name:</strong> $name</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Issue:</strong> $issue</p>";
            echo "<p><strong>Comment:</strong> $comment</p>";

            echo "<form action='index.html' method='get'>";
            echo "<input type='hidden' name='name' value='$name'>";
            echo "<input type='hidden' name='email' value='$email'>";
            echo "<input type='hidden' name='issue' value='$issue'>";
            echo "<input type='hidden' name='comment' value='$comment'>";
            echo "<input type='submit' class='edit-btn' value='Edit'>";
            echo "</form>";

            $stmt->close();
            $conn->close();
        } else {
            echo "<p>Invalid request. Please submit the form.</p>";
        }
        ?>

    </div>
</body>

</html>