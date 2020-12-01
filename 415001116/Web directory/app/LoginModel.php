<?php
use Haa\framework\Observable_Model;
use Haa\framework\Validator;

class LoginModel extends Observable_Model
{
    public function findAll(): array
    {
        return[];
    }

    public function find(string $tablename, array $fields)
    {
        
    }
    
    public function findRecord(string $id)
    {
        $user_email = $_GET['email'];
        $user_password = $_GET['password'];

        $query = "SELECT * from users WHERE email='$user_email' AND password = '$user_password' ";

        $result = $this->sql->query($query);
        if ($this->sql->errno) {
            echo 'SQL Error occurred: ';
            echo $this->sql->error;
            exit();
        }
        
        if ($result->num_rows == 1) {

            //Get database result
            while($row = $result->fetch_assoc()){
               
                $_SESSION['authenticated_user'] = array(
                    
                    'name'=>$row['name']
                );
            }
                
            //Set session variables
            return true;
        }
        else {
            return false;
        }


    }
}