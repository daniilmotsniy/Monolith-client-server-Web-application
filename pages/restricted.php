<?php session_start(); ?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>User page</title>
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<header>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Your account info</h5>
      <nav class="my-2 my-md-0 mr-md-3">
          <a class="btn btn-outline-primary" href="/pages/user.php"><?php echo $_SESSION["first_name"]; ?></a>
          <a class="btn btn-outline-danger" href="../logout.php">Sign Out</a>
      </nav>
  </div>
</header>
<div class="container">
    <?php
    if ($_SESSION["auth"]=='true'):
    ?>
    <?php
      require_once "../db/connection.php";

      $sql = "SELECT id, first_name, last_name, email, role_id FROM users";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo "<tr>";
              echo "<td>".$row['id']." "."</td>";
              echo "<td>".$row['first_name']." "."</td>";
              echo "<td>".$row['last_name']." "."</td>";
              echo "<td>".$row['email']." "."</td>";
              echo "<td>".$row['role_id']." "."</td>";
            echo "</tr><br>";

        }
      }
    ?>
    <?php
    else:
    ?>
        <h3>Incorrect password or login, please try one more time!</h3><br>
        <a class="btn btn-lg btn-danger" href="login.php">Return</a>

    <?php endif?>
    <br>
</div>
</body>
</html>
