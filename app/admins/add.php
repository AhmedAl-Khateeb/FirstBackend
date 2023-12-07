<?php

include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/head.php';
include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/header.php';
include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/asid.php';

include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/vendor/configDatabase.php';
include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/vendor/functions.php';


$message = null;
$password = "";



if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $hash_password = sha1($_POST['password']);
    $phone = $_POST['phone'];

   

   //insert image
   $image_name = time() . trim(0,200) . $_FILES['image']['name'];
   $tmp_name = $_FILES['image']['tmp_name'];
   $location = "./upload/";
    move_uploaded_file($tmp_name , $location . $image_name); 



    $insert = "INSERT INTO `admins` VALUES(NULL , '$name' , '$email' , '$image_name' , '$hash_password' , '$phone')";
    $i = mysqli_query($conn , $insert);
    
 

 

    if ($i) {
        $message = "Insert Successfully";
        $password = "";
    }
}


auth();
?>





<main id="main" class="main">
<section class="section">
<div class="card">
  <div class="card-body">


  <?php if($message != null) : ?>

    <div class="alert alert-success alert-dismissible fade show text-center my-2 col-3" role="alert">
        <strong> <?= $message ?> </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <?php endif; ?>

    <h1 class="card-title text-center">Add Admin Like You</h1>

    
    <form class="row g-3" method="POST" enctype="multipart/form-data">
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="inputNanme4">
      </div>
      <div class="col-12">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="inputEmail4">
      </div>
      <div class="col-12">
        <label for="inputEmail4" class="form-label">Image</label>
        <input type="file" name="image" class="form-control" id="inputEmail4">
      </div>
      <div class="col-12">
        <label for="inputEmail4" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="inputEmail4">
      </div>
      <div class="col-12">
        <label for="inputEmail4" class="form-label">Phone</label>
        <input type="number" name="phone" class="form-control" id="inputEmail4">
      </div>
    
      <div class="text-center">
        <button type="submit" name="send" class="btn btn-primary">Submit</button>
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