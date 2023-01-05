<?php
require_once 'classes/User.php';
session_start();




if (isset($_POST['modifier'])) {
  $login = $_POST['newLogin'];
  $email = $_POST['newEmail'];
  $firstname = $_POST['newFirstname'];
  $lastname = $_POST['newLastname'];
  $password = $_POST['newPassword'];
  $newUpdate = new User();
  $newUpdate->update($login, $password, $email, $firstname, $lastname);
}

if (isset($_POST['deconnexion'])) {

  $newClient = new User();
  $newClient->disconnect();
}

if (isset($_POST['supprimer'])) {

  $deleteUser = new User();
  $deleteUser->delete();
  $deconnectUser = new User();
  $deconnectUser->disconnect();
}




?>




<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil</title>
</head>
<?php require_once 'classes/User.php'; ?>

<body>
  <h1>Profil de <?= $_SESSION['user']->{'login'} ?>, content de vous revoir.</h1>
  <h2>Souhaitez vous modifier vos informations?</h2>
  <?php
  $allInfos = new User();
  $allInfos->getAllinfos();

  echo "Vos informations connues sont: <br> Login: " . $allInfos->login . "<br> Email: " . $allInfos->email . "<br> Prénom: " . $allInfos->firstname . "<br> Nom: " . $allInfos->lastname;

  ?>
  <form action="" method="POST" class="form">

    <label for="login">Login</label>
    <input type="text" name="newLogin" id="login" placeholder="Entrer votre login" autocomplete="off" required>

    <label for="email">Email</label>
    <input type="email" name="newEmail" id="email" placeholder="Entrer votre email" autocomplete="off" required>

    <label for="prenom">Prenom</label>
    <input type="text" name="newFirstname" id="prenom" placeholder="Entrer votre prenom" autocomplete="off" required>

    <label for="nom">Nom</label>
    <input type="text" name="newLastname" id="nom" placeholder="Entrer votre nom" autocomplete="off" required>

    <label for="password">Mot de Passe</label>
    <input type="password" name="newPassword" id="password" placeholder="Entrer votre mot de passe" autocomplete="off" required>

    <input class="button" type="submit" value="update" name="modifier">
  </form>

  </form>

  <?php
  require_once 'classes/User.php';
  $connected = new User();
  $connected->isConnected();
  if ($connected->isConnected()) : ?>
    <form action="" method="post">
      <input class="button" type="submit" value="Deconnexion" name="deconnexion">
      <input class="button" type="submit" value="Supprimer" name="supprimer">
    </form>

  <?php endif ?>

</body>

</html>