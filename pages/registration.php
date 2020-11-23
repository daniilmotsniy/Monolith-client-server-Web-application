<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Registration</title>
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
    <section class="overlay">
        <h3>Sign Up</h3>
        <form action="../reg.php" method="post">
          <label for="first_name">First name:</label>
          <br>
          <input id="first_name" class="form-control" name="first_name" type="text" required minlength="2" maxlength="20" pattern="[a-zA-Z]+">
          <br>
          <label for="last_name">Last name:</label>
          <br>
          <input id="last_name" class="form-control" name="last_name" type="text" required minlength="2" maxlength="20" pattern="[a-zA-Z]+">
          <br>
          <label for="role_id">Id role:</label>
          <br>
          <select class="form-control" id="role_id" name="role_id" required>
                <option>0</option>
                <option>1</option>
          </select><br>
          <label for="login">Email:</label>
          <br>
          <input id="email" class="form-control" name="email" type="email" required minlength="3" maxlength="32">
          <br>
          <label for="pass">Password:</label>
          <br>
          <input id="pass" class="form-control" name="pass" type="password" required minlength="6" maxlength="32">
          <br>
          <label for="pass_rep">Repeat password:</label>
          <br>
          <input id="pass_rep" class="form-control" name="pass" type="password" required minlength="6" maxlength="32">
          <br><br>
          <input id="submit" class="btn btn-lg btn-primary" name="submit" type="submit" value="Submit">
        </form>
    </section>
  </div>
</body>
