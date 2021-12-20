<?php 
require_once "config.php";
error_reporting(E_ERROR | E_PARSE);
$id_user = $_GET['id_user']?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
          rel="stylesheet">

    <title>Job Match</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body >

<!-- ***** Preloader Start ***** -->
<!-- <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div> -->
<!-- ***** Preloader End ***** -->


<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="#" class="logo">Job <em> Match</em></a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="jobs.php" class="active">Job-uri</a></li>
                        <li><a href="userProfile.php">Profil</a></li>
                        <li><a href="index.html">Ieșire</a></li>
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

<!-- ***** Call to Action Start ***** -->
<section class="section section-bg" id="call-to-action"
         style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>Recomandări de <em>Job</em></h2>
                    <p>Alături de echipa noastră îți vei găsi postul perfect de muncă</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Call to Action End ***** -->

<!-- ***** Fleet Starts ***** -->
<section class="section" id="trainers">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">

                    <?php
                        $recommendations = mysqli_query($link, "SELECT anunturi_companie.id_anunt as id_anunt, valuta.valuta, anunturi_companie.titlu,anunturi_companie.salariu, companii.denumire,companii.poza AS poza_comp
                        FROM anunturi_companie 
                        INNER JOIN companii ON anunturi_companie.id_companie = companii.id_companie 
                        INNER JOIN valuta ON anunturi_companie.id_valuta = valuta.id_valuta
                        WHERE (valuta.valuta = (SELECT valuta.valuta FROM valuta INNER JOIN users ON valuta.id_valuta = users.id_valuta 
                        WHERE users.id_user = $id_user AND anunturi_companie.salariu >= users.salariu_min_interesat));");
                        while ($iterator = mysqli_fetch_assoc($recommendations)):?>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div>
                                        <img src="pozeCompanii/<?php echo $iterator['poza_comp']?>" alt=""  width="100">
                                    </div>
                                    <div class="down-content">
                                        <span> <sup><?php echo $iterator['valuta'] ?></sup> <?php echo $iterator['salariu'] ?> </span>

                                        <h4><?php echo $iterator['titlu'] ?></h4>

                                        <p><?php echo $iterator['categ_job'] ?></p>

                                        <ul class="social-icons">
                                            <li><a href="job-details.php?id_anunt=<?php echo $iterator['id_anunt'];?>">+ Vezi Mai Mult</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                    ?>
                </div>
            </div>
        </div>
        <br>

    </div>
</section>
<!-- ***** Fleet Ends ***** -->

<!-- ***** Footer Start ***** -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

            </div>
        </div>
    </div>
</footer>

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