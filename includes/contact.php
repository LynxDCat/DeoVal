<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_deoval";


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);


    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }


    $fname = $conn->real_escape_string($_POST['first_name']);
    $lname = $conn->real_escape_string($_POST['last_name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);


    $stmt = $conn->prepare("INSERT INTO table_lgit (first_name, last_name, phone_no, email_add, msg) VALUES (?, ?, ?, ?, ?)");
   
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }


    $stmt->bind_param("sssss", $fname, $lname, $phone, $email, $message);


    if ($stmt->execute()) {
        $web3forms_data = [
            'access_key' => '0f8a394c-c9bb-4600-a640-41f05512dc12',
            'first_name' => $fname,
            'last_name' => $lname,
            'phone' => $phone,
            'email' => $email,
            'message' => $message,
        ];


        $url = "https://api.web3forms.com/submit";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($web3forms_data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        $response = curl_exec($ch);
        $curl_error = curl_error($ch);
        curl_close($ch);


        if ($curl_error) {
            die("Error forwarding to Web3Forms: " . $curl_error);
        }


        header("Location: ../index.php?page=Contact#lgit");
        exit();
    } else {
        die("Error executing statement: " . $stmt->error);
    }


       $stmt->close();
    mysqli_close($conn);
}
?>
api.web3forms.com
Jay Ruiz
Jay Ruiz de Ocampo
<section class="landing-page-contact">
  <article class="lp-contact-title">
    <h1>GET IN TOUCH</h1>
  </article>
  <section id="contact">
    <div class="contact container">
      <div class="contact-items">
      <a href="tel:[02] 75772595">
        <div class="contact-item">
          <div class="icon"><img width="100" height="100" src="https://img.icons8.com/material-outlined/100/2a3d32/ringer-volume.png" alt="ringer-volume"/></div>
          <div class="contact-info">
            <h1>Phone</h1>
            <h2><?php echo "[02] 75772595"; ?></h2>
          </div>
        </div>
        </a>
        <a href="mailto:deovalprinting@yahoo.com.ph">
        <div class="contact-item">
          <div class="icon"><img width="100" height="100" src="https://img.icons8.com/material-outlined/100/2a3d32/filled-message.png" alt="filled-message"/></div>
          <div class="contact-info">
            <h1>Email</h1>
            <h2><?php echo "deovalprinting@yahoo.com.ph"; ?></h2>
          </div>
        </div>
        </a>
        <a href="https://www.google.com/maps/place/Deoval+Printing+Service/@14.6095093,120.9934711,17z/data=!3m1!4b1!4m6!3m5!1s0x3397b6021d344843:0xf5f6e35b26f07298!8m2!3d14.6095093!4d120.9934711!16s%2Fg%2F11f4qhlgmk?entry=ttu&g_ep=EgoyMDI0MTIwOC4wIKXMDSoASAFQAw%3D%3D">
        <div class="contact-item">
          <div class="icon"><img width="100" height="100" src="https://img.icons8.com/material-outlined/100/2a3d32/map-marker.png" alt="map-marker"/></div>
          <div class="contact-info">
            <h1>Address</h1>
            <h2><?php echo "856 Earnshaw St., cor A.H. Lacson St., España, Sampaloc, Manila"; ?></h2>
          </div>
        </div>
        </a>
        <a href="https://www.facebook.com/deovalprinting">
        <div class="contact-item">
          <div class="icon"><img width="100" height="100" src="https://img.icons8.com/ios-filled/100/2a3d32/facebook-new.png" alt="facebook-new"/></div>
          <div class="contact-info">
            <h1>Facebook</h1>
            <h2><?php echo "Deoval Printing Services"; ?></h2>
          </div>
        </div>
        </a>
      </div>
    </div>
  </section>
</section>


<div id="lgit" class="container-contact">
  <div class="form-section">
    <h1>Inquire Now!</h1>
    <form action="includes/database.php" method="POST">
      <input type="hidden" name="access_key" value="0f8a394c-c9bb-4600-a640-41f05512dc12">
      <div class="input-group">
        <div class="field">
          <label for="first_name">First Name*</label>
          <input type="text" id="first_name" name="first_name" placeholder="Enter your first name" required>
        </div>
        <div class="field">
          <label for="last_name">Last Name*</label>
          <input type="text" id="last_name" name="last_name" placeholder="Enter your last name" required>
        </div>
      </div>
      <div class="input-group">
        <div class="field">
          <label for="phone">Your Phone*</label>
          <input type="tel" maxlength="11" pattern="\d{11}" id="phone" name="phone" placeholder="09xx xxx xxxx" required>
        </div>
        <div class="field">
          <label for="email">Your Email*</label>
          <input type="email" id="email" name="email" placeholder="youremail@domain.com" required>
        </div>
      </div>
      <div class="field">
        <label for="message">Message*</label>
        <textarea id="message" name="message" placeholder="Enter message" required></textarea>
      </div>
      <button type="submit" name="submit" class="btn">Send Message</button>
    </form>


  </div>
  <div class="info-section">
    <h2>Need More Help?</h2>
    <p>If you have any questions or need assistance, don't hesitate to reach out. We're here to provide the support you need and ensure your experience is seamless. Whether it's a quick inquiry or more detailed help.</p>
    <p><img src="images/phone-icon.png" alt="Phone Icon" class="contact-icon"> [02] 7572595</p>
    <p><img src="images/mobile-icon.png" alt="Mobile Icon" class="contact-icon"> 0921-2874906</p>
    <p><img src="images/email-icon.png" alt="Email Icon" class="contact-icon"> deovalprinting@yahoo.com.ph</p>
    <p><img src="images/location-icon.png" alt="Location Icon" class="contact-icon"> Unit 104, Earnshaw Suites, 856 Earnshaw St., cor A.H. Lacson St., España, Sampaloc, Manila</p>
  </div>
  <div class="maps-section">
    <h1>Maps</h1>
    <img src="images/map.png" alt="Maps" class="map-picture">
  </div>
</div>
