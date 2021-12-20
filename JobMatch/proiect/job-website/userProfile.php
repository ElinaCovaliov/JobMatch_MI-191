<?php
require_once("userServices.php");
require_once("scripts/SessionUtils.php");

$details = mysqli_fetch_array($userDetails);

function customUserDescriptionButton($name = null)
{
    echo '<a class="btn btn--radius-2 btn--blue" target="__blank" href="?edit_user_description=10">'.$name.'</a>';
}

function customButton($scriptUrl = null, $idParam = null, $name)
{
    echo '<a class="btn btn--radius-2 btn--blue" target="__blank" href="?'.$scriptUrl.'='.$idParam.'">'.$name.'</a>';
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

    <link rel="stylesheet" href="assets/css/userProfile.css">

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
                    <a href="#" class="logo">Job <em> Match</em></a>
                    <!-- ***** Logo End ***** -->

                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="jobs.php">Job-uri</a></li>
                        <li><a href="userProfile.php" class="active">Profil</a></li>
                        <li><a href="?logout='1'">Ieșire</a></li>
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
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Profil Utilizator -->
<div class ="container-margin" >
    <div class="container">
        <div class="main-body">


            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <input type="hidden" name="id_user" value="<?php echo $id;?>">
                                <img src="pozeUtilizatori/<?php echo $details['poza']; ?>" alt="img_<?php echo $details['nume']; ?>" class="img-thumbnail" width="150" onerror="this.onerror=null;this.src='https://www.bootdey.com/app/webroot/img/Content/Manbrown2.png';">
                                <div class="mt-3">
                                    <h4><?php echo $details['nume']; ?>
                                        <?php echo $details['prenume']; ?></h4>
                                    <p class="text-muted font-size-sm"><?php echo $details['locatie']; ?></p>
                                    <a class="btn btn--radius-2 btn--blue " target="__blank" href="recomandari.php?id_user=<?php echo $details['id_user']; ?>">Recomandări de joburi</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <form method="post" action="userServices.php">
                            <ul class="list-group list-group-flush">

                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h5 class="mb-0">Descrierea utilizatorului</h5>
                                    <hr>
                                    <?php if($editStateDesc == false): ?>
                                        <?php if ($details['descriere_user'] != null) {
                                            echo(" <br><span class='mb-0'>".$details['descriere_user']."</span>");
                                        } else {
                                            echo("<span class='mb-0'>Nicio descriere de afișat</span>");
                                        }?>
                                    <?php else: ?>
                                    <input type="text" name="descriere_user" class="form-control" value="<?php echo $details['descriere_user'];  ?>">
                                    <?php endif ?>
                                </li>

                                <?php if (($details['descriere_user'] == null || empty($details['descriere_user'])) && !$editStateDesc) {
                                    customButton("edit_user_description",$details['id_user'],"Adaugă");
                                } ?>
                                <?php if (($editStateDesc || $isForEdit)) { $isForEdit = true; ?>
                                    <button class="btn btn--radius-2" style="background: green;" target="__blank" type="submit" name="update_user_description">Salveaza</button>
                                <?php } ?>

                                <?php if (($details['descriere_user'] != null && !$isForEdit)) {
                                    customButton("edit_user_description",$details['id_user'],"Editează");

                                } ?>

                            </ul>
                        </form>


                    </div>
                </div>
                <div class="col-md-8">
                    <form method="post" action="userServices.php">
                        <div class="card mb-3">
                            <div class="card-body">

                                <!--Prenume-->

                                <div class="col-md-8">
                                    <form method="post" action="userServices.php">
                                        <div class="card mb-3">
                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Nume</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?php if($edit_state == false): ?>
                                                            <?php echo $details['nume']; ?>
                                                        <?php else: ?>
                                                            <input type="text" name="nume" class="form-control" value="<?php echo $details['nume'];  ?>">
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Prenume</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?php if($edit_state == false): ?>
                                                            <?php echo $details['prenume']; ?>
                                                        <?php else: ?>
                                                            <input type="text" name="prenume" class="form-control" value="<?php echo $details['prenume'];  ?>">
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Email</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?php if($edit_state == false): ?>
                                                            <?php echo $details['email_user']; ?>
                                                        <?php else: ?>
                                                            <input type="text" name="email_user" class="form-control" value="<?php echo $details['email_user'];  ?>">
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Telefon</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?php if($edit_state == false): ?>
                                                            <?php echo $details['telefon']; ?>
                                                        <?php else: ?>
                                                            <input type="text" name="telefon" class="form-control" value="<?php echo $details['telefon'];  ?>">
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Locația</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?php if($edit_state == false): ?>
                                                            <?php echo $details['locatie']; ?>
                                                        <?php else: ?>
                                                            <select  name="id_locatie">
                                                                <?php
                                                                echo "<option value=''>{$details['locatie']}</option>";
                                                                while($rows= $locatii->fetch_assoc())
                                                                {
                                                                    $nume=$rows['raion'];
                                                                    $id=$rows['id_locatie'];

                                                                    echo "<option  value='$id'> $nume </option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div>

                                                            <?php if($edit_state == false): ?>

                                                                <a class="btn btn--radius-2 btn--blue " target="__blank" href="userProfile.php?edit_user_profile=<?php echo $details['id_user']; ?>">Editează</a>
                                                                
                                                            <?php else: ?>

                                                                <button class="btn btn--radius-2" style="background: green;" target="__blank" type="submit" name="update_user_profile">Salveaza</button>
                                                                <a class="btn btn--radius-2" style="background: red;" target="__blank" href="userProfile.php">Anulează</a>

                                                            <?php endif ?>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>

                                        <div class="col-md-13">
                                            <div class="card mb-3">

                                                <div class="card-body">
                                                  

                                                   <div class="row">
                                                        <div class="col-sm-3">

                                                            <h6 class="mb-0">Skills</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            </ul>
                                                                <?php 
                                                                if (mysqli_num_rows($getskills) == 0){
                                                                    echo "<h6 class='mb-0'>Niciun skill de afișat</h6>";
                                                                }
                                                                else{
                                                                    while($skills = mysqli_fetch_array($getskills)){
                                                                        echo '<li>' . $skills['denumire_skill'] .'</li>
                                                                        <a style="float: right;" class="" href="?delete_skill=' .$skills['id_skill'].'">x</a>';
                                                                    }
                                                                } 
                                                                ?>
                                                            <ul>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <hr> 
                                                    <a class="btn btn--radius-2 btn--blue " target="__blank" onclick="$('#adaugareSkill').modal('show')">Adaugă skill</a>
                                                </div>
                                            </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="adaugareSkill" tabindex="-1" aria-labelledby="adaugareSkillLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="adaugareSkillLabel">Adăugare skill</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="$('#adaugareSkill').modal('toggle'); "></button>
                            </div>
                            <form method="post" action="userServices.php">
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="skill" >Selectare skill:</label>
                                        <select name="id_skill" class="form-control" id="id_skill">
                                            <?php
                                            echo "<option value=''></option>";
                                            while($skilluri = mysqli_fetch_array($skill, MYSQLI_ASSOC))
                                            {
                                                $nume=$skilluri['denumire_skill'];
                                                $id=$skilluri['id_skill'];

                                                echo "<option value='$id'> $nume </option>";
                                            }?>
                                        </select>
                                    </div>
                                   

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal()">Închide</button>
                                    <button type="submit" name="save_skill" class="btn btn-primary">Adaugă skill</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    function closeModal()
                    {
                        $('#adaugareSkill').modal('toggle');
                        $('#adaugareSkill').on('hidden.bs.modal', function () { $(this).find('form').trigger('reset');})
                    }
                </script>

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

