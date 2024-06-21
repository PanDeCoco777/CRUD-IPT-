<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <title>CRUD App</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 80%;
      margin: auto;
      overflow: hidden;
    }
    h1 {
      background-color: #333;
      color: #fff;
      padding: 10px 0;
      text-align: center;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 25px 0;
      font-size: 18px;
      text-align: left;
    }
    table th, table td {
      padding: 12px;
      background: #ddd;
      border: 1px solid #ccc;
    }
    table th {
      background: #333;
      color: #fff;
    }
    a {
      text-decoration: none;
      color: #333;
    }
    .btn {
      display: inline-block;
      padding: 10px 20px;
      font-size: 16px;
      background: #333;
      color: #fff;
      border: none;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      margin: 4px 2px;
    }
    .btn:hover {
      background-color: #555;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Users</h1>
    <a href="create.php" class="btn">Add New User</a>
    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
      </tr>
      <?php
      $sql = "SELECT * FROM users";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['phone']}</td>
                  <td>
                    <a href='update.php?id={$row['id']}' class='btn'>Edit</a>
                    <a href='delete.php?id={$row['id']}' class='btn'>Delete</a>
                  </td>
                </tr>";
        }
      } else {
        echo "<tr><td colspan='5'>No users found</td></tr>";
      }
      $conn->close();
      ?>
    </table>
  </div>
</body>
</html>