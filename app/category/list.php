<?php

include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/head.php';
include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/header.php';
include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/asid.php';

include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/vendor/configDatabase.php';


$Count = 1;

// Read

$select = "SELECT * FROM `categories`";
$allData = mysqli_query($conn , $select);


// Delete

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $delete = "DELETE FROM `categories` WHERE id=$id";

    $d = mysqli_query($conn , $delete);

    path('category/list.php');
}




?>



<main id="main" class="main">
<section class="section">

<div class="card">
  <div class="card-body">
    <h1 class="card-title text-center">List Category</h1>


    
    <table class="table table-striped">
    
        <tr>
          <th class="text-center bg-dark text-white">NU</th>
          <th class="text-center bg-dark text-white">ID</th>
          <th class="text-center bg-dark text-white">Name</th>
          <th class="text-center bg-dark text-white">Email</th>
          <th class="text-center bg-dark text-white" colspan="2">Action</th>
          
        </tr>
      
      
      <?php foreach($allData as $item) :?>
        <tr>
          <th class="text-center"> <?= $Count++ ?> </th>
          <th class="text-center"> <?= $item['id'] ?> </th>
          <td class="text-center"> <?= $item['name'] ?> </td>
          <td class="text-center"> <?= $item['Email'] ?> </td>

          <td class="text-center"> <a href="<?=url("app/category/update.php?edit=") . $item['id'] ?>"> <i title="Edit" class="bx bxs-message-square-edit"></i> </a> </td>
          <td class="text-center"> <a href="?delete=<?= $item['id'] ?>"> <i title="Remove" class="bx bxs-comment-x text-danger"></i> </a> </td>
        </tr>
      
      <?php endforeach; ?>
     
    </table>
    

  </div>
</div>


</section>
</main>



<?php

include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/shared/footer.php';
include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin//shared/script.php';

?>