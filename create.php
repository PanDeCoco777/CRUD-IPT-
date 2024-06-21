<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Create User</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 50%;
      margin: auto;
      overflow: hidden;
      background: #fff;
      padding: 20px;
      box-shadow: 0px 0px 10px 0px #000;
    }
    h1 {
      background-color: #333;
      color: #fff;
      padding: 10px 0;
      text-align: center;
    }
    label, input {
      display: block;
      margin: 10px 0;
      width: 100%;
    }
    input[type="text"], input[type="email"] {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
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
    <h1>Create New User</h1>
    <form method="POST" action="">
      <label>Name:</label>
      <input type="text" name="name" required>
      <label>Email:</label>
      <input type="email" name="email" required>
      <label>Phone:</label>
      <input type="text" name="phone" required>
      <input type="submit" name="submit" class="btn" value="Create">
    </form>
    <?php
    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];

      $sql = "INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')";

      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: index.php");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    $conn->close();
    ?>
  </div>
</body>
</html>