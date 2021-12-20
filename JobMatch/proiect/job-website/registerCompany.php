<?php
include 'assets/php/db_connection.php';
include 'assets/php/load_locatia.php';

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['parolaCompanie'] == $_POST['parolaRepetata']){
        $denumire = $conn->real_escape_string($_POST['denumireCompanie']);
        $email = $conn->real_escape_string($_POST['emailCompanie']);
        $parola = password_hash($_POST['parolaCompanie'], PASSWORD_BCRYPT);
        $descriereCompanie = $conn->real_escape_string($_POST['descriereCompanie']);
        $locatie = $_POST['locatiaCompanie'];
        $adresa = $_POST['adresaCompanie'];
        $pozaCompanie = $_FILES['pozaCompanie']['name'];
        $pozaCompanie_path = "pozeCompanii/".basename($_FILES['pozaCompanie']['name']);

        if(preg_match("!image!", $_FILES['pozaCompanie']['type'])){
            if(move_uploaded_file($_FILES['pozaCompanie']['tmp_name'], $pozaCompanie_path)){
            $_SESSION ['denumireCompanie'] = $denumire;
            $_SESSION ['emailCompanie'] = $email;
            $_SESSION ['descriereCompanie'] = $descriereCompanie;
            $_SESSION ['locatiaCompanie'] = $locatie;
            $_SESSION ['adresaCompanie'] = $adresa;
            $_SESSION ['pozaCompanie'] = $pozaCompanie;
            $_SESSION ['parolaCompanie'] = $parola;

            $sql = "INSERT INTO companii (poza, denumire, id_locatie, descriere, parola, email_companie, adresa )"
            . "VALUES ('$pozaCompanie', '$denumire', '$locatie', '$descriereCompanie', '$parola', '$email', '$adresa')";

                if($conn->query($sql) === true){
                $_SESSION['message'] = "Înregistrarea a fost realizată cu succes";
                header("location: companyProfile.php");}

                else{
                $_SESSION['messageCompany'] = "Înregistrarea nu a fost realizată cu succes";}
            }
            else{
            $_SESSION['photoFailCompany'] = "Încărcarea pozei a eșuat";}
        }
        else{
            $_SESSION['photoFailCompany'] = "Este permis doar formatul GIF, JPG sau PNG";}
    }
    else{
        $_SESSION['passwordFailCompany'] = "Parola repetată nu corespunde cu parola inițială ";}
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
                        <li><a href="register.html" class="active">Înregistrare</a></li>
                        <li><a href="login.html">LogIn</a></li>
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
                    <h2>Înregistrare <em> Companie</em></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Main Banner Area End ***** -->

<!--Formular!!!!!-->
<div class="page-wrapper bg-dark p-t-100 p-b-50">
    <div class="wrapper wrapper--w900">
        <div class="card card-6">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" >
                    <div class="form-row">
                        <div class="name">Denumire Companie</div>
                        <div class="value">
                            <input class="input--style-6" type="text" name="denumireCompanie">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Adresa email</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-6" type="email" name="emailCompanie" placeholder="example@email.com">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Parola</div>
                        <div class="value">
                            <div class="input-group">
                                <input type="password" class="form-control" name="parolaCompanie" access="false" id="parolaCompanie">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Repetă Parola</div>
                        <div class="value">
                            <div class="input-group">
                                <input type="password" class="form-control" name="parolaRepetata" access="false" id="parolaRepetata">
                            </div>
                            <?php if(isset($_SESSION['passwordFailCompany'])){
                                    echo '<div class ="alert alert-danger">'.$_SESSION['passwordFailCompany'].'</div>';
                        unset($_SESSION['passwordFailCompany']);
                        } ?>
                    </div>
            </div>

            <div class="form-row">
                <div class="name">Descriere</div>
                <div class="value">
                    <div class="input-group">
                        <textarea class="textarea--style-6" name="descriereCompanie" placeholder="Descrie activitatea companiei"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="name">Locația</div>
                <div class="value">
                    <div class="input-group">
                        <select class="form-control" name="locatiaCompanie" id="selectLocatia" required>
                            <?php echo fill_locatia($conn);?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="name">Adresa</div>
                <div class="value">
                    <div class="input-group">
                        <input type="text" class="form-control" name="adresaCompanie" access="false" id="adresaCompanie">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="name">Poza Logo</div>
                <div class="value">
                    <div class="input-group js-input-file">
                        <input class="input-file" type="file" name="pozaCompanie" id="file">
                        <label class="label--file" for="file">Alege fișier</label>
                    </div>
                    <div class="label--desc">Încarcă poza cu logo-ul companiei. Dimenisune maximă 50 MB</div>
                    <?php if(isset($_SESSION['photoFailCompany'])){
                                    echo '<div class ="alert alert-danger">'.$_SESSION['photoFailCompany'].'</div>';
                unset($_SESSION['photoFailCompany']);
                }
                ?>
            </div>
        </div>
        <?php if(isset($_SESSION['messageCompany'])){
                                    echo '<div class ="alert alert-danger">'.$_SESSION['messageCompany'].'</div>';
    unset($_SESSION['messageCompany']);
    } ?>

    <div class="card-footer">
        <button class="btn btn--radius-2 btn--blue" type="submit">Înregistrare</button>
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