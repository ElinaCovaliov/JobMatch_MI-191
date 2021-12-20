<?php
// Include config file
require_once "config.php";
session_start();

//Company profile
//init proprietes with null
$id_companie = null;
$id = null;
$edit_state = false;
$editStateDesc = false;
$isForEdit = false;
$id_locatie = null;
$denumire = null;
$email_companie = null;
$telefon = null;
$id_anunt = null;
$descriere = null;

//profilul companiei butoane
if(isset($_GET['edit_company_profile']))
{
    $id = $_GET['edit_company_profile'];
    $edit_state = true;
}

if(isset($_POST['update_company_profile']))
{    
    $id=mysqli_real_escape_string($link, $_POST['id_companie']);
    $denumire=mysqli_real_escape_string($link, $_POST['denumire']);
    $email_companie=mysqli_real_escape_string($link, $_POST['email_companie']);
    $telefon=mysqli_real_escape_string($link, $_POST['telefon']);
    $id_locatie=mysqli_real_escape_string($link, $_POST['id_locatie']);

	mysqli_query($link, "UPDATE companii SET denumire='$denumire', email_companie='$email_companie', telefon='$telefon', id_locatie='$id_locatie' WHERE id_companie={$_SESSION["id_companie"]}");
		
	header('location: companyProfile.php');
}

if(isset($_GET['delete_announce']))
{
	$id = $_GET['delete_announce'];
	mysqli_query($link, "DELETE FROM anunturi_companie WHERE id_anunt = $id AND id_companie = {$_SESSION["id_companie"]}");
    
	header("location: companyProfile.php");
}

//descrierea companiei
if(isset($_GET['edit_company_description']))
{
    $id = $_GET['edit_company_description'];
    $editStateDesc = true;
}

if(isset($_POST['update_company_description']))
{    
    $id=mysqli_real_escape_string($link, $_POST['id_companie']);
    $descriere=mysqli_real_escape_string($link, $_POST['descriere']);

	mysqli_query($link, "UPDATE companii SET descriere='$descriere' WHERE id_companie={$_SESSION["id_companie"]}");

	header('location: companyProfile.php');
}

//adaugare anunt
if(isset($_POST['save_anunt']))
{
    $id_companie=$_SESSION["id_companie"];
    $id_job=$_POST['id_job'];
    $id_valuta=$_POST['id_valuta'];
    $titlu=$_POST['titlu'];
    $poza_anunt=$_POST['poza_anunt'];
    $salariu=$_POST['salariu'];
    $descriere=$_POST['descriere'];
    $id_locatie=$_POST['id_locatie'];
    $id_categ_job=$_POST['id_categ_job'];

    $query = "INSERT INTO anunturi_companie(id_companie,id_job,titlu,poza_anunt,salariu,id_valuta,descriere,id_categ_job,id_locatie) VALUES('$id_companie','$id_job','$titlu','$poza_anunt','$salariu','$id_valuta','$descriere','$id_categ_job','$id_locatie')";

	mysqli_query($link, $query);

	header('location: companyProfile.php');
}


//SELECT l.raion FROM locatie l WHERE l.id_locatie = 1;
$locatii = mysqli_query($link, "SELECT * FROM locatie");
$joburi = mysqli_query($link, "SELECT * FROM joburi");
$valute = mysqli_query($link, "SELECT * FROM valuta");
$categorii_job = mysqli_query($link, "SELECT * FROM categ_joburi");
$companyDetails = mysqli_query($link, "
    SELECT
        co.id_companie,
        co.denumire,
        co.poza,
        co.adresa,
        co.descriere,
        co.email_companie,
        co.telefon,
        lo.raion AS locatie
    FROM
        companii co
    INNER JOIN locatie lo ON
        co.id_locatie = lo.id_locatie
    WHERE
        co.id_companie = {$_SESSION["id_companie"]}");

