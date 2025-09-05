<?php
include 'db.php';

// Fetch all tea products from database

// this is tea 
$sql = "SELECT * FROM tea_products ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ceymos - Tea Products </title>
  <link rel="icon" type="image/png" href="assets/headLogos/h1.png">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/tea_Styles.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
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
          <li><a href="index.html">Home</a></li>
          <li><a href="index.html#products">Products</a></li>
          <li><a href="index.html#about">About</a></li>
          <li><a href="index.html#contact">Contact</a></li>
          <li><a href="https://api.whatsapp.com/send/?phone=94771955100&text&type=phone_number&app_absent=0"><i class="fab fa-whatsapp"></i></a></li> 

        </ul>
      </nav>
    </div>
  </header>

  <section id="products" class="section-offset">
    <div class="container">
      <h2 class="text-center mb-5">Our Products</h2>

      <section id="sri-lankan-tea" class="py-5">
        <div class="container">
          <h2 class="text-center mb-4">Sri Lankan Tea (Ceylon Tea)</h2>
          <p class="lead text-center">
            Sri Lankan tea, globally known as <strong>Ceylon Tea</strong>, is celebrated for its
            <em>rich flavor, bright color, and refreshing aroma</em>. Grown in the lush highlands of Sri Lanka,
            especially in regions like Nuwara Eliya, Kandy, and Uva, Ceylon Tea is considered one of the finest teas in the world.
          </p>

          <h4 class="mt-5">Health Benefits of Ceylon Tea</h4>
          <ul class="list-unstyled">
            <li>➤ <strong>Rich in Antioxidants</strong> – Helps fight free radicals and reduce the risk of chronic diseases.</li>
            <li>➤ <strong>Boosts Heart Health</strong> – Supports healthy blood pressure and cholesterol levels.</li>
            <li>➤ <strong>Enhances Immunity</strong> – Strengthens the immune system due to its natural compounds.</li>
            <li>➤ <strong>Supports Digestion</strong> – Aids digestion and promotes gut health.</li>
            <li>➤ <strong>Hydration & Mental Alertness</strong> – Keeps you hydrated while enhancing focus and concentration through moderate caffeine levels.</li>
          </ul>

          <p class="mt-4 text-center font-italic">
            <em>Ceylon Tea is not just a drink — it’s a daily wellness ritual from the heart of Sri Lanka.</em>
          </p>
        </div>
      </section>

      <!-- Ceylon Tea Category -->
      <div class="product-category">
        <div class="category-header">
          <h3 class="category-title">Ceylon Tea</h3>
          <p>Premium quality teas from Sri Lanka's finest estates</p>
        </div>

        <div class="sub-items-grid">
          <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="sub-item-card animate">
              <a href="#">
                <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Tea Image" class="sub-item-img">
              </a>
              <div class="sub-item-content">
                <h4 class="sub-item-title"><?php echo htmlspecialchars($row['name']); ?></h4>
                <p class="sub-item-desc"><?php echo htmlspecialchars($row['description']); ?></p>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>

    </div>

    <div class="text-center mt-5">
      <a href="all-products.php" class="btn btn-primary">View All Products</a>
    </div>
  </section>

  <footer class="text-light pt-5 pb-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-4">
          <h5>Ceymos Lanka</h5>
          <p>Importers of premium Ceylon products including tea, spices, and coconut goods. Delivering quality globally since 1990.</p>
        </div>
        <div class="col-lg-2 col-md-6 mb-4">
          <h5>Quick Links</h5>
          <a href="index.html">Home</a>
          <a href="index.html#products">Products</a>
          <a href="index.html#about">About Us</a>
          <a href="index.html#contact">Contact</a>
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
          </div>
        </div>
      </div>
      <div class="row mt-4 copyright">
        <div class="col text-center">
          <small> &copy; 2025 Ceymos Lanka. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></small>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top" id="backToTopBtn" title="Go to top">
    <i class="fas fa-chevron-up"></i>
  </a>
</body>

</html>

