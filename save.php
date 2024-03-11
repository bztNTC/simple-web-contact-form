<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Form Confirmation</title>
    <link href="styles.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Contact Form Confirmation</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $name = isset($_GET["name"]) ? $_GET["name"] : '';
            $email = isset($_GET["email"]) ? $_GET["email"] : '';
            $issue = isset($_GET["issue"]) ? $_GET["issue"] : '';
            $comment = isset($_GET["comment"]) ? $_GET["comment"] : '';

            $conn = new mysqli("localhost", "root","","contact_form_db");

            if ($conn->connect_error) {
                die("Connection failed: ". $conn->connect_error);
            }

            $stmt = $conn->prepare("INSERT INTO responses (name, email, issue, comment) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $issue, $comment);

            if ($stmt->execute()) {
                echo "<p>Form data saved to database successfully.</p>";
            } else {
                echo "<p>Error: " . $stmt->error . "</p>";
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "<p>Invalid request. Please submit the form.</p>";
        }
        ?>

        <form action="index.html">
            <input type="submit" name="return" value="Home">
        </form>
    </div>
</body>

</html>