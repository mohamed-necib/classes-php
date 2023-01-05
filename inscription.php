<?php

require_once 'classes/User.php';
if (isset($_POST['inscription'])) {
  $login = $_POST['login'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];

  $newUser = new User($login, $email, $password, $firstname, $lastname);
  $newUser->register($login, $email, $password, $firstname, $lastname);
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/CSS/form.css">
  <title>Inscription Form</title>
</head>
<?php include 'includes/header.php' ?>
<?php require_once 'classes/User.php' ?>

<body>
  <main>
    <div class="form-container">
      <div class="form-logo-title">
        Inscription
      </div>
      <form action="" method="POST" class="form">

        <label for="login">Login</label>
        <input type="text" name="login" id="login" placeholder="Entrer votre login" autocomplete="off" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Entrer votre email" autocomplete="off" required>

        <label for="prenom">Prenom</label>
        <input type="text" name="firstname" id="prenom" placeholder="Entrer votre prenom" autocomplete="off" required>

        <label for="nom">Nom</label>
        <input type="text" name="lastname" id="nom" placeholder="Entrer votre nom" autocomplete="off" required>

        <label for="password">Mot de Passe</label>
        <input type="password" name="password" id="password" placeholder="Entrer votre mot de passe" autocomplete="off" required>

        <label for="cpassword">Confirmer Mot de passe</label>
        <input type="password" name="conf_password" id="cpassword" placeholder="Confirmer mot de passe" autocomplete="off" required>

        <input class="button" type="submit" value="S'inscrire" name="inscription">
      </form>
    </div>
  </main>



</body>

</html>