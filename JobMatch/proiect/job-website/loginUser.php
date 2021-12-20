<?php
// Initialize the session
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Check if the user is already logged in, if yes then redirect him to welcome page
/*if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}*/

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$email_user = $parola = "";
$email_user_err = $parola_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["email_user"]))){
        $email_user_err = "Introduceți email-ul";
    } else{
        $email_user = trim($_POST["email_user"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["parola"]))){
        $parola_err = "Introduceți parola.";
    } else{
        $parola = trim($_POST["parola"]);
    }

    // Validate credentials
    if(empty($email_user_err) && empty($parola_err)){
        // Prepare a select statement
        $sql = "SELECT id_user, email_user, parola FROM users WHERE email_user = ?";


        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email_user);

            // Set parameters
            $param_email_user = $email_user;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id_user, $email_user, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($parola, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id_user"] = $id_user;
                            $_SESSION["email_user"] = $email_user;

                            // Redirect user to welcome page
                            header("location: userProfile.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Job Match</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/registerForm.css">

</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ***** Preloader End ***** -->


<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">Job <em> Match</em></a>
                    <!-- ***** Logo End ***** -->

                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="index.html">Acasă</a></li>
                        <li><a href="about.html">Despre noi</a></li>
                        <li><a href="contact.html">Contacte</a></li>
                        <li><a href="register.html">Înregistrare</a></li>
                        <li><a href="login.html" class="active">LogIn</a></li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->

                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>Logare Utilizator</em></h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Formular!!!!!-->
<div class="page-wrapper bg-dark p-t-100 p-b-50">
    <div class="wrapper wrapper--w900">
        <div class="card card-6">
            <div class="card-body">
                <form method="POST">
                    <div class="form-row">

<!---container email--->
                        <div class="name">Email utilizator</div>

                        <div class="value">
                            <!--<input class="input--style-6" type="text" name="denumire">-->

    <?php
    if(!empty($login_err)){
        echo '<div class="alert alert-danger">' . $login_err . '</div>';
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <br>
            <input type="text" name="email_user" class="form-control <?php echo (!empty($email_user_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email_user; ?>">
            <span class="invalid-feedback"><?php echo $email_user_err; ?></span>
        </div>
        </div>
     </div>

 <!---container parola--->

      <div class="form-row">
                        <div class="name">Parola</div>
                        <div class="value">
                            <div class="input-group">
                                <!--<input class="input--style-6" type="password" name="parolaCompanie" placeholder="">-->

                                <div class="form-group">


            <input type="password" name="parola" class="form-control <?php echo (!empty($parola_err)) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?php echo $parola_err; ?></span>
        </div>

        </div>
        <p>Nu ești încă înregistrat? <a href="registerUser.php">Înregistrează-te acum!</a>.</p>
        </div>
          


            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script>
<script src="assets/js/mixitup.js"></script>
<script src="assets/js/accordions.js"></script>

<!-- Global Init -->
<script src="assets/js/custom.js"></script>

</body>
</html>
