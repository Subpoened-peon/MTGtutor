<?php
//This is my Dao class
include("CONFIG.php");
class DBconnect {

  private $host = HOST;
  private $user = USER;
  private $password = PASSWORD;
  private $db = DB;

  public function getConnection() {
    return
        new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
            $this->password);
  }

  public function searchName($name) {
    $conn = $this->getConnection();
    $searchQuery = 
        "SELECT * FROM single inner join cardtypes on single.type_id = cardtypes.type_id where name like '$name%';";
    return $conn->query($searchQuery)->fetchAll(PDO::FETCH_ASSOC);

  }

  public function searchUser($username) {
    $conn = $this->getConnection();
    console.log("Searching for user:", $username);
    $searchQuery = "SELECT * FROM login WHERE UserName='$username' LIMIT 1";
    $result = $conn->query($searchQuery);
    $numRows = $result->rowCount();
    return $numRows > 0 ? 1 : 0;
  }

  public function advancedSearch($cardName, $cardType, $cardCost, $cardRule, $cardSet, $cardRarity, $cardColors) {
    
    $conn = $this->getConnection();

    $sql = "SELECT * FROM single ";
    $where = "WHERE name like '$cardName%' ";
    $sql .= "Join cardtypes on single.type_id = cardtypes.type_id ";
    if (!empty($cardType)) {
       $where .= "AND type_desc = '$cardType' ";
    }
    if (!empty($cardCost)) {
        $where .= "AND cost = '$cardCost' ";
    }
    if (!empty($cardRule)) {
        $where = "AND rules like '$cardRule' ";
    }
    if (!empty($cardSet)) {
      $sql .= "INNER Join cardset on single.set_id = cardset.set_id ";
      $where .= "AND set_desc = '$cardSet' ";
    }
    if (!empty($cardRarity)) {
      $where .= "AND rarity = '$cardRarity' ";
    }
    if (!empty($cardColors)) {
      $sql .= "INNER Join color_identity on single.color_id = color_identity.color_id ";
      $where .= "AND color_desc like '$cardColors' ";
    }
    $sql .= $where . ";";
    return $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
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