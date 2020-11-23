<?php
  session_start();
  require_once "db/connection.php"; //підключення скрипту

  $sql = mysqli_query($conn, 'SELECT email, password FROM users');
  while ($result = mysqli_fetch_array($sql)) {
      if($_POST['email'] == $result['email'] && $_POST['pass'] == $result['password']){
          $_SESSION['auth'] = 'true';
          break;
      } else {
          $_SESSION['auth'] = 'false';
      }
  }

  header("Location: pages/restricted.php");
