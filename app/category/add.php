<?php

include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/head.php';
include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/header.php';
include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/asid.php';

include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/vendor/configDatabase.php';



$message = null;

// insert
if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $insert = "INSERT INTO `categories` VALUES(NULL,'$name','$email')";

    $i = mysqli_query($conn , $insert);

    if ($i) {
        $message = "Insert Successfully";
    }
}


?>


<main id="main" class="main">
  <section class="section">


          <div class="card">
            <div class="card-body">

            <?php if($message != null) : ?>
                <div class="alert alert-warning alert-dismissible fade show text-center my-2 col-3" role="alert">
                    <strong> <?= $message ?> </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <?php endif; ?>

              <h1 class="card-title text-center">Add Category</h1>

              
              <form method="POST">
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="inputText">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" id="inputText">
                  </div>
                </div>
                
               
                
                <div class="text-center">
                  <button type="submit" name="send" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form>

            </div>
          </div>



  </section>
</main>


<?php

include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/footer.php';
include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin//shared/script.php';

?>