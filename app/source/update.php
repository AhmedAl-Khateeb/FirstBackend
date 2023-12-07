<?php

include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/head.php';
include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/header.php';
include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/asid.php';

include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/vendor/configDatabase.php';


// Edit
if(isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $selectOneRow = "SELECT * FROM `soures` WHERE id=$id";
    $oneRow = mysqli_query($conn,$selectOneRow);

    $rowData = mysqli_fetch_assoc($oneRow);


// Update
    if (isset($_POST['send'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        
        $update = "UPDATE soures SET name='$name',email='$email' WHERE id=$id";

        mysqli_query($conn , $update);

        path('source/list.php');

    }
}








?>





<main id="main" class="main">
<section class="section">
<div class="card">
  <div class="card-body">

 

    <h1 class="card-title text-center">Update Source</h1>

    
    <form class="row g-3" method="POST">
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Name</label>
        <input type="text" name="name" value="<?= $rowData['name'] ?>" class="form-control" id="inputNanme4">
      </div>
      <div class="col-12">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" name="email" value="<?= $rowData['email'] ?>" class="form-control" id="inputEmail4">
      </div>
    
      <div class="text-center">
        <button type="submit" name="send" class="btn btn-warning">Update</button>
        <button type="reset" class="btn btn-danger">Reset</button>
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