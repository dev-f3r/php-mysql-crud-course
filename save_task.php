<?php
// import db conection
include("db.php");

if (isset($_POST['save_task'])) {
  $title = $_POST['title']; // input name='title'
  $description = $_POST['description'];

  // DB REQUEST
  $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";

  // USE DB
  $result = mysqli_query($conn, $query);
  if (!$result) {
    die("Query Failed");
  }

  // save a message in the session
  $_SESSION['message'] = "Task saved succesfully";
  $_SESSION['message_type'] = "success";

  // REDIRECT ONCE THE TASK IS SAVED
  header("Location: index.php");
}

?>