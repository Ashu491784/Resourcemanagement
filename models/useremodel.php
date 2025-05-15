<?php

use LDAP\Result;
class user{

    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }
    public function getAll(){
      try{
       $stmt = $this->conn->query("SELECT * FROM user ORDER BY username");
        $result = $stmt -> fetchAll();
        return $result;
      }catch(PDOException $e){
        error_log("user load error:". $e->getMessage());
        return[];

      }

    }
    public function getById($id){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM user WHWRE user_id=?");
            $stmt -> execute([$id]);
            return $stmt -> fetch(PDO::FETCH_ASSOC); //result ek return krnw

        }catch(PDOException $e){
            error_log("User load error:". $e->getMessage());
            return[];
    
          }
    }

      public function creat($data){
        $stmt = $this-> conn -> prepare("INSERT INTO user(user_id, username,`password`, full_name, email, `role`) VALUES (?,?,?,?,?,?)");
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
        return $stmt -> execute([$data['user_id'], $data['username'], $hashedPassword, $data['full_name'], $data['email'], $data['role']]);
    }
    

    public function update($user_id, $username, $password, $full_name, $email, $role){
        $stmt = $this->conn->prepare("UPDATE user SET username=? , `password`=?, 
        `full_name`=?, email=?, role=?  WHERE user_id=?");
        $stmt -> execute([$user_id, $username, $password, $full_name, $email,
         $role]);
    }

    public function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM user WHERE user_id=?");
        return $stmt -> execute([$id]); 
    }

    public function exists($id){
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM user WHERE user_id=?");
        $stmt -> execute([$id]);
        return $stmt -> fetchColumn() >0;
    }

     public function getUsername($username){
        $stmt = $this-> conn ->prepare("SELECT * FROM user WHERE username=?");
        $stmt ->execute([$username]);
        return $stmt ->fetch();
    }
    public function verifyCredentials($username, $password){
        $user = $this-> getUsername($username);
        if($user && password_verify($password, $user['password'])){
            return $user;
        }
        return false;
    }

}


?>