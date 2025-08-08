<?php
include 'db.php';

// Fetch all cinnamon products from database
$sql = "SELECT * FROM cinnamon_product ORDER BY created_at DESC";
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
          <li><a href="https://api.whatsapp.com/send/?phone=94771955100&text&type=phone_number&app_absent=0"><i class="fab fa-whatsapp"></i></a></li>

        </ul>
      </nav>
    </div>
  </header>

  <!-- Products Section (Updated with Multiple Items per Category) -->
  <section id="products" class="section-offset">
    <div class="container">
      <h2 class="text-center mb-5">Our Products</h2>

      <!-- Sri Lankan Cinnamon Products Section -->
      <section id="sri-lankan-cinnamon" class="py-5">
        <div class="container">
          <h2 class="text-center mb-4">Sri Lankan Cinnamon Products</h2>
          <p class="lead text-center">
            Sri Lankan <strong>Ceylon Cinnamon</strong>, also known as <em>"true cinnamon"</em>,
            is prized worldwide for its sweet aroma, delicate flavor, and numerous health benefits.
            Grown mainly in Sri Lanka’s southern coastal belt, it is carefully hand-rolled into thin golden-brown quills,
            ensuring unmatched quality and purity.
          </p>

          <h4 class="mt-5">Health Benefits of Ceylon Cinnamon</h4>
          <ul class="list-unstyled">
            <li>➤ <strong>Rich in Antioxidants</strong> – Helps combat oxidative stress and supports overall wellness.</li>
            <li>➤ <strong>Supports Heart Health</strong> – Helps maintain healthy blood pressure and cholesterol levels.</li>
            <li>➤ <strong>Promotes Healthy Digestion</strong> – Traditionally used to aid digestion and reduce discomfort.</li>
            <li>➤ <strong>Anti-Inflammatory Properties</strong> – May help reduce inflammation in the body.</li>
            <li>➤ <strong>Helps Regulate Blood Sugar</strong> – Can assist in maintaining stable blood sugar levels.</li>
          </ul>

          <p class="mt-4 text-center font-italic">
            <em>Experience the unmatched aroma, flavor, and health benefits of Sri Lanka’s world-famous Ceylon Cinnamon.</em>
          </p>
        </div>
      </section>

      <!-- Cinnamon Products Category -->
      <div class="product-category mt-5">
        <div class="category-header text-center mb-4">
          <h3 class="category-title">Cinnamon Products</h3>
          <p>Premium Ceylon cinnamon and cinnamon-based products from Sri Lanka’s finest farms</p>
        </div>

        <div class="sub-items-grid">
          <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="sub-item-card animate">
              <a href="#">
                <img src="<?php echo htmlspecialchars($row['image']); ?>"
                  alt="Cinnamon Product Image"
                  class="sub-item-img">
              </a>
              <div class="sub-item-content">
                <h4 class="sub-item-title">
                  <?php echo htmlspecialchars($row['name']); ?>
                </h4>
                <p class="sub-item-desc">
                  <?php echo htmlspecialchars($row['description']); ?>
                </p>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>

    </div>

    <!-- View All Products Button -->
    <div class="text-center mt-5">
      <a href="all-products.html" class="btn btn-primary">View All Products</a>
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
          <a href="Cinnamon.php">Cinnamon</a>
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