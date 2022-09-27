<?php
include('db.php');

// URL id
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // request
  $query = "DELETE FROM task WHERE id = '$id'";

  // send the request to DB
  $result = mysqli_query($conn, $query);
  if (!$result) {
    die("Query Failed");
  }

  // save a message
  $_SESSION['message'] = "Task Removed Successfully";
  $_SESSION['message_type'] = "danger";

  // redirection
  header("Location: index.php");
}
