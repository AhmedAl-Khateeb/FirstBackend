<?php

include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/head.php';
include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/header.php';
include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/asid.php';

include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/vendor/configDatabase.php';

$errors = [];
$message = null;

// Insert
if (isset($_POST['send'])) {
  $name = filterValidattion($_POST['name']);
  $price = filterValidattion($_POST['price']);
  $category = filterValidattion($_POST['category']);
  $soures = filterValidattion($_POST['soures']);


  //squaritey 
  if (stringValidtion($name , 5)) {
    $errors[] = "Enter Valid Name More Than 5 char";
  }

  if (numberValidtion($price)) {
    $errors[] = "Enter Valid Number";
  }

  // Insert Image

// *************************************************************

  $image_name = time() . rand(0,2000) . $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $image_size = $_FILES['image']['size'];
  $image_type = $_FILES['image']['type'];
  if (fileTypeValidation($image_type , 'image/jpg' , 'image/png' , 'image/jpg' , 'image/jif')) {
    $errors[] = " Your Image Must Be jpg , png";  
  }


  if (fileSizeValidation($image_name , $image_size , 1)) {
    $errors[] = " Your Image Biger Than 1 m ";
  }

  $location = "./upload/";

 


  // *********************
    //  Squar
  // *********************
  if (empty($errors)) {

    move_uploaded_file($tmp_name,$location.$image_name);

     $insert = "INSERT INTO `products` VALUES(NULL,'$name',$price,'$image_name',$category,$soures)";

     $i = mysqli_query($conn,$insert);

     if ($i) {
     $message = "Insert Successfully";
     }
  }
}



// Read Category
$allCategories = "SELECT * FROM `categories`";
$categoryData = mysqli_query($conn , $allCategories);
// Read Source
$allSources = "SELECT * FROM `soures`";
$sourceData = mysqli_query($conn , $allSources);





?>








<main id="main" class="main">
    <section class="section">
    
           <?php if(!empty($errors)) : ?>
            <div id="error" class="alert alert-danger text-center">
              <ul>
                <?php foreach($errors as $error): ?>
                    <li> <?= $error ?> </li>
                  <?php endforeach; ?>
              </ul>
            </div>
           <?php endif; ?>

        <div class="card">
            <div class="card-body">

            <?php if($message != null) : ?>
              <div class="alert alert-success alert-dismissible fade show text-center my-2 col-6" role="alert">
                    <strong> <?= $message ?> </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>

              <h1 class="card-title text-center">Add Products</h1>       
              <form class="row g-3" method="POST" enctype="multipart/form-data">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Product Name</label>
                  <input type="text" name="name" class="form-control" id="inputNanme4">
                </div>
                
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Price</label>
                  <input type="number" name="price" class="form-control" id="inputEmail4">
                </div>

                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Image</label>
                  <input type="file" name="image" class="form-control" id="inputPassword4">
                </div>

                <div class="col-12">
                  <label for="inputAddress" class="form-label">CategoryID</label>
                  <select name="category" id="inputAddress" class="form-control">
                    <?php foreach($categoryData as $item) : ?>
                         <option value="<?= $item['id'] ?>"> <?= $item['name'] ?> </option>
                      <?php endforeach; ?>
                  </select>
                </div>

                <div class="col-12">
                  <label for="inputAddress" class="form-label">SourceID</label>
                  <select name="soures" id="inputAddress" class="form-control">
                    <?php foreach($sourceData as $item) : ?>
                         <option value="<?= $item['id'] ?>"> <?= $item['name'] ?> </option>
                      <?php endforeach; ?>
                  </select>
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
