<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Main page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/table.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<body>
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">Logo</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Log In</button>
            <a class="btn btn-outline-primary" href="/pages/registration.php">Sign Up</a>
        </nav>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Sign In</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <section class="overlay">
                  <form action="../auth.php" method="post">
                    <label for="email">Email:</label>
                    <br>
                    <input id="email" class="form-control" name="email" type="email" required minlength="3" maxlength="20">
                    <br>
                    <label for="pass">Password:</label>
                    <br>
                    <input id="pass" class="form-control" name="pass" type="password" required minlength="3" maxlength="20">
                    <br><br>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input id="submit" class="btn btn btn-primary" name="submit" type="submit" value="Submit">
                  </form>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="container">
    <section class="overlay">
        <h3>Famous users</h3>
        <table id="users_table">
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Last name</th>
          <th>Email</th>
          <th>Role</th>
        </tr>
        <?php
        require_once "../db/connection.php";
        $sql = "SELECT id, first_name, last_name, email, role_id FROM users";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>";
                $url = "/pages/user_view.php?id=".$row['id'];
        ?>
              <a href="<?php echo $url; ?>".php">
              <?php
                echo $row['id'];
              ?>
              </a>

        <?php
              echo "</td>";
              echo "<td>".$row['first_name']." "."</td>";
              echo "<td>".$row['last_name']." "."</td>";
              echo "<td>".$row['email']." "."</td>";
              echo "<td>".$row['role_id']." "."</td>";
              echo "</tr><br>";
            }
          }
        ?>
              </table>
    </section>
  </div>
</body>
</html>
