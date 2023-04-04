<?php
//This is my Dao class
class DBconnect {

  $url = parse_url(getenv("mysql://b7ec723fa75235:f04e469c@us-cdbr-east-06.cleardb.net/heroku_085a70428b0ee69?reconnect=true"));

  $server = $url["host"];
  $username = $url["user"];
  $password = $url["pass"];
  $db = substr($url["path"], 1);

  public function getConnection() {
    return
        new PDO("mysql:host={$this->server};dbname={$this->db}", $this->user,
            $this->pass);
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