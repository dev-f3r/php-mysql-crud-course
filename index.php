<?php include('db.php') ?>

<?php include('includes/header.php') ?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4">

      <!-- show a message if it exits -->
      <?php
      if (isset($_SESSION['message'])) {
      ?>
        <!-- alert -->
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message'] ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
        // clear session
        session_unset();
      }
      ?>

      <!-- ////////// FROM TO CREATE TASK ////////// -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="mb-3">
            <input type="text" name="title" id="" class="form-control" placeholder="Task Title" autofocus>
          </div>
          <div class="mb-3">
            <textarea name="description" id="" cols="" rows="2" class="form-control" placeholder="Task Description"></textarea>
          </div>
          <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save task">
        </form>
      </div>
    </div>

    <!-- ////////// TABLE OF TASK ////////// -->
    <div class="col-md-8">
      <table class="table table-bordered">
        <!-- table header -->
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <!-- table body -->
        <tbody>
          <?php
          $query = "SELECT * FROM task";

          // send a message to DB
          $result_tasks = mysqli_query($conn, $query);

          // draw task
          while ($row = mysqli_fetch_array($result_tasks)) { ?>
            <tr>
              <td><?php echo $row['title'] ?></td>
              <td><?php echo $row['description'] ?></td>
              <td><?php echo $row['created_at'] ?></td>
              <td class="">
                <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">
                  <i class="fa-solid fa-pen"></i>
                </a>
                <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </td>
            </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include('includes/footer.php') ?>