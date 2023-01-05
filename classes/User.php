<!-- Créez un fichier nommé “User.php”. Dans ce fichier, créez une classe “User” qui contient les attributs suivants : -->

<?php

class User
{

  //ATTRIBUTS
  private $_id;
  private $db;
  public $login;
  public $email;
  public $firstname;
  public $lastname;

  // METHODES
  public function __construct()
  {
    $hostName = "localhost";
    $dbUSer = "root";
    $dbPassword = "root";
    $dbName = "classes";

    $this->db = mysqli_connect($hostName, $dbUSer, $dbPassword, $dbName);
    if (!$this->db) {
      die("La connexion a échouée");
    }
  }

  public function register($login, $password, $email, $firstname, $lastname)
  {
    $this->login = $login;
    $this->email = $email;
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->password = $password;

    //AJOUT D'UN NOUVEL UTILISATEUR
    $sql = "INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES (?, ?, ?, ?, ?)";

    //INITIALISATION DE L'OBJET DE COMMANDE
    $stmt = mysqli_stmt_init($this->db);

    //PREPARATION DE LA REQUETE SQL POUR L'EXECUTION
    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

    if ($prepareStmt) {
      mysqli_stmt_bind_param($stmt, "sssss", $login, $password, $email, $firstname, $lastname);
      mysqli_stmt_execute($stmt);
      //MESSAGE DE VALIDATION DE LA CONNEXION
    } else {
      
      //MESSAGE ERREUR DE CONNEXION
    }
  }

  public function connect($login, $password)
  {

    $this->login = $login;
    $this->password = $password;


    $sql = "SELECT * FROM utilisateurs WHERE login = '$login'";
    $result = mysqli_query($this->db, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = $result->num_rows;



    if ($count != 0) {
      session_start();
      $this->id = $user['id'];
      $this->email = $user['email'];
      $this->login = $user['login'];
      $this->firstname = $user['firstname'];
      $this->lastname = $user['lastname'];


      $_SESSION['user'] = $this;
      header("Location: profil.php");
    }else{
      echo "Vous n'avez pas encore de compte, veuillez vous inscrire";
      header("Refresh: 2;url= inscription.php");
    }
  }


  public function disconnect()
  {
    if (isset($_SESSION['user']->{'login'})) {
       $_SESSION = [];
      unset($_SESSION['user']);
      session_destroy();
      header("Location: index.php");;
      exit;
    }
   
  }


  // DELETE
  public function delete()
  {
    $login = $_SESSION['user']->{'login'};
    $delete = "DELETE FROM utilisateurs WHERE login = '$login'";
    mysqli_query($this->db, $delete);
    echo $this->login . "supprimé";
    session_destroy();
    header("Location: inscription.php");
  }


  // UPDATE
  public function update($newLogin, $password, $email, $firstname, $lastname)
  {
    $login = $_SESSION['user']->{'login'};
    $this->password = $password;
    $this->login = $newLogin;
    $this->email = $email;
    $this->firstname = $firstname;
    $this->lastname = $lastname;

    $update = "UPDATE utilisateurs SET login = '$newLogin', password = '$password', email = '$email', firstname = '$firstname', lastname = '$lastname' WHERE login = '$login' ";
    mysqli_query($this->db, $update);

    if (mysqli_query($this->db, $update)) {
      echo $this->login . " vous avez mis à jour votre profil";
    } else {
      echo "Error";
    }
  }

  public function isConnected()
  {
    $login = $_SESSION['user']->{'login'};
    $email= $_SESSION['user']->{'email'};
    $firstname = $_SESSION['user']->{'firstname'};
    $lastname = $_SESSION['user']->{'lastname'};
     
    if(session_status() === PHP_SESSION_ACTIVE){
      return TRUE;
    }else{
      header('Location: inscription.php');
    }

    }

  public function getAllinfos()
  {
    $login = $_SESSION['user']->{'login'};
    $sql = "SELECT * FROM utilisateurs WHERE login = '$login'";
    $result = mysqli_query($this->db, $sql);
    $userInfos = $result->fetch_assoc();
    $this->login = $userInfos['login'];
    $this->password = $userInfos['password'];
    $this->email = $userInfos['email'];
    $this->firstname = $userInfos['firstname'];
    $this->lastname = $userInfos['lastname'];
  }

  public function getLogin()
  {
    $login = $_SESSION['user']->{'login'};
    $sql = "SELECT login FROM utilisateurs WHERE login = '$login'";
    $result = mysqli_query($this->db, $sql);
    $userInfos = $result->fetch_assoc();
    $this->login = $userInfos['login'];

  }

  public function getEmail()
  {
    $login = $_SESSION['user']->{'login'};
    $sql = "SELECT email FROM utilisateurs WHERE login = '$login'";
    $result = mysqli_query($this->db, $sql);
    $userInfos = $result->fetch_assoc();
    $this->email = $userInfos['email'];
  }

  public function getFirstname()
  {
    $login = $_SESSION['user']->{'login'};
    $sql = "SELECT firstname FROM utilisateurs WHERE login = '$login'";
    $result = mysqli_query($this->db, $sql);
    $userInfos = $result->fetch_assoc();
    $this->firstname = $userInfos['firstname'];
  }

  public function getLastname()
  {
    $login = $_SESSION['user']->{'login'};
    $sql = "SELECT lastname FROM utilisateurs WHERE login = '$login'";
    $result = mysqli_query($this->db, $sql);
    $userInfos = $result->fetch_assoc();
    $this->lastname = $userInfos['lastname'];

  }
}

?>