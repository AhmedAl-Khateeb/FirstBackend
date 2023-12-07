<?php

include_once './shared/head.php';
include_once './shared/header.php';
include_once './shared/asid.php';
include_once './vendor/configDatabase.php';


$adminID = $_SESSION['admin']['id'];

$select = "SELECT * FROM admins WHERE id = $adminID";
$s = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($s);
// *********************************


$message = null;

if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  //insert image
  if (empty($_FILES['image']['name'])) {
    $image_name = $row['image'];
  }else{
  $image_name = time() . trim(0, 200) . $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $location = "./upload/";
  move_uploaded_file($tmp_name, $location . $image_name);

  $oldImage = $_SESSION['admin']['image'];
  unlink($oldImage);
  }




  $insert = "UPDATE `admins` SET name = '$name' , email = '$email' , image = '$image_name' , phone = '$phone' WHERE id = $adminID";
  $i = mysqli_query($conn, $insert);

  if ($i) {
    $message = "Update Successfully";
    
    $_SESSION['admin']['name'] = $name;
    $_SESSION['admin']['phone'] = $phone;
    $_SESSION['admin']['email'] = $email;

    pathwithout('');
  }
}


if (isset($_POST['updatePassword'])) {
  $password = $_POST['password'];
  $hashPass = sha1($password);

  $newpassword = $_POST['newpassword'];
  $hashnewPass = sha1($newpassword);

  $oldPassword = $row['password'];

  if ($oldPassword == $hashPass) {
    $insert = "UPDATE `admins` SET password = '$hashnewPass' WHERE id = $adminID";
    $i = mysqli_query($conn, $insert);

    $message = "Update Password";
  }else{
    $message  = "False Update Password";
  }

}



?>





<main id="main" class="main">

  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <?php if ($message != null) : ?>

          <div class="alert alert-success alert-dismissible fade show text-center my-2 col-12" role="alert">
            <strong> <?= $message ?> </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

        <?php endif; ?>

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="<?= $_SESSION['admin']['image'] ?>" alt="Profile" class="rounded-circle">
            <h2> <?= $_SESSION['admin']['name'] ?> </h2>
            <h3> <?= $_SESSION['admin']['email'] ?> </h3>
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>



              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">About</h5>
                <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8"><?= $_SESSION['admin']['name'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Company</div>
                  <div class="col-lg-9 col-md-8">Lueilwitz, Wisoky and Leuschke</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Job</div>
                  <div class="col-lg-9 col-md-8">Web Developer</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Country</div>
                  <div class="col-lg-9 col-md-8">EGYPT</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address</div>
                  <div class="col-lg-9 col-md-8">Fayoum, Tamia, Qasr Rashwan</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8"> 01092951734</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8"><?= $_SESSION['admin']['email'] ?></div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form method="POST" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="<?= $_SESSION['admin']['image'] ?>" alt="Profile">
                      <div class="pt-2">
                        <input type="file" name="image" class="btn btn-primary btn-sm" title="Upload new profile image"></input>

                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input  name="name"  value="<?= $row['name'] ?>" type="text" class="form-control" id="fullName" value="Kevin Anderson">
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                      <input  name="phone"  value="<?= $row['phone'] ?>" type="text" class="form-control" id="Phone" value="(436) 486-3538 x29071">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input  name="email"  value="<?= $row['email'] ?>" type="email" class="form-control" id="Email" value="k.anderson@example.com">
                    </div>
                  </div>



                  <div class="text-center">
                    <button type="submit" name="update"  class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-settings">

                <!-- Settings Form -->
                <form>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                    <div class="col-md-8 col-lg-9">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="changesMade" checked>
                        <label class="form-check-label" for="changesMade">
                          Changes made to your account
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="newProducts" checked>
                        <label class="form-check-label" for="newProducts">
                          Information on new products and services
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="proOffers">
                        <label class="form-check-label" for="proOffers">
                          Marketing and promo offers
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                        <label class="form-check-label" for="securityNotify">
                          Security alerts
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End settings Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form method="POST">

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword">
                    </div>
                  </div>

                  

                  <div class="text-center">
                    <button type="submit" name="updatePassword" class="btn btn-primary">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->



<?php

include_once './shared/footer.php';
include_once './shared/script.php';

?>