<?php
// Include config file
require_once "config.php";
session_start();

//USER profile
//init proprietes with null
$id_user = null;
$id = null;
$edit_state = false;
$editStateDesc = false;
$isForEdit = false;
$id_locatie = null;
$nume = null;
$prenume = null;
$email_user = null;
$telefon = null;
$id_skill = null;
$descriere_user = null;

//profilul user butoane
if(isset($_GET['edit_user_profile']))
{
    $id = $_GET['edit_user_profile'];
    $edit_state = true;
}

if(isset($_POST['update_user_profile']))
{
    $id=mysqli_real_escape_string($link, $_POST['id_user']);
    $nume=mysqli_real_escape_string($link, $_POST['nume']);
    $prenume=mysqli_real_escape_string($link, $_POST['prenume']);
    $email_user=mysqli_real_escape_string($link, $_POST['email_user']);
    $telefon=mysqli_real_escape_string($link, $_POST['telefon']);
    $id_locatie=mysqli_real_escape_string($link, $_POST['id_locatie']);

    mysqli_query($link, "UPDATE users SET nume='$nume', prenume='$prenume', email_user='$email_user', telefon='$telefon', id_locatie='$id_locatie' WHERE id_user={$_SESSION["id_user"]}");

    header('location: userProfile.php');
}




//descrierea utilizatorului
if(isset($_GET['edit_user_description']))
{
    $id = $_GET['edit_user_description'];
    $editStateDesc = true;
}

if(isset($_POST['update_user_description']))
{
    $id=mysqli_real_escape_string($link, $_POST['id_user']);
    $descriere_user=mysqli_real_escape_string($link, $_POST['descriere_user']);

    mysqli_query($link, "UPDATE users SET descriere_user='$descriere_user' WHERE id_user={$_SESSION["id_user"]}");

    header('location: userProfile.php');
}

$getskills=mysqli_query($link,"SELECT denumire_skill, skills.id_skill FROM skills_user INNER JOIN skills ON skills_user.id_skill=skills.id_skill WHERE skills_user.id_user = {$_SESSION["id_user"]}");

//stergere skill
if(isset($_GET['delete_skill']))
{
    $id = $_GET['delete_skill'];

    mysqli_query($link, "DELETE FROM skills_user WHERE id_skill = $id AND id_user = {$_SESSION["id_user"]}");

    header("location: userProfile.php");
}

//adaugare skill
if(isset($_POST['save_skill']))
{
    $id_user = $_SESSION["id_user"];
    $id_skill=$_POST["id_skill"];

    $query = "INSERT INTO skills_user (id_skill, id_user) VALUES('$id_skill','$id_user')";

    mysqli_query($link, $query);
    header('location: userProfile.php');
}



$locatii = mysqli_query($link, "SELECT * FROM locatie");
$categ_skills = mysqli_query($link,"SELECT * FROM categ_skills");
$skill = mysqli_query($link,"SELECT * FROM skills");

$userDetails = mysqli_query($link, "
    SELECT
        us.id_user,
        us.nume,
        us.prenume,
        us.poza,
        us.descriere_user,
        us.email_user,
        us.telefon,
        lo.raion AS locatie
    FROM
        users us
    INNER JOIN locatie lo ON
        us.id_locatie = lo.id_locatie
    WHERE
        us.id_user = {$_SESSION["id_user"]}");
?>