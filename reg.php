<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Success</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<body>
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">Registation</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="btn btn-outline-primary" href="/pages/login.php">Sign In</a>
            <a class="btn btn-outline-primary" href="/pages/registration.php">Sign Up</a>
        </nav>
    </div>
  </header>
  <div class="container">
    <?php
        require_once "db/connection.php"; // conn

        $first_name = mysqli_real_escape_string($conn, $_REQUEST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_REQUEST['last_name']);
        $role_id = mysqli_real_escape_string($conn, $_REQUEST['role_id']);
        $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
        $password = mysqli_real_escape_string($conn, $_REQUEST['pass']);

      	if (count($_POST)>0) {
          $sql = "INSERT INTO users (first_name, last_name, email, password,
          role_id) VALUES ('$first_name', '$last_name', '$email', '$password', '$role_id')";

      		$res = mysqli_query($conn, $sql);

          if (!$res) {
              printf("Error: %s\n", mysqli_error($conn));
              exit();
          }
        }
    ?>
    <h3>You have been registered!</h3>
  </div>
</body>
