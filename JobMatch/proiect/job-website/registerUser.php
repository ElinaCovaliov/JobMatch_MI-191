<?php
include 'assets/php/db_connection.php';
include 'assets/php/load_locatia.php';
include 'assets/php/load_valuta.php';

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['parolaUser'] == $_POST['parolaUserRepetat']){
        $nume = $conn->real_escape_string($_POST['nume']);
        $prenume = $conn->real_escape_string($_POST['prenume']);
        $email = $conn->real_escape_string($_POST['email']);
        $parola = password_hash($_POST['parolaUser'], PASSWORD_BCRYPT);
        $descriereUser = $conn->real_escape_string($_POST['descriereUser']);
        $locatie = $_POST['selectLocatia'];
        $salariuMin = $_POST['salariuMinim'];
        $salariuMax = $_POST['salariuMaxim'];
        $valuta = $_POST['selectValuta'];
        $pozaUser = $_FILES['avatar']['name'];
        $pozaUser_path = "pozeUtilizatori/".basename($_FILES['avatar']['name']);
        
        if(preg_match("!image!", $_FILES['avatar']['type'])){
            if(move_uploaded_file($_FILES['avatar']['tmp_name'], $pozaUser_path)){
               $_SESSION ['nume'] = $nume;
               $_SESSION ['prenume'] = $prenume;
               $_SESSION ['email'] = $email;
               $_SESSION ['descriereUser'] = $descriereUser;
               $_SESSION ['locatiaId'] = $locatie;
               $_SESSION ['salariuMin'] = $salariuMin;
               $_SESSION ['salariuMax'] = $salariuMax;
               $_SESSION ['valutaId'] = $valuta;
               $_SESSION ['pozaUser'] = $pozaUser;

               $sql = "INSERT INTO users (poza, nume, prenume, id_locatie, descriere_user, salariu_min_interesat, salariu_max_interesat, id_valuta, parola, email_user)"
               . "VALUES ('$pozaUser', '$nume', '$prenume', '$locatie', '$descriereUser', '$salariuMin', '$salariuMax', '$valuta', '$parola', '$email')";
                
               if($conn->query($sql) === true){
                   header("location: userProfile.php");}

               else{
                    $_SESSION['message'] = "Înregistrarea nu a fost realizată cu succes";}
            }
            else{
                $_SESSION['photoFail'] = "Încărcarea pozei a eșuat";}
        }
        else{
            $_SESSION['photoFail'] = "Este permis doar formatul GIF, JPG sau PNG";}
    }
    else{
        $_SESSION['passwordFail'] = "Parola repetată nu corespunde cu parola inițială ";}
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
    <!-- ***** Preloader End *****-->
    
    
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
                        <h2>Înregistrare <em> Utilizator</em></h2>
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
               
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="name">Nume</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="nume" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Prenume</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="prenume" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Adresa email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="email" name="email" placeholder="example@email.com" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Parola</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="password" class="form-control" name="parolaUser" access="false" id="parolaUser" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Repetă Parola</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="password" class="form-control" name="parolaUserRepetat" access="false" id="parolaUserRepetat" required>
                                </div>
                                <?php if(isset($_SESSION['passwordFail'])){
                                    echo '<div class ="alert alert-danger">'.$_SESSION['passwordFail'].'</div>';
                                    unset($_SESSION['passwordFail']);
                                } ?>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Despre mine</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="descriereUser" placeholder="Poți descrie activitatea ta, interesele și experiența în 120 de caractere." required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Locația</div>
                            <div class="value">
                                <div class="input-group">
                                    <select class="form-control" name="selectLocatia" id="selectLocatia" required>
                                        <?php echo fill_locatia($conn);?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Salariu</div>
                            <div class="salariuValue">

                                <div class="input-group" class="flex-group">
                                    <div class="name">Salariu minim interesat</div>
                                    <input type="text" class="form-control" name="salariuMinim" access="false" value="0" id="salariuMinim" required>
                                </div>

                                <div class="input-group" class="flex-group">
                                    <div class="name">Salariu maxim interesat</div>
                                    <input type="text" class="form-control" name="salariuMaxim" access="false" value="0" id="salariuMaxim" required>
                                </div>

                                <div class="input-group" class="flex-group">
                                    <div class="name">Valuta</div>
                                    <select class="form-control" name="selectValuta" id="selectValuta" required>
                                        <?php echo fill_valuta($conn);?>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Poza de profil</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="avatar"  id="file">
                                    <label class="label--file" for="file" required>Alege fișier</label>
                                </div>
                                <div class="label--desc">Încarcă poza de profil. Dimenisune maximă 50 MB</div>
                                    <?php if(isset($_SESSION['photoFail'])){
                                    echo '<div class ="alert alert-danger">'.$_SESSION['photoFail'].'</div>';
                                    unset($_SESSION['photoFail']);
                                    }
                                    ?>
                            </div>
                        </div>
                        <?php if(isset($_SESSION['message'])){
                                    echo '<div class ="alert alert-danger">'.$_SESSION['message'].'</div>';
                                    unset($_SESSION['message']);
                        } ?>
                        
                        <div class="card-footer">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Înregistrare</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>

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