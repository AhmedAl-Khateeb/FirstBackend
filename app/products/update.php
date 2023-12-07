<?php

include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/head.php';
include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/header.php';
include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/asid.php';

include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/vendor/configDatabase.php';


$message = null;


// Read
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $select = "SELECT * FROM `products` WHERE id=$id"; 
    $allData = mysqli_query($conn,$select);

    $row = mysqli_fetch_assoc($allData);

    // join
    $join = "SELECT * FROM `productsdata` WHERE prodId=$id"; 
    $joinData = mysqli_query($conn,$join);

    $rowJoin = mysqli_fetch_assoc($joinData);
}


// Insert
if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $soures = $_POST['soures'];


  // Insert Image

  // *************************************************************

   if(!empty($_FILES['image']['name'])) {
    $image_name = time() . rand(0,2000) . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/";
    move_uploaded_file($tmp_name,$location.$image_name);
  
    //remove old image
     $oldImage = $row['image'];
     unlink("./upload/$oldImage");
   }else{
    $image_name = $row['image'];
   }

  
     $update = "UPDATE `products` SET name='$name' , price=$price , image='$image_name' , categoryid='$category' , souresid='$soures' WHERE id=$id";

     $i = mysqli_query($conn,$update);

     if ($i) {
     $message = "Update Successfully";
     }

     path('products/list.php');
  
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
        <div class="card">
            <div class="card-body">

            <?php if($message != null) : ?>
              <div class="alert alert-success alert-dismissible fade show text-center my-2 col-6" role="alert">
                    <strong> <?= $message ?> </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>

              <h1 class="card-title text-center">Update Products</h1>       
              <form class="row g-3" method="POST" enctype="multipart/form-data">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Product Name</label>
                  <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control" id="inputNanme4">
                </div>
                
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Products Price</label>
                  <input type="number" name="price" value="<?= $row['price'] ?>" class="form-control" id="inputEmail4">
                </div>

                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Image <img width="40" src="./upload/<?= $row['image'] ?>" alt=""> </label>
                  <input type="file" name="image"  class="form-control" id="inputPassword4">
                </div>

                <div class="col-12">
                  <label for="inputAddress" class="form-label">Products Category</label>
                  <select name="category" id="inputAddress" class="form-control">
                    <option selected value="<?= $rowJoin['catID'] ?>"> <?= $rowJoin['categoryName'] ?> </option>
                    <?php foreach($categoryData as $item) : ?>
                         <option value="<?= $item['id'] ?>"> <?= $item['name'] ?> </option>
                      <?php endforeach; ?>
                  </select>
                </div>

                <div class="col-12">
                  <label for="inputAddress" class="form-label">Products Source</label>
                  <select name="soures" id="inputAddress" class="form-control">
                    <option selected value="<?= $rowJoin['souresID'] ?>"> <?= $rowJoin['souresName'] ?> </option>
                    <?php foreach($sourceData as $item) : ?>
                         <option value="<?= $item['id'] ?>"> <?= $item['name'] ?> </option>
                      <?php endforeach; ?>
                  </select>
                </div>

                <div class="text-center">
                  <button type="submit" name="update" class="btn btn-warning"> Update </button>
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