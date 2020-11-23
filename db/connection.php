<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "clent_server_app"; //повинна бути створена в субд

  // Встановлення з'єднання
  $conn = new mysqli($servername, $username, $password, $database);

  // Перевірка з'єднання
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

?>
