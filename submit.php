<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Form Submission</title>
    <link href="styles.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Contact Form Submission</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $issue = $_POST["issue"];
            $comment = $_POST["comment"];

            echo "<p><strong>Name:</strong> $name</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Issue:</strong> $issue</p>";
            echo "<p><strong>Comment:</strong> $comment</p>";

            echo "<form action='index.html' method='get'>";
            echo "<input type='hidden' name='name' value='$name'>";
            echo "<input type='hidden' name='email' value='$email'>";
            echo "<input type='hidden' name='issue' value='$issue'>";
            echo "<input type='hidden' name='comment' value='$comment'>";
            echo "<input type='submit' value='Edit'>";
            echo "</form>";

            echo "<form action='save.php' method='get'>";
            echo "<input type='hidden' name='name' value='$name'>";
            echo "<input type='hidden' name='email' value='$email'>";
            echo "<input type='hidden' name='issue' value='$issue'>";
            echo "<input type='hidden' name='comment' value='$comment'>";
            echo "<input type='submit' value='Save'>";
            echo "</form>";
        } else {
            echo "<p>Invalid request. Please submit the form.</p>";
        }
        ?>
    </div>
</body>

</html>