<?php
$errors =[];

if(!array_key_exists('name', $_POST) || $_POST['name'] == ''){
    $errors['name'] = "Vous n'avez pas renseigné votre nom";
}
if(!array_key_exists('prenom', $_POST) || $_POST['prenom'] == ''){
    $errors['prenom'] = "Vous n'avez pas renseigné votre prénom";
}
if(!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $errors['email'] = "Vous n'avez pas renseigné un email valide";
}
if(!array_key_exists('message', $_POST) || $_POST['message'] == ''){
    $errors['message'] = "Vous n'avez pas renseigné votre message";
}
if(!array_key_exists('objet', $_POST) || $_POST['objet'] == ''){
    $errors['objet'] = "Entree l'objet de votre demende";
}

session_start();

if(!empty($errors)){
  $_SESSION['errors'] = $errors;
  $_SESSION['inputs'] = $_POST;
  header('Location: index.php');
}else
$_SESSION['success'] = 1;
$message = $_POST['name']."\r\n". $_POST['prenom']."\r\n". $_POST['email']."\r\n" .$_POST['objet']. "\r\n" .$_POST['message'];
$message = "Email de l'expéditeur : " . $_POST['email']."\r\n". "Nom de l'expéditeur : " . $_POST['name'] . "\r\n". "Prenom : " . $_POST['prenom'] . "\r\n". "Objet : " . $_POST['objet'] . "\r\n";
$header = 'FROM: friedblattjimmytest@gmail.com';
mail("friedblattjimmytest@gmail.com", $_POST['objet'],$message, $header);
header('Location: index.php');


 ?>
