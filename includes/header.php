<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/assets/css/flex.css">
  <title>Accueil</title>
</head>

<body>
  <nav class="navbar">
    <a href="/../module-connexion/index.php" class="logo"><img src="./assets/img/logo.svg" alt=""></a>
    <div class="nav-links">
      <ul>
        <li class="active"><a href="/index.php">Accueil</a></li>
          <li><a href="./connexion.php">Connexion</a></li>
          <li><a href="./inscription.php">Inscription</a></li>
      </ul>
    </div>
  </nav>
</body>
<script>
  const menuHamburger = document.querySelector(".menu-burger")
  const navLinks = document.querySelector(".nav-links")

  menuHamburger.addEventListener('click', () => {
    navLinks.classList.toggle('mobile-menu')
  })
</script>

</html>