<?php
include 'db.php';

// Fetch all tea products from database
$sql = "SELECT * FROM coconut_products ORDER BY created_at DESC";   // Chanage the table name with the new one 
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ceymos - Importers of Ceylon Quality</title>
  <link rel="icon" type="image/png" href="assets/headLogos/h1.png">


  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Cinnomon page CSS -->
  <link rel="stylesheet" href="css/cinnamon_Style.css">
  <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
    rel="stylesheet">


</head>

<body>
  <header>
    <div class="header-container">
      <div class="logo">
        <img src="assets/headLogos/h1.png" alt="CEYMOS Logo" style="height: 40px; vertical-align: middle;">
        CEYMOS LANKA
      </div>
      <nav>
        <ul class="nav-links">
          <li><a href="Home.html">Home</a></li>
          <li><a href="Home.html#products">Products</a></li>
          <li><a href="Home.html#about">About</a></li>
          <li><a href="Home.html#contact">Contact</a></li>
          <!-- <li><a href="https://www.google.co.uk/"><i class="fab fa-whatsapp"></i></a></li> -->

        </ul>
      </nav>
    </div>
  </header>

  <!-- Products Section (updated with multiple items per category) -->
  <section id="products" class="section-offset">
    <h2>Our Cinnamon Products</h2>

    <!-- Ceylon Tea Category -->
    <div class="product-category">
      <div class="category-header">
        <h3 class="category-title">Ceylon Spices Items</h3>
        <p>Premium quality teas from Sri Lanka's finest estates</p>
      </div>

      <div class="sub-items-grid">
        <!-- Tea Item 1 -->
        <div class="sub-item-card animate">
          <a href="black-tea.html">
            <img src="sigiriya.jpg" class="sub-item-img" alt="Ceylon Black Tea">
          </a>
          <div class="sub-item-content">
            <h4 class="sub-item-title">Coconut Oil</h4>
            <p class="sub-item-desc">Cold-pressed organic coconut oil for cooking and beauty</p>

          </div>
        </div>

        <!-- Tea Item 2 -->
        <div class="sub-item-card animate">
          <a href="green-tea.html">
            <img src="sigiriya.jpg" class="sub-item-img" alt="Ceylon Green Tea">
          </a>
          <div class="sub-item-content">
            <h4 class="sub-item-title">Coconut Milk Powder</h4>
            <p class="sub-item-desc">Instant coconut milk powder for cooking and beverages.</p>

          </div>
        </div>

        <!-- Tea Item 3 -->
        <div class="sub-item-card animate">
          <a href="white-tea.html">
            <img src=" sigiriya.jpg" class="sub-item-img" alt="Ceylon White Tea">
          </a>
          <div class="sub-item-content">
            <h4 class="sub-item-title">Coconut Sugar</h4>
            <p class="sub-item-desc">Natural sweetener with low glycemic index.</p>

          </div>
        </div>
      </div>
    </div>



    <!-- View All Products Button -->
    <div class="text-center mt-5">
      <a href="all-products.html" class="btn btn-primary">View All Products</a>
    </div>
    </div>
  </section>


  <!-- Footer -->
  <footer class="text-light pt-5 pb-4">
    <div class="container">
      <div class="row">

        <div class="col-lg-4 mb-4">
          <h5>Ceymos Lanka</h5>
          <p>Importers of premium Ceylon products including tea, spices, and coconut goods. Delivering quality
            globally since 1990.</p>
          <div class="mt-3">
            <!-- <a href="#" class="btn btn-outline-light btn-sm">Our Certifications</a> -->
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mb-4">
          <h5>Quick Links</h5>
          <a href="Home.html">Home</a>
          <a href="Home.html#products">Products</a>
          <a href="Home.html#about">About Us</a>
          <a href="Home.html#contact">Contact</a>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <h5>Products</h5>
          <a href="tea.php">Ceylon Tea</a>
          <a href="coconut.html">Coconut Products</a>
          <a href="Cinnamon.html">Spices</a>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <h5>Connect With Us</h5>
          <div class="social-links mt-3">
            <a href="https://www.facebook.com/people/Ceymos-Lanka/61576319648785/"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/ceymoslanka"><i class="fab fa-instagram"></i></a>
            <!-- <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a> -->
          </div>
        </div>

      </div>

      <!-- Copyright row should be INSIDE the container -->
      <div class="row mt-4 copyright">
        <div class="col text-center">
          <small> &copy; 2025 Ceymos Lanka. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of
              Service</a></small>
        </div>
      </div>

    </div> <!-- end container -->
  </footer>



  <a href="#" class="back-to-top" id="backToTopBtn" title="Go to top">
    <i class="fas fa-chevron-up"></i>
  </a>



</body>

</html>