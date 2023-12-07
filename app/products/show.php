<?php

include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/head.php';
include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/header.php';
include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/asid.php';

include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/vendor/configDatabase.php';



$Count = 1;

// Read
if (isset($_GET['show'])) {
    $id = $_GET['show'];
    $select = "SELECT * FROM `productsdata` WHERE prodId=$id"; 
    $allData = mysqli_query($conn,$select);

    $row = mysqli_fetch_assoc($allData);
}


// Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $delete = "DELETE FROM `products` WHERE id=$id";
    $d = mysqli_query($conn,$delete);

    path('products/list.php');
}










?>


<main id="main" class="main">


  <div class="container">
  <div class="card col-md-4">
     <img width="100%" src="./upload/<?= $row['image'] ?>" alt="" class="img-top img-fluid">
       <br>
    <div class="card-body">

      <h5> Name : <?= $row['productsName'] ?> </h5>
      <hr>
      <h5> Price : <?= $row['Price'] ?> </h5>
      <hr>
      <h5> Category : <?= $row['categoryName'] ?> </h5>
      <hr>
      <h5> Soures : <?= $row['souresName'] ?> </h5>
      <hr>

    </div>
  </div>
 </div>










</main>




















<?php

include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/footer.php';
include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin//shared/script.php';

?>