<?php

include_once 'C:/xampp/htdocs/Back-end/shoppaing/admin/vendor/functions.php';


?>



<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="<?= url("index.php") ?>">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->



  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#admins" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Admins</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="admins" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?= url("app/admins/add.php") ?>">
          <i class="bi bi-circle"></i><span>Add</span>
        </a>
      </li>
      <li>
        <a href="<?= url("app/admins/list.php") ?>">
          <i class="bi bi-circle"></i><span>List</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->
 



  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#category" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="category" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?= url("app/category/add.php") ?>">
          <i class="bi bi-circle"></i><span>Add</span>
        </a>
      </li>
      <li>
        <a href="<?= url("app/category/list.php") ?>">
          <i class="bi bi-circle"></i><span>List</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->


  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#source" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Sources</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="source" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?= url("app/source/add.php") ?>">
          <i class="bi bi-circle"></i><span>Add</span>
        </a>
      </li>
      <li>
        <a href="<?= url("app/source/list.php") ?>">
          <i class="bi bi-circle"></i><span>List</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->



  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#products" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="products" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?= url("app/products/add.php") ?>">
          <i class="bi bi-circle"></i><span>Add</span>
        </a>
      </li>
      <li>
        <a href="<?= url("app/products/list.php") ?>">
          <i class="bi bi-circle"></i><span>List</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->

  
 


  <li class="nav-heading">Pages</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="<?= url("users-profile.php") ?>">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="<?= url("pages-faq.php") ?>">
      <i class="bi bi-question-circle"></i>
      <span>F.A.Q</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href=" <?= url("pages-contact.php") ?> ">
      <i class="bi bi-envelope"></i>
      <span>Contact</span>
    </a>
  </li><!-- End Contact Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href=" <?= url("pages-register.php") ?> ">
      <i class="bi bi-card-list"></i>
      <span>Register</span>
    </a>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href=" <?= url("pages-login.php") ?> ">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Login</span>
    </a>
  </li><!-- End Login Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href=" <?= url("pages-error-404.php") ?> ">
      <i class="bi bi-dash-circle"></i>
      <span>Error 404</span>
    </a>
  </li><!-- End Error 404 Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="<?= url("pages-blank.php") ?>">
      <i class="bi bi-file-earmark"></i>
      <span>Blank</span>
    </a>
  </li><!-- End Blank Page Nav -->

</ul>

</aside><!-- End Sidebar-->