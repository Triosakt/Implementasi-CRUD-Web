<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
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
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); 
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
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        button[type="submit"] {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
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

        /* Tambahan untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #ffd700;
        }

        td {
            background-color: #222;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>Edit User</h1>
    <?php
    include "config.php";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM users WHERE id = $id");
        $user = $result->fetch_assoc();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        $stmt = $conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $name, $email, $id);
        if ($stmt->execute()) {
            echo "User updated successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        header("Location: index.php");
        exit;
    }
    ?>
    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $user['name']; ?>" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
        <br>
        <button type="submit">Update User</button>
    </form>
    <a href="index.php">Back to User List</a>
</body>
</html>
