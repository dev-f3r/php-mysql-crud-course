<?php
include('db.php');

// GET FORM
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // request
  $query = "SELECT * FROM task WHERE id = '$id'";
  // send request
  $result = mysqli_query($conn, $query);
  // mysqli_num_rows to check how many rows have the response
  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_array($result);
    $title = $row['title'];
    $description = $row['description'];
  } else {
    echo 'error query';
  }
}

// UPDATE TASK
if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $title = $_POST['title'];
  $description = $_POST['description'];

  // request
  $query = "UPDATE task set title = '$title', description = '$description' WHERE id = '$id'";
  // send request to DB
  mysqli_query($conn, $query);

  // redirect
  $_SESSION['message'] = "Task Updated Successfully";
  $_SESSION['message_type'] = "warning";
  header("Location: index.php");
}

include('includes/header.php');
?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="mb-3">
            <input type="text" name="title" id="" class="form-control" value="<?php echo $title; ?>" placeholder="Edit Title" autofocus>
          </div>
          <div class="mb-3">
            <textarea name="description" id="" cols="" rows="2" class="form-control" placeholder="Edit Description"><?php echo $description; ?></textarea>
          </div>
          <button class="btn btn-success btn-block" name="update">
            Update
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
include('includes/header.php');
