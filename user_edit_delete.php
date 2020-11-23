<?php
    require_once "db/connection.php"; // conn
    $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    $first_name = mysqli_real_escape_string($conn, $_REQUEST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_REQUEST['last_name']);
    $password = mysqli_real_escape_string($conn, $_REQUEST['pass']);
    session_start();

    if (count($_POST)>0) {
      if($_POST['user_edit']){
        $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name',
        password='$password' WHERE id='$id'";
        $res = mysqli_query($conn, $sql);
        header('Location: pages/restricted.php?id='.$_SESSION['id']);
      }

      if($_POST['user_delete']){
        $sql = "DELETE FROM users WHERE id='$id'";
        $res = mysqli_query($conn, $sql);
        header('Location: ../index.php');
      }

      if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
      }

    }
?>
