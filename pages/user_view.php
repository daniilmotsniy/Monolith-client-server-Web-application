<?php session_start(); ?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Registration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<body>
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h4 class="my-0 mr-md-auto font-weight-normal">User </h4>
        <nav class="my-2 my-md-0 mr-md-3">
            <?php $url = "/";
            if($_SESSION['auth']=='true' && $_SESSION['admin']=='true'){
              $url = "/pages/restricted_admin.php?id=".$_SESSION['admin_id'];
            } elseif($_SESSION['auth']=='true' ){
              $url = "/pages/restricted.php?id=".$_SESSION['id'];
            } else {
              $url = "/";
            }
            ?>
            <a class="btn btn-outline-info" href="<?php echo $url; ?>">Back</a>
        </nav>
    </div>
  </header>
  <div class="container">
    <section class="overlay">
      <?php
        require_once "../db/connection.php";

        $sql = "SELECT id, first_name, last_name, email, role_id FROM users WHERE id=".$_GET['id'];

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr>";
                echo "Id: ";
                echo "<td>".$row['id']." "."</td>";
                echo "<br>";
                echo "First name: ";
                echo "<td>".$row['first_name']." "."</td>";
                echo "<br>";
                echo "Last name: ";
                echo "<td>".$row['last_name']." "."</td>";
                echo "<br>";
                echo "Email: ";
                echo "<td>".$row['email']." "."</td>";
                echo "<br>";
                echo "Role id: ";
                echo "<td>".$row['role_id']." "."</td>";
              echo "</tr><br>";
          }
        }
      ?>
      <?php
      if ($_SESSION['admin']=='true'):
      ?>
        <br>
        <nav class="my-2 my-md-0 mr-md-3">
            <input id="submit" class="btn btn-primary" name="submit" type="submit" value="Edit">
            <a class="btn btn-danger" href="">Delete</a>
        </nav>
      <?php endif?>

    </section>
  </div>
</body>
