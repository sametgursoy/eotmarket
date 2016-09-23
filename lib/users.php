<?php

class User{
  protected $_id = null;
  protected $_firstname = null;
  protected $_lastname = null;
  protected $_email = null;
  protected $_password = null;
  protected $_mysqli = false;

  public function __construct($config = null)
   {
     if ($config) {
       $this->_mysqli = new mysqli($config['host'], $config['username'], $config['password'], $config['dbname']);
     }

   }

  public function getId()
   {
       return $this->_id;
   }
   private function setId($id = null,$email = null )
    {
      if ($email) {
        $sql = sprintf("Select id from users WHERE email='%s'",  $email);
        $result = $this->_mysqli->query($sql);
        $row = $result->fetch_assoc();
        $this->_id = $row['id'];
      }
      if ($id) {
        $this->_id = $id;
      }
    }

  public function setFirstName($name)
   {
       $this->_firstname = $name ;
   }
  public function getFirstName()
   {
       return $this->_firstname;
   }
  public function setLastName($lastname)
   {
       $this->_lastname = $lastname ;
   }
  public function getLastName()
   {
       return $this->_lastname;
   }
  public function setEmail($email)
   {
       $this->_email = $email ;
   }
  public function getEmail()
   {
       return $this->_email;
   }
  public function setPassword($password)
   {
       $this->_password = $password ;
   }
  public function getPassword()
   {
       return $this->_password;
   }

   public function comparePassword($password1,$password2)
    {
        if($password1 == $password2){
          $this->setPassword($password1);
          return true;
        }
        else {
          return false;
        }
    }
    public function controlUser($email)
     {
       $sql = "SELECT * FROM users WHERE email='" . $email . "'";
       $result = $this->_mysqli->query($sql);
       if (empty($result->fetch_assoc())) return true;
       return false;
     }

    public function registerUser()
     {
       if(!$this->controlUser($this->_email)) {
         return false;
       }

       $sql = sprintf("Insert INTO users (firstname,lastname,email,password) Values('%s','%s','%s',md5('%s'))",$this->_firstname,$this->_lastname,$this->_email,$this->_password);
       $result = $this->_mysqli->query($sql);
       $this->setId(null,$this->_email);
       $this->login();
       return true;

     }
    private function login()
     {
       $user = array(
         'id' => $this->_id,
         'firstname' => $this->_firstname,
         'lastname' => $this->_lastname,
         'email' => $this->_email,
         'login' => true
       );

      $_SESSION['user'] = $user;


     }

     public function loginWithPassword($email,$password)
     {
       $sql = sprintf("SELECT * FROM users WHERE email='%s' AND password=md5('%s')",$email,$password);

       $result = $this->_mysqli->query($sql);
       $row = $result->fetch_assoc();

       if (empty($row))
       {
           return false;
       }
       else {
         $this->_id = $row['id'];
         $this->_firstname = $row['firstname'];
         $this->_lastname = $row['lastname'];
         $this->_email = $row['email'];
         $this->login();
         return true;
       }

     }

     public function logOff()
      {
        session_destroy();

      }




}


 ?>
