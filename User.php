<?php
class User{
    private $conn;

    //constructor to initialize the database connection
    public function __construct($db){
        $this->conn = $db;
    }

    //create new user
    public function createUser($matric, $name, $password, $role){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql="INSERT INTO users(matric,name,password, role) VALUES(?,?,?,?)";
        $stmt=$this->conn->prepare($sql);

        if($stmt){
            $stmt->bind_param("ssss", $matric, $name, $password, $role);
            $result =$stmt->execute();

            if($result){
                return true;
            }else{
                return "Error:".$stmt->error;
            }

            $stmt->close();
        }else{
            return "Error:".$this->conn->error;
        }
    }

    //to read all users
    public function getUsers(){
        $sql="SELECT matric, name, role FROM users";
        $result=$this->conn->query($sql);
        return $result;
    }

    //to read a single user by matric
    public function getUser(matric)
    {
        $sql="SELECT * FROM users WHERE matric=?";
        $stmt=$this->conn->prepare($sql);

        if($stmt){
            $stmt->bind_param("s", $matric);
            $stmt->execute();
            $result=$stmt->get_result();
            $user=$result->fetch_assoc();

            $stmt->close();
            return $user;
        }else{
            return "Error:".$this->conn->error;
        }
    }

    //update a user's information
    public function updateUser($matric, $name, $role){
        $sql="UPDATE users SET name=?, role=?, WHERE matric=?";
        $stmt=$this->conn->prepare($sql);

        if($stmt){
            $stmt->bind_param("sss", $name, $role, $matric);
            $result=$stmt->execute();

            if($result){
                return true;
            }else{
                return "Error:".$stmt->error;
            }
            $stmt->close();
        }else{
            return "Error:".$this->conn->error;
        }
    }

    //delete a user by matric
    public function deleteUser($matric){
        $sql="DELETE FROM users WHERE matric=?";
        $stmt=$this->conn->prepare($sql);

        if($stmt){
            $stmt->bind_param("s", $matric);
            $result=$stmt->execute();

            if($result){
                return true;
            }else{
                return "Error:". $stmt-> error;
            }
            $stmt->close();
        }else{
            return "Error:".$this->conn->error;
        }
    }
}