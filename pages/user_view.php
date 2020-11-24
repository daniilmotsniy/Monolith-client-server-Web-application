<?php session_start(); ?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>User info</title>
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
      if ($_SESSION['admin']=='false'):
      ?>
      <?php
        require_once "../db/connection.php";

        $sql = "SELECT * FROM users u LEFT JOIN roles r ON u.role_id = r.id_ WHERE u.id=".$_GET['id'];

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
                echo "<td>".$row['title']." "."</td>";
              echo "</tr><br>";
          }
        }
      ?>
      <?php endif?>
      <?php
      if ($_SESSION['admin']=='true'):
      ?>
        <?php
          require_once "../db/connection.php";
          $sql_user = "SELECT * FROM users u LEFT JOIN roles r ON u.role_id = r.id_ WHERE u.id=".$_GET['id'];
          $result_user = $conn->query($sql_user);

          if ($result_user->num_rows > 0) {
              while($row_user = $result_user->fetch_assoc()) { ?>
                <h3>Account info</h3>
                <form action="../edit_delete.php" method="post">
                  <label for="id">Id:</label>
                  <br>
                  <input id="id" class="form-control" name="id" type="text" value="<?php echo $row_user['id']; ?>" minlength="1" maxlength="20">
                  <br>
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
                  <input id="pass" class="form-control" name="pass" type="text" value="<?php echo $row_user["password"]; ?>" minlength="6" maxlength="32">
                  <br>
                  <label for="email">Email:</label>
                  <br>
                  <input id="email" class="form-control" name="email" type="text" value="<?php echo $row_user["email"]; ?>"minlength="6" maxlength="32">
                  <br>
                  <label for="role_id">Role id (0 - user, 1 - admin):</label>
                  <br>
                  <input id="role_id" class="form-control" name="role_id" type="text" value="<?php echo $row_user["role_id"]; ?>"minlength="1" maxlength="1">
                  <br><br>
                  <nav class="my-2 my-md-0 mr-md-3">
                      <input id="submit" class="btn btn-primary" name="edit" type="submit" value="Edit">
                      <input id="submit" class="btn btn-danger" name="delete" type="submit" value="Delete">
                  </nav>
                </form>
                <?php
              }
          }
        ?>
      <?php endif?>

    </section>
  </div>
</body>
