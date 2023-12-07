<?php

include_once './shared/head.php';
// include_once './shared/header.php';
include_once './shared/asid.php';
include_once './vendor/configDatabase.php';


$message = null;

if (isset($_POST['login'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $hashPassword = sha1($password);

  $select = "SELECT * FROM admins WHERE name = '$name' and email = '$email' and password = '$hashPassword'";
  $s = mysqli_query($conn , $select);
  $row = mysqli_fetch_assoc($s);
  $numRows = mysqli_num_rows($s);

  if ($numRows == 1) {
    $_SESSION['admin'] = [
      "id" => $row['id'],
       "name" => $row['name'],
       "email" => $email,
       "phone" => $row['phone'],
       "image" => '/Back-end/shoppaing/admin/app/admins/upload/'.$row['image'],
    ];

    pathwithout('/');

  } else {
    $message =  "Your Not Admin";
  }
  
}



?>




  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Al-Khateeb</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                <?php if($message != null) : ?>
                <div class="alert alert-danger alert-dismissible fade show text-center my-2 " role="alert">
                    <strong> <?= $message ?> </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <?php endif; ?>



                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & Email & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="name" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter your Email!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="login" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
               
                Designed by <a href="">Al-Khateeb</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->





<?php

include_once './shared/footer.php';
include_once './shared/script.php';

?>  