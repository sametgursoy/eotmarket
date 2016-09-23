<?php
class Store{

  protected $_id = "";
  protected $_name = "";
  protected $_user = "";
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
   private function setId($id = null,$user = null )
    {
      if ($user) {
        $sql = sprintf("Select id from stores WHERE user='%i'",  $user);
        $result = $this->_mysqli->query($sql);
        $row = $result->fetch_assoc();
        $this->_id = $row['id'];
      }
      if ($id) {
        $this->_id = $id;
      }
    }

  public function setName($name)
   {
       $this->_name = $name ;
   }

  public function getName()
   {
       return $this->_name;
   }
  public function setUser($user)
   {
       $this->_user = $user ;
   }
  public function getUser()
   {
       return $this->_user;
   }


  public function createStore($user,$name)
  {

    //check store
    if($this->checkStore($user)) return false;


    //create store
    $sql =  sprintf("INSERT INTO stores (name,user) VALUES('%s',%d)",$name,$user);

    $result = $this->_mysqli->query($sql);
    if (!$result) return false;

    //get and set storeID
    $this->setId(null,$user);

    $this->setName($name);

    $this->setStoreToSession();

    return true;

  }
  private function setStoreToSession()
  {
    //add session store
    $store = array(
      'id' =>  $this->_id,
      'name' =>  $this->_name
    );
    $_SESSION['store'] = $store;

  }
  public function checkStore($user)
  {
    $sql = "SELECT * FROM stores WHERE user=" . $user . " limit 1";


    $result = $this->_mysqli->query($sql);

    $row = $result->fetch_assoc();

    if (empty($row))
    {
      return false;
    }
    else {
      $this->_id = $row['id'];
      $this->_name = $row['name'];

      $this->setStoreToSession();
      return true;
    }

  }





}
 ?>
