<body>
  <header>
    <nav>
      <div class="nav-content">
        <div class="logo-container">
          <a href="index.php" class="logo-img">
            <img src="images/Logo.png" alt="DeoVal Logo" />
          </a>
          <a href="index.php" class="logo-name">DEOVAL PRINTING SERVICES</a>
        </div>
        <div class="menu-container">
          <ul>
            <li>
              <a href="index.php?page=About" class="<?php echo ($_GET['page'] ?? '') === 'About' ? 'active' : ''; ?>">About</a>
            </li>
            <li>
              <a href="index.php?page=Product" class="<?php echo ($_GET['page'] ?? '') === 'Product' ? 'active' : ''; ?>">Products</a>
            </li>
            <li>
              <a href="index.php?page=Blogs" class="<?php echo ($_GET['page'] ?? '') === 'Blogs' ? 'active' : ''; ?>">Blogs</a>
            </li>
            <li>
              <a href="index.php?page=FAQs" class="<?php echo ($_GET['page'] ?? '') === 'FAQs' ? 'active' : ''; ?>">FAQs</a>
            </li>
            <li>
              <a href="index.php?page=Contact" class="<?php echo ($_GET['page'] ?? '') === 'Contact' ? 'active' : ''; ?>">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
      <hr class="hr-line" />
    </nav>
  </header>
  <a href="index.php?page=Contact#lgit">
    <button class="sticky-button">
      <img src="images/MessUs.png" alt="Message Us" />
    </button>
  </a>
</body>
