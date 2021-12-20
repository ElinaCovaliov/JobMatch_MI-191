<?php 
require_once "config.php";
error_reporting(E_ERROR | E_PARSE);?>

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
                    <h2>Propunerile noastre de <em>Job</em></h2>
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
        <br>
        <br>

        <div class="row">
            <div class="col-lg-4">
                <form method="post">
                    <h5 style="margin-bottom: 15px">Locații</h5>
                    <?php
                    $query_location_filter = mysqli_query($link, "SELECT * FROM locatie");
                    while ($location_filter = mysqli_fetch_assoc($query_location_filter)):
                        $counter = mysqli_query($link, "SELECT * FROM anunturi_companie WHERE id_locatie = " . $location_filter['id_locatie']);
                        $rows = mysqli_num_rows($counter);
                        if ($rows > 0) {
                            ?>
                            <div>
                                <label>
                                    <input type="checkbox" name="location_filter[]"
                                           value="<?php echo $location_filter["id_locatie"] ?>">
                                    <span><?php echo $location_filter["raion"]; ?> (<?php echo $rows; ?>)</span>
                                </label>
                            </div>
                        <?php } endwhile; ?>
                    <br>
                    <h5 style="margin-bottom: 15px">Categorii</h5>

                    <?php
                    $query_categ_job_filter = mysqli_query($link, "SELECT * FROM categ_joburi");
                    while ($categ_job_filter = mysqli_fetch_assoc($query_categ_job_filter)):
                        $counter = mysqli_query($link, "SELECT * FROM anunturi_companie WHERE id_categ_job = " . $categ_job_filter['id_categ_job']);
                        $rows = mysqli_num_rows($counter);
                        if ($rows > 0) {
                            ?>
                            <div>
                                <label>
                                    <input type="checkbox" name="categ_job_filter[]"
                                           value="<?php echo $categ_job_filter["id_categ_job"] ?>">
                                    <span><?php echo $categ_job_filter["categ_job"]; ?> (<?php echo $rows; ?>)</span>
                                </label>
                            </div>
                        <?php } endwhile; ?>
                    <br>
                    <input type="submit" name="fillter" value="Filtreaza">
                    <a href="jobs.php"><input type="button" value="Resetează"></a>
                </form>

                <?php
                if (isset($_POST["fillter"])) {
                    if (!is_null($_POST['location_filter'])) {
                        foreach ($_POST['location_filter'] as $location) {
                            if (!is_null($location_values))
                                $location_values .= " or id_locatie =" . $location;
                            else
                                $location_values .= "( id_locatie =" . $location;
                        }$location_values .= ")";
                    }
                    if (!is_null($_POST['categ_job_filter'])) {
                        foreach ($_POST['categ_job_filter'] as $categ_jobs) {
                            if (!is_null($categ_jobs_values_filter))
                                $categ_jobs_values_filter .= " or id_categ_job =" . $categ_jobs;
                            else
                                $categ_jobs_values_filter .= "( id_categ_job =" . $categ_jobs;
                        }$categ_jobs_values_filter .= ")";
                    }
                    if (!empty($location_values) and !empty($categ_jobs_values_filter)) {
                        $multiple = " AND ";
                    }
                    $query = mysqli_query($link, "SELECT * FROM anunturi_companie WHERE " . $location_values . $multiple . $categ_jobs_values_filter);
                    //echo "SELECT * FROM anunturi_companie WHERE " . $location_values . $multiple . $categ_jobs_values_filter;
                    if (!empty($location_values) or !empty($categ_jobs_values_filter)) {
                        while ($result = mysqli_fetch_assoc($query)) {
                                if (!is_null($pre_result))
                                    $pre_result .= " or anunturi_companie.id_anunt=" . $result['id_anunt'];
                                else
                                    $pre_result .= $result['id_anunt'];
                        }
                    }
                }

                ?>
                <br>
            </div>
            <div class="col-lg-8">
                <div class="row">

                    <?php if (isset($_POST["fillter"])) {
                        if (mysqli_num_rows($query) == 0) {
                            ?>
                            <h1>Nu sunt anunțuri corespunzătoare filtrelor!</h1>
                        <?php } else {
                            $query_all_anounce = mysqli_query($link, "SELECT * FROM anunturi_companie INNER JOIN companii ON anunturi_companie.id_companie = companii.id_companie INNER JOIN valuta ON anunturi_companie.id_valuta = valuta.id_valuta  INNER JOIN categ_joburi ON anunturi_companie.id_categ_job = categ_joburi.id_categ_job WHERE anunturi_companie.id_anunt = ".$pre_result);
                            while ($iterator = mysqli_fetch_assoc($query_all_anounce)):?>
                                <div class="col-md-6">
                                    <div class="card-body" >
                                        <div >
                                            <img src="pozeCompanii/<?php echo $iterator['poza'] ?>" alt=""  width="100">
                                        </div>
                                        <div class="down-content">
                                            <span> <sup><?php echo $iterator['valuta'] ?></sup> <?php echo $iterator['salariu'] ?> </span>

                                            <h4><?php echo $iterator['titlu'] ?></h4>

                                            <p><?php echo $iterator['categ_job'] ?></p>

                                            <ul class="social-icons">
                                                <li><a href="job-details.php?id_anunt=<?php echo $iterator['id_anunt'];?>"> + Vezi Mai Mult</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile;
                        }
                    } else {
                        $query_all_anounce = mysqli_query($link, "SELECT * FROM anunturi_companie INNER JOIN valuta ON anunturi_companie.id_valuta = valuta.id_valuta  INNER JOIN categ_joburi ON anunturi_companie.id_categ_job = categ_joburi.id_categ_job INNER JOIN companii ON anunturi_companie.id_companie = companii.id_companie");
                        while ($iterator = mysqli_fetch_assoc($query_all_anounce)):?>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div>
                                        <img src="pozeCompanii/<?php echo $iterator['poza'] ?>" alt=""  width="100">
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
                    } ?>

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