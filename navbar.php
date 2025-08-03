<?php
session_start(); 

if (!isset($_SESSION['username'])) {
    $isLoggedIn = false;
} else {
    $isLoggedIn = true;
    $username = $_SESSION['username']; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blood Bank Navbar</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    .navbar {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      box-shadow: 0 4px 6px rgba(200, 0, 0, 0.1);
    }

    .navbar-brand {
      font-weight: bold;
      font-size: 1.5rem;
      color: #d9534f;
    }

    .navbar-brand:hover {
      color: #c9302c;
    }

    .nav-link {
      color: #333;
      transition: color 0.3s ease;
    }

    .nav-link:hover,
    .nav-link.active {
      color: #d9534f;
    }

    .dropdown-menu {
      background-color: #f8f9fa;
      border-radius: 0.25rem;
      border: 1px solid #dee2e6;
    }

    .dropdown-item {
      color: #333;
      transition: background-color 0.3s ease;
    }

    .dropdown-item:hover {
      background-color: #d9534f;
      color: white;
    }

    .form-control {
      border-radius: 0.25rem;
      border: 1px solid #ced4da;
    }

    .btn-outline-success {
      color: #28a745;
      border-color: #28a745;
    }

    .btn-outline-success:hover {
      background-color: #28a745;
      color: white;
    }

    .nav-item .nav-link {
      display: flex;
      align-items: center;
      gap: 8px;
      font-weight: 600;
    }

    .icon-circle {
      background-color: #f8d7da;
      color: #d9534f;
      border-radius: 50%;
      padding: 6px 9px;
      display: inline-block;
      transition: background-color 0.3s ease;
    }

    .nav-link:hover .icon-circle {
      background-color: #d9534f;
      color: white;
    }

    .username {
      font-weight: bold;
      color: #333;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Blood Bank</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">
            <span class="icon-circle"><i class="fas fa-home"></i></span> Home
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            <span class="icon-circle"><i class="fas fa-tint"></i></span> Looking for Blood
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
            <li><a class="dropdown-item" href="blood_request_list.php">Blood request list</a></li>
            <li><a class="dropdown-item" href="thelasemia_request_list.php">Thalassemia Request list</a></li>

            <li><a class="dropdown-item" href="plasma_request_list.php">Plasma Request list</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            <span class="icon-circle"><i class="fas fa-hand-holding-heart"></i></span> Want to Donate Blood
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
            <li><a class="dropdown-item" href="bloodrequest.php">blood request</a></li>
            <li><a class="dropdown-item" href="plasmarequest.php">Plasma Request</a></li>
            <li><a class="dropdown-item" href="thelasemia.php">Thalassemia Request</a></li>
    
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            <span class="icon-circle"><i class="fas fa-circle-info"></i></span> About
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
            <li><a class="dropdown-item" href="about_blood_donation.html">Blood Donation</a></li>
            <li><a class="dropdown-item" href="about_plasma.html">Plasma</a></li>
            <li><a class="dropdown-item" href="about_thalassemia.html">Thalassemia</a></li>
            <li><a class="dropdown-item" href="about_us.html">Contact Us</a></li>
          </ul>
        </li>
      </ul>

      <?php if ($isLoggedIn): ?>
        <span class="navbar-text username"> <?= htmlspecialchars($username) ?></span>
        <a href="logout.php" class="btn btn-outline-danger ms-3">Logout</a>
      <?php endif; ?>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


