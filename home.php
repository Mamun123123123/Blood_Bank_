<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Blood Bank | Home</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar {
      box-shadow: 0 4px 6px rgba(230, 0, 0, 0.1);
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
      font-weight: 600;
      transition: color 0.3s ease;
    }

    .nav-link:hover,
    .nav-link.active {
      color: #d9534f;
    }

    .icon-circle {
      background-color: #f8d7da;
      color: #d9534f;
      border-radius: 50%;
      padding: 6px 9px;
      margin-right: 6px;
    }

    .nav-link:hover .icon-circle {
      background-color:rgb(255, 0, 30);
      color: white;
    }

    .hero-section {
      background: url('download(1).jpg') no-repeat center center/cover;
      height: 100vh;
      position: relative;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .hero-section::before {
      content: '';
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgb(194, 88, 88);
      z-index: 1;
    }

    .hero-content {
      position: relative;
      z-index: 2;
    }

    .how-it-works {
      padding: 60px 0;
      background-color:rgb(215, 97, 97);
      text-align: center;
    }

    .card {
      transition: transform 0.3s ease;
      border: none;
    }

    .card:hover {
      transform: translateY(-10px);
    }

    footer {
      background-color:rgb(85, 28, 1);
      color: white;
      padding: 20px 0;
    }

    .alert-info {
      font-size: 1.1rem;
    }

    .result-message {
      font-size: 1.2rem;
      font-weight: bold;
      margin-top: 20px;
    }

    .result-eligible {
      color: green;
    }

    .result-not-eligible {
      color: red;
    }
  </style>
</head>
<body>

<?php include 'navbar.php'; ?>
<!-- Navbar -->


<!-- Hero Section -->
<section class="hero-section">
  <div class="hero-content">
    <h1 class="display-3 fw-bold">Donate Blood, Save Lives</h1>
    <p class="lead">Be the reason someone lives. Help make a difference today.</p>
    <a href="become_donor.php" class="btn btn-danger btn-lg mt-3">Become a Donor</a>
  </div>
</section>

<!-- Image Section after Hero Section -->
<section class="py-5 text-center">
  <div class="container">
    <h2 class="mb-4">Why Donate Blood?</h2>
    <div class="row g-4">
      <!-- Image 1 -->
      <div class="col-md-4">
        <div class="card shadow-sm border-0">
          <img src="img.jpg" class="card-img-top" alt="">
          <div class="card-body">
            <p class="card-text">Every donation has the power to save multiple lives. Your blood donation helps people in emergencies, surgeries, and more.</p>
          </div>
        </div>
      </div>

      <!-- Image 2 -->
      <div class="col-md-4">
        <div class="card shadow-sm border-0">
          <img src="download.jpg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">Donating blood has benefits for the donor as well, such as improved cardiovascular health and reduced risk of certain diseases.</p>
          </div>
        </div>
      </div>

      <!-- Image 3 -->
      <div class="col-md-4">
  <div class="card shadow-sm border-0">
    <img src="j.png" class="card-img-top" alt="">
    <div class="card-body">
      <p class="card-text">By donating blood, you’re giving someone a second chance at life. It’s one of the most powerful and selfless acts a person can do.</p>
    </div>
  </div>
</div>

    </div>
  </div>
</section>



  <div class="container py-5">
    <h2 class="text-center mb-4">Blood Donation Eligibility Quiz</h2>

    <!-- Eligibility Form -->
    <form id="eligibility-form">
      <div class="mb-3">
        <label for="age" class="form-label">How old are you?</label>
        <input type="number" class="form-control" id="age" required>
      </div>

      <div class="mb-3">
        <label for="weight" class="form-label">What is your weight (in kg)?</label>
        <input type="number" class="form-control" id="weight" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Do you have any chronic illnesses? (e.g., HIV, Hepatitis, etc.)</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="illness" id="noIllness" value="no" checked>
          <label class="form-check-label" for="noIllness">
            No
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="illness" id="yesIllness" value="yes">
          <label class="form-check-label" for="yesIllness">
            Yes
          </label>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Have you donated blood in the last 8 weeks?</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="donated" id="donatedNo" value="no" checked>
          <label class="form-check-label" for="donatedNo">
            No
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="donated" id="donatedYes" value="yes">
          <label class="form-check-label" for="donatedYes">
            Yes
          </label>
        </div>
      </div>

      <button type="submit" class="btn btn-danger">Check Eligibility</button>
    </form>

    <!-- Eligibility Result -->
    <div id="result" class="result-message d-none"></div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    document.getElementById('eligibility-form').addEventListener('submit', function(event) {
      event.preventDefault();

      // Get form values
      var age = document.getElementById('age').value;
      var weight = document.getElementById('weight').value;
      var illness = document.querySelector('input[name="illness"]:checked').value;
      var donated = document.querySelector('input[name="donated"]:checked').value;

      // Eligibility check logic
      var eligible = true;
      var message = '';

      if (age < 18 || age > 65) {
        eligible = false;
        message = 'You must be between 18 and 65 years old to donate blood.';
      } else if (weight < 50) {
        eligible = false;
        message = 'You must weigh at least 50 kg to donate blood.';
      } else if (illness === 'yes') {
        eligible = false;
        message = 'You cannot donate blood if you have chronic illnesses like HIV or Hepatitis.';
      } else if (donated === 'yes') {
        eligible = false;
        message = 'You cannot donate blood if you have donated in the last 8 weeks.';
      }

      // Show the result
      var resultElement = document.getElementById('result');
      resultElement.classList.remove('d-none');
      if (eligible) {
        resultElement.classList.add('result-eligible');
        resultElement.textContent = 'Congratulations! You are eligible to donate blood.';
      } else {
        resultElement.classList.add('result-not-eligible');
        resultElement.textContent = message;
      }
    });
  </script>


<!-- Know Your Blood Type - Informative Cards -->
<section class="bg-crimson p-5 text-center">
  <div class="container">
    <h2 class="mb-4">Know Your Blood Type</h2>
    <div class="row g-4">
      <?php
        $bloodTypes = [
          'A+' => ['Donate to: A+, AB+', 'Receive from: A+, A-, O+, O-'],
          'A-' => ['Donate to: A+, A-, AB+, AB-', 'Receive from: A-, O-'],
          'B+' => ['Donate to: B+, AB+', 'Receive from: B+, B-, O+, O-'],
          'B-' => ['Donate to: B+, B-, AB+, AB-', 'Receive from: B-, O-'],
          'O+' => ['Donate to: A+, B+, O+, AB+', 'Receive from: O+, O-'],
          'O-' => ['Donate to: Everyone (Universal Donor)', 'Receive from: O- only'],
          'AB+' => ['Donate to: AB+ only', 'Receive from: All (Universal Recipient)'],
          'AB-' => ['Donate to: AB+, AB-', 'Receive from: AB-, A-, B-, O-']
        ];

        foreach ($bloodTypes as $type => $info) {
          echo "
          <div class='col-md-3 col-sm-6'>
            <div class='card h-100 shadow-sm border-0'>
              <div class='card-body'>
                <h3 class='text-danger'>$type</h3>
                <p class='mb-1'><strong>{$info[0]}</strong></p>
                <p><strong>{$info[1]}</strong></p>
              </div>
            </div>
          </div>";
        }
      ?>
    </div>
  </div>
</section>


<!-- How It Works -->
<section class="how-it-works">
  <div class="container">
    <h2 class="mb-5">How It Works</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card p-4 shadow-sm">
          <i class="fas fa-user-plus fa-2x text-danger mb-3"></i>
          <a href="registration.php">registration</a>
          <p>Create a profile to become a donor or request blood.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-4 shadow-sm">
          <i class="fas fa-tint fa-2x text-danger mb-3"></i>
          <h5>Donate</h5>
          <p>Book an appointment at the nearest donation center.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-4 shadow-sm">
          <i class="fas fa-hand-holding-heart fa-2x text-danger mb-3"></i>
          <h5>Save Lives</h5>
          <p>Your blood saves lives—see the impact you make!</p>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Footer -->
<footer class="text-center">
  <p class="mb-0">&copy; <?php echo date("Y"); ?> Blood Bank. All rights reserved.</p>
</footer>







<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
