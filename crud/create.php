<?php
require 'db.php';
$message = '';
if (isset($_POST['name'])  && isset($_POST['email'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $sql = 'INSERT INTO people(name, email) VALUES(:name, :email)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':email' => $email])) {
    $message = 'data inserted successfully';
    header("Location: http://localhost/crud/");
  }
}


?>

<?php require 'header.php'; ?>

<div class="container">
  <div class="card">
    <div class=" card-header">
      <h2 style="text-align:center">create person</h2>
    </div>
    <div class="card-body">

      <div class="p-3 mb-2  text-white">

        <?php if (!empty($message)) : ?>
          <div class="alert alert-success">
            <?= $message; ?>
          </div>
        <?php endif; ?>

        <form method="post">


          <div class="container mt-5 mb-5 d-flex justify-content-center">
            <div class="card px-1 py-4" style="width: 600px">
              <div class="card-body">

                <!-- name -->
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input class="form-control" type="text" placeholder="enter your name" name="name" id="name">

                      </div>
                    </div>
                  </div>
                </div>

                <br>
                <!-- email -->
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group">
                          <input class="form-control" type="email" placeholder="enter your email" name="email">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <br>

                <div class="form-group">
                  <!-- <button class="btn btn-primary btn-block confirm-button">Confirm</button> -->
                  <button type="submit" class="btn btn-primary btn-block confirm-button" name="submit">create </button>
                </div>

              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>

</div>


<?php require 'footer.php' ?>