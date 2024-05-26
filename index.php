<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Penjualan Tiket Avenged Sevenfold</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

        .sidebar {
            background-color: #333;
            color: #ffd700;
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            padding-top: 20px;
        }

        .sidebar h2 {
            font-family: 'Metal Mania', cursive;
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 10px 20px;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li a:hover {
            background-color: #444;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
            font-family: 'Metal Mania', cursive;
            color: #ffd700;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            background-color: #f2f2f2;
            color: #333;
        }

        th {
            background-color: #333;
            color: #ffd700;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn.edit {
            background-color: #06294e;
            color: #fff;
        }

        .btn.delete {
            background-color: #770d17;
            color: #fff;
        }

        .btn.add {
            background-color: #28a745;
            color: #fff;
        }

        .btn.add:hover,
        .btn.edit:hover,
        .btn.delete:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <?php include 'config.php'; ?>
    <div class="sidebar">
        <h2>Trio Sakti Ardika</h2>
        <ul>
            <li><a href="index.html"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="#profile"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="#settings"><i class="fas fa-cog"></i> Data Penjualan</a></li>
            <li><a href="#logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="container">
            <h1 class="title">Penjualan Tiket Avenged Sevenfold</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM users");
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>".$row['id']."</td>
                            <td>".$row['name']."</td>
                            <td>".$row['email']."</td>
                            <td>
                                <a href='update.php?id=".$row['id']."'><button class='btn edit'>Edit</button></a>
                                <a href='delete.php?id=".$row['id']."'><button class='btn delete'>Delete</button></a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
            <button class="btn add" onclick="window.location.href = 'create.php';">Add New User</button>
        </div>
    </div>
</body>
</html>
