<?php

include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/head.php';
include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/header.php';
include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/asid.php';

include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/vendor/configDatabase.php';



$message = null;

// Edit
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $selectOneRow = "SELECT * FROM `categories` WHERE id=$id";
    $oneRow = mysqli_query($conn , $selectOneRow);
    $rowData = mysqli_fetch_assoc($oneRow);



// Update
  
if (isset($_POST['send'])) {
  $name = $_POST['name'];


  $update = "UPDATE categories SET name='$name' WHERE id=$id";

  mysqli_query($conn , $update);

  $message = "Update Successfully";


  path('category/list.php');
}
}

?>


<main id="main" class="main">
<section class="section">


<div class="card">
            <div class="card-body">

           

              <h1 class="card-title text-center">Update Category</h1>

              
              <form method="POST">
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" value="<?= $rowData['name'] ?>" class="form-control" id="inputText">
                  </div>
                </div>

                
                
               
                
                <div class="text-center">
                  <button type="submit" name="send" class="btn btn-warning">Update</button>
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