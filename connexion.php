<?php
require_once 'classes/User.php';


if (isset($_POST['connexion'])) {
 
    $login = $_POST['login'];
    $password = $_POST['password'];
   
    $newClient = new User($login, $password);
    $newClient->connect($login, $password);
    
}




?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion</title>
</head>

<?php require_once 'classes/User.php'; ?>

<body>
  <main>
    <h1>Connexion</h1>
    <form action="connexion.php" method="POST" class="form">

      <label for="login">Login</label>
      <input type="login" name="login" placeholder="Entrer votre login" autocomplete="off" required>

      <label for="password">Mot de Passe</label>
      <input type="password" name="password" placeholder="Entrer votre mot de passe" autocomplete="off" required>

      <input class="button" type="submit" value="Se connecter" name="connexion">
    </form>
  </main>
</body>

</html>