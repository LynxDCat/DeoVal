<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin Login</title>
        <link rel="stylesheet" href="admin.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
        href="https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600;700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Yeseva+One&display=swap"
        rel="stylesheet"
        />
    </head>
    <body>
        <section class="login-page">
            <img src="images/Logo.png" alt="Deoval Logo">
            <h1>DEOVAL PRINTING SERVICES</h1>
            <section class="admin-page-field-container">
                <form action="includes/db_admin.php" method="POST">
                    <div class="field-user">
                        <input type="text" id="user_name" name="user_name" placeholder="USERNAME" required>
                    </div>
                    <div class="field-pass">
                        <input type="password" id="pass" name="pass" placeholder="PASSWORD" required>
                    </div>
                    <button type="submit" name="submit">Log In</button>
                </form>
            </section>
        </section>
    </body>
</html>
