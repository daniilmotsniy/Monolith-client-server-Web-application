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
        <h4 class="my-0 mr-md-auto font-weight-normal">User page</h4>
        <nav class="my-2 my-md-0 mr-md-3">
            <?php
              session_start();
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
          $sql_user = "SELECT first_name, last_name FROM users WHERE id=".$_GET['id'];
          $result_user = $conn->query($sql_user);

          if ($result_user->num_rows > 0) {
              while($row_user = $result_user->fetch_assoc()) { ?>
                <h3>Account info</h3>
                <form action="" method="post">
                  <label for="first_name">First name:</label>
                  <br>
                  <input id="first_name" class="form-control" name="first_name" type="text" value="<?php echo $row_user['first_name']; ?>" minlength="2" maxlength="20" pattern="[a-zA-Z]+">
                  <br>
                  <label for="last_name">Last name:</label>
                  <br>
                  <input id="last_name" class="form-control" name="last_name" type="text" value="<?php echo $row_user["last_name"]; ?>" minlength="2" maxlength="20" pattern="[a-zA-Z]+">
                  <br>
                  <label for="pass">Password:</label>
                  <br>
                  <input id="pass" class="form-control" name="pass" type="password" minlength="6" maxlength="32">
                  <br>
                  <label for="pass_rep">Repeat password:</label>
                  <br>
                  <input id="pass_rep" class="form-control" name="pass" type="password" minlength="6" maxlength="32">
                  <br><br>
                  <nav class="my-2 my-md-0 mr-md-3">
                      <input id="submit" class="btn btn-primary" name="submit" type="submit" value="Edit">
                      <a class="btn btn-danger" href="">Delete</a>
                  </nav>
                </form>
                <?php
              }
          }
        ?>
    </section>
  </div>
</body>
