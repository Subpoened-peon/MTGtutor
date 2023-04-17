<?php
//This is my Dao class
require_once realpath(__DIR__ . "C:\wamp641\www\MTGtutor\Cleardb.env");
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

class DBconnect {

  private $host = $_ENV['DB_HOST'];
  private $user = $_ENV['DB_USERNAME'];
  private $password = $_ENV['DB_PASSWORD'];
  private $db = $_ENV['DB_DATABASE'];

  public function getConnection() {
    return
        new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
            $this->password);
  }

  public function searchName($name) {
    $conn = $this->getConnection();
    $searchQuery = 
        "SELECT art, name FROM single WHERE name like '$name%'";
    return $conn->query($searchQuery)->fetchAll(PDO::FETCH_ASSOC);

  }

  public function searchUser($username, $email) {
    $conn = $this->getConnection();
    $searchQuery = "SELECT * FROM login WHERE UserName='$username' OR Email='$email' LIMIT 1";
    return $conn->query($searchQuery)->fetchAll(PDO::FETCH_ASSOC);
  }

  public function registerUser($user, $pass, $email) {
    $conn = $this->getConnection();
    $q = $conn->prepare("INSERT INTO login
    (UserName, Email, Password, join_date)
    values (:user, :email, :pass, curdate())");
    $q->bindParam(":user", $user);
    $q->bindParam(":pass", $pass);
    $q->bindParam(":email", $email);
    $q->execute();
  }

  public function loginUser($user, $psw) {
    $conn = $this->getConnection();
    $searchQuery = "SELECT * FROM login WHERE UserName='$user' AND Password = '$psw'";
    return $conn->query($searchQuery)->fetchAll(PDO::FETCH_ASSOC);
  }
}