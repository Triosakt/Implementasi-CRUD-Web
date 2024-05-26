<?php include 'config.php' ; ?>
<!DOCTYPE html>
<html>
<head>
    <title> Add User </title>
    <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('Beground.jpeg'); 
            background-position: center;
            background-size: cover;
            background-position: 15% 10%;
            color: #ffd700;
        }

        h1 {
            text-align: center;
            font-family: 'Metal Mania', cursive;
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border-radius: 3px;
            border: 1px solid #ddd;
        }

        button[type="submit"] {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #ffd700;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Add New User</h1>
    <form method="post" action="create.php">
        <label>Name:</label>
        <input type="text" name="name" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <button type="submit">Add User</button>
    </form>
    <a href="index.php">Back to User List</a>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];

        $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        if ($stmt->execute()) {
            echo "New user added successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    ?>
</body>
</html>
