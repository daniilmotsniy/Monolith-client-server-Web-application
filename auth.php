<?php
  session_start();
  require_once "db/connection.php"; //підключення скрипту

  $sql = mysqli_query($conn, 'SELECT first_name, last_name, email, password, role_id FROM users');
  while ($result = mysqli_fetch_array($sql)) {
      if($_POST['email'] == $result['email'] && $_POST['pass'] == $result['password']){
          $_SESSION['auth'] = 'true';
          $_SESSION['first_name'] = $result['first_name'];
          $_SESSION['last_name'] = $result['last_name'];
          $_SESSION['email'] = $result['email'];
          $_SESSION['role_id'] = $result['role_id'];
          break;
      } else {
          $_SESSION['auth'] = 'false';
      }
  }

  header("Location: pages/restricted.php");
